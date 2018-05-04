#!/bin/sh
IDP_PROXY_IP=$(ping -q -c 1 -t 1 www.maple.com | grep PING | sed -e "s/).*//" | sed -e "s/.*(//")
POM_VERSION=$(grep "<version>" ./pom.xml | head -1 | awk -F '>' '{print$2}' | awk -F '<' '{print$1}')
RPM_VERSION=$(echo $POM_VERSION | tr '-' '_')

ARG=$1

if docker inspect idp-proxy &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-proxy container \e[33m***\e[0m\n"
  docker stop idp-proxy && docker rm -v idp-proxy
fi


if [[ $ARG = "base" ]];
	then
		echo "Running with centos6.7-java-base image"
		docker run --name idp-proxy -d \
		  --link tomcat-platform:tomcat-platform \
		  -p $IDP_PROXY_IP:443:443 -p $IDP_PROXY_IP:80:80 \
		   uxpsystems/centos6.7-java-base tail -f /dev/null


		 docker cp deployment/RPMS/openresty-1.9.7.3-1.x86_64.rpm idp-proxy:/tmp

		 docker exec idp-proxy \
   			/bin/bash -c "yum install -y libxslt epel-release geoip \
   			&& yum install -y geoip \
   			&& rpm -ivh /tmp/openresty-1.9.7.3-1.x86_64.rpm \
   			&& service nginx start"

else
		echo "Running with mint-proxy-base:saml-sp image"
		docker run --name idp-proxy -d \
		  --link tomcat-platform:tomcat-platform \
      --link redis:redis \
		  -p $IDP_PROXY_IP:443:443 -p $IDP_PROXY_IP:80:80 \
		  --entrypoint /usr/sbin/nginx uxpsystems/mint-proxy-base:saml-sp -g 'daemon off;'
fi	



# install python-argparse and genconfig
docker exec idp-proxy  \
   /bin/bash -c "yum install -y python-argparse"

docker cp deployment/genconfig/genconfig.py idp-proxy:/usr/bin

# copy rpm to the containter
docker cp deployment/RPMS/mint-proxy-idp-config*.rpm idp-proxy:/tmp

# install the rpm
docker exec idp-proxy  \
  /bin/bash -c "rpm -ivh /tmp/mint-proxy-idp-config*.noarch.rpm"

# generate self-signed SSL certificate and private key
docker exec -u uxp idp-proxy \
  /bin/bash -c "openssl req -x509 -sha256 -nodes -days 365 -newkey rsa:2048 \
    -subj '/CN=www.maple.com/O=Maple Inc./C=CA' \
    -keyout  uxp/apps/proxy/certs/idp.key \
    -out  uxp/apps/proxy/certs/idp.crt"

# set the tomcat-platform ip address
tomcat_platform_IP=$(docker inspect --format '{{ .NetworkSettings.IPAddress }}' tomcat-platform)
docker exec -u uxp idp-proxy \
  /bin/bash -c "sed -i -- 's/172.17.0.4/$tomcat_platform_IP/g'  uxp/apps/proxy/genconfig/idp_proxy.values"

# run genconfig
docker exec idp-proxy \
  /bin/bash -c "genconfig.py -v  uxp/apps/proxy/genconfig/idp_proxy.values -t  uxp/config/proxy"

# Generate SP certificate and private key
docker exec -u uxp idp-proxy  \
  /bin/bash -c " uxp/apps/proxy/shibboleth/script/keygen.sh -f \
    -o  uxp/apps/proxy/shibboleth/etc \
    -h www.maple.com -y 2 \
    -e https://www.maple.com/private"

# Generate SP metadata file
docker exec -u uxp idp-proxy  \
  /bin/bash -c " uxp/apps/proxy/shibboleth/script/metagen.sh \
    -c  uxp/apps/proxy/shibboleth/etc/sp-cert.pem \
    -h www.maple.com/private -e https://www.maple.com/private \
    -1 -2 -L >  uxp/apps/proxy/shibboleth/etc/idp-private-metadata.xml"

if [[ $ARG = "base" ]];
  then
  docker exec idp-proxy \
    /bin/bash -c "service nginx restart"
else
  # signal nginx to reload configuration
  docker kill -s HUP idp-proxy
fi

echo "completed."
echo
