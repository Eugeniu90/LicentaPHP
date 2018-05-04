#!/bin/sh

if docker inspect idp-proxy-build &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-proxy-build container \e[33m***\e[0m\n"
  docker stop idp-proxy-build && docker rm -v idp-proxy-build
fi

docker run --name idp-proxy-build -d \
  -v $(pwd) proxy/idp: uxp/apps/proxy \
  uxpsystems/mint-proxy-base:iam-idp

mkdir ./RPMS
docker cp idp-proxy-build:/home/uxp/openresty-1.9.7.3-1.x86_64.rpm ./RPMS

if docker inspect idp-proxy-build &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-proxy-build container \e[33m***\e[0m\n"
  docker stop idp-proxy-build && docker rm -v idp-proxy-build
fi

echo "completed."
echo
