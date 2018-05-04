#!/bin/bash
POM_TOMCAT_VERSION=$(grep "tomcat-version" ./deployment/pom.xml | head -1 | awk -F '>' '{print$2}' | awk -F '<' '{print$1}') 
POM_VERSION=$(grep "<version>" ./deployment/pom.xml | head -1 | awk -F '>' '{print$2}' | awk -F '<' '{print$1}')
VERSION=${POM_VERSION//-/_}
RELEASE=1
GITHASH=LOCAL

topDir="deployment/target/RPMBUILD"

if docker inspect idp-build &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-build container \e[33m***\e[0m\n"
  docker stop idp-build && docker rm -v idp-build
fi

docker run --name idp-build \
  -d uxpsystems/mint-proxy-base:iam-idp

# docker exec idp-build bash -c "mkdir -p /root/RPMBUILD/{BUILD,RPMS,SOURCES,SPECS,SRPMS}"
# docker exec idp-build bash -c "mkdir -p /root/RPMBUILD/SOURCES/artifacts/"

# Temporary hack to grap jar file from platform repo. When this becomes a release it should come from nexus or jenkins.
#cp ../platform/commons/catalina/target/mint-framework-commons-catalina-*.jar ./overlays/iam-launchpad/target/
#curl -o ./overlays/iam-launchpad/target/mint-framework-commons-catalina-4.0.4.0.jar -L "http://nexus.uxpsystems.com/nexus/service/local/artifact/maven/redirect?r=public&g=com.uxpsystems.mint&a=mint-framework-commons-catalina&v=4.0.4.0&p=jar"

docker cp $topDir idp-build:/root/
docker cp ./deployment/src/main/resources/rpmspecs/mint-solutions.spec idp-build:/root/RPMBUILD/SPECS/
docker cp ./deployment/util idp-build:/root/RPMBUILD/SOURCES/util
docker cp ./deployment/config idp-build:/root/RPMBUILD/SOURCES/config
docker cp ./overlays/iam-launchpad/target/mint-platform-iam-launchpad-*.war idp-build:/root/RPMBUILD/SOURCES/artifacts/
#docker cp ./overlays/iam-launchpad/target/mint-framework-commons-catalina-*.jar idp-build:/root/RPMBUILD/SOURCES/artifacts/

	docker exec idp-build bash -c "cd /root/ && rpmbuild --define '_topdir /root/RPMBUILD' \
								--define '_version ${VERSION}' \
								--define '_release ${RELEASE}' \
								--define '_githash ${GITHASH}' \
								--define '_rpm_names platform' \
								--define '_war_artifacts mint-platform-iam-launchpad' \
								--define '_tomcat_version ${POM_TOMCAT_VERSION}' \
								-bb '/root/RPMBUILD/SPECS/mint-solutions.spec'"

#docker exec idp-build bash -c "cd /root/ && rpmbuild --define '_rpm_names platform' --define '_war_artifacts mint-platform-iam-launchpad' -bb /root/RPMBUILD/SPECS/mint-core.spec"

docker cp idp-build:/root/RPMBUILD/RPMS/. ./deployment/RPMS/

if docker inspect idp-build &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-build container \e[33m***\e[0m\n"
  docker stop idp-build && docker rm -v idp-build
fi
