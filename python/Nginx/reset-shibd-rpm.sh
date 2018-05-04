#!/bin/sh
if docker inspect licenta/nginx:1.0 &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing licenta/nginx:1.0 container \e[33m***\e[0m\n"
  docker stop licenta/nginx:1.0 && docker rm -v licenta/nginx:1.0
fi

docker run -p 80:80 licenta/nginx:1.0 -d

