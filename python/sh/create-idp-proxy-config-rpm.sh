#!/bin/sh
POM_VERSION=$(grep "<version>" ./deployment/pom.xml | head -1 | awk -F '>' '{print$2}' | awk -F '<' '{print$1}')
VERSION=${POM_VERSION//-/_}
RELEASE=1
GITHASH=LOCAL

if docker inspect idp-proxy-build &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-proxy-build container \e[33m***\e[0m\n"
  docker stop idp-proxy-build && docker rm -v idp-proxy-build
fi

docker run --name idp-proxy-build -d \
  -v $(pwd) proxy/idp: uxp/apps/proxy \
  uxpsystems/mint-proxy-base:iam-idp

# copy over the RPM spec file
#docker cp deployment/specs/mint-proxy-idp-config.spec idp-proxy-build:/root/rpmbuild/SPECS
docker cp ./deployment/src/main/resources/rpmspecs/mint-proxy-idp-config.spec idp-proxy-build:/root/

# run
 docker exec idp-proxy-build \
     /bin/bash -c "cd /root/ && rpmbuild --define '_topdir /root/RPMBUILD' \
			 		--define '_version $VERSION' \
			 		--define '_release $RELEASE' \
			 		--define '_githash $GITHASH' \
			 		-ba '/root/mint-proxy-idp-config.spec'"


docker cp idp-proxy-build:/root/rpmbuild/RPMS/ ./deployment/RPMS/

if docker inspect idp-proxy-build &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-proxy-build container \e[33m***\e[0m\n"
  docker stop idp-proxy-build && docker rm -v idp-proxy-build
fi

echo "completed."
echo
