#!/bin/sh

if docker inspect haproxy &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing haproxy container \e[33m***\e[0m\n"
  docker stop haproxy && docker rm haproxy
fi

docker run -d -it --name haproxy --link proxy:proxy \
  -p 443:443 -p 80:80 -p 88:88 \
  -v $(pwd) proxy/haproxy/haproxy.cfg:/usr/local/etc/haproxy/haproxy.cfg:ro \
  -v $(pwd) proxy/haproxy/wildcard.penguin.com.pem:/usr/local/etc/haproxy/wildcard.penguin.com.pem:ro \
  haproxy:1.6
