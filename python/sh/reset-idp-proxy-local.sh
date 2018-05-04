#!/bin/sh
IDP_PROXY_IP=$(ping -q -c 1 -t 1 www.maple.com | grep PING | sed -e "s/).*//" | sed -e "s/.*(//")

if docker inspect idp-proxy &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing idp-proxy container \e[33m***\e[0m\n"
  docker stop idp-proxy && docker rm -v idp-proxy
fi

docker run --name idp-proxy -d \
  -v $(pwd)/proxyLocal/idp: uxp/apps/proxy \
  -p $IDP_PROXY_IP:443:443 -p $IDP_PROXY_IP:80:80 \
  uxpsystems/mint-proxy-base:iam-idp
