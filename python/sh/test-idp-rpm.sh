#!/bin/sh
POM_VERSION=$(grep "<version>" ./pom.xml | head -1 | awk -F '>' '{print$2}' | awk -F '<' '{print$1}')
#RPM_VERSION=$(echo $POM_VERSION | tr '-' '_')

if docker inspect tomcat-platform &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing tomcat-platform container \e[33m***\e[0m\n"
  docker stop tomcat-platform && docker rm -v tomcat-platform
fi


docker run --name tomcat-platform -d \
  --link rabbitmq:rabbitmq \
  --expose 8080 \
  uxpsystems/centos6.7-java-base tail -f /dev/null

# copy rpm to the containter
docker cp deployment/RPMS/mint-platform.noarch.rpm tomcat-platform:/tmp

# install the rpm
docker exec tomcat-platform  \
   /bin/bash -c "rpm -ivh /tmp/mint-platform.noarch.rpm"

# Get mysql connector jar
docker exec tomcat-platform \
  /bin/bash -c "yum install -y wget tar && \
		  		wget https://dev.mysql.com/get/Downloads/Connector-J/mysql-connector-java-5.1.39.tar.gz -P /tmp && \
				tar -xzf /tmp/mysql-connector-java-5.1.39.tar.gz -C /tmp && \
				cp /tmp/mysql-connector-java-5.1.39/mysql-connector-java-5.1.39-bin.jar  uxp/apps/tomcat-platform/lib/ && \
				chown -R uxp:uxp  uxp/apps/tomcat-platform"

# Export IdP configuration files to the idp-home directory
docker exec -u uxp tomcat-platform \
  /bin/bash -c " uxp/apps/tomcat-platform/bin/platform-cli.sh export \
    --idphome  uxp/config/tomcat-platform/idp"

# Generate an IdP keystore
docker exec -u uxp tomcat-platform \
  /bin/bash -c " uxp/apps/tomcat-platform/bin/platform-cli.sh keystore \
    --alias secret \
    --storefile  uxp/config/tomcat-platform/idp/credentials/sealer.jks \
    --storepass hcnYHmJP6vqY7e \
    --versionfile  uxp/config/tomcat-platform/idp/credentials/sealer.kver"

# Generate IdP signing key and certificate
docker exec -u uxp tomcat-platform \
  /bin/bash -c " uxp/apps/tomcat-platform/bin/platform-cli.sh cert \
    --hostname www.maple.com \
    --uri-alt-name https://www.maple.com/saml \
    --keyfile  uxp/config/tomcat-platform/idp/credentials/idp-signing.key \
    --certfile  uxp/config/tomcat-platform/idp/credentials/idp-signing.crt"

# Generate IdP encryption key and certificate
docker exec -u uxp tomcat-platform \
  /bin/bash -c " uxp/apps/tomcat-platform/bin/platform-cli.sh cert \
    --hostname www.maple.com \
    --uri-alt-name https://www.maple.com/saml \
    --keyfile  uxp/config/tomcat-platform/idp/credentials/idp-encryption.key \
    --certfile  uxp/config/tomcat-platform/idp/credentials/idp-encryption.crt"

# Generate IdP back channel encryption keystore and certificate
docker exec -u uxp tomcat-platform \
  /bin/bash -c " uxp/apps/tomcat-platform/bin/platform-cli.sh cert \
    --hostname www.maple.com \
    --uri-alt-name https://www.maple.com/saml \
    --storefile  uxp/config/tomcat-platform/idp/credentials/idp-backchannel.p12 \
    --storepass hcnYHmJP6vqY7e \
    --certfile  uxp/config/tomcat-platform/idp/credentials/idp-backchannel.crt"

# Generate IdP metadata file
docker exec -u uxp tomcat-platform \
  /bin/bash -c " uxp/apps/tomcat-platform/bin/platform-cli.sh metadata \
    --entity-id https://www.maple.com \
    --dns-name https://www.maple.com \
    --scope maple.com \
    --backchannel-cert  uxp/config/tomcat-platform/idp/credentials/idp-backchannel.crt \
    --encryption-cert  uxp/config/tomcat-platform/idp/credentials/idp-encryption.crt \
    --signing-cert  uxp/config/tomcat-platform/idp/credentials/idp-signing.crt \
    --output  uxp/config/tomcat-platform/idp/metadata/idp-metadata.xml"

# install python-argparse and genconfig
# docker exec tomcat-platform  \
#    /bin/bash -c "yum install -y python-argparse"

docker cp deployment/genconfig/genconfig.py tomcat-platform:/usr/bin

docker exec tomcat-platform mkdir -p  uxp/config/tomcat-platform/genconfig

docker cp deployment/genconfig/core_idp/4.0.4.0/tomcat_platform.values tomcat-platform: uxp/config/tomcat-platform/genconfig/tomcat_platform.values

# run genconfig
docker exec tomcat-platform \
  /bin/bash -c "genconfig.py -v  uxp/config/tomcat-platform/genconfig/tomcat_platform.values -t  uxp/config/tomcat-platform && chown -R uxp:uxp  uxp/config/tomcat-platform"

docker exec tomcat-platform \
  /bin/bash -c "genconfig.py -v  uxp/config/tomcat-platform/genconfig/tomcat_platform.values -t  uxp/config/tomcat-platform/idp/conf"

# restart all services
docker exec tomcat-platform \
  /bin/bash -c "service tomcat-platform start"

# # signal nginx to reload configuration
# docker kill -s HUP tomcat-platform
tomcat_platform_IP=$(docker inspect tomcat-platform | grep \"IPAddress\" | head -1)

echo "completed."
echo
echo "The tomcat-platform container $tomcat_platform_IP"
