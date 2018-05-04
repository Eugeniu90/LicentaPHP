#!/bin/sh

if docker inspect rabbitmq &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing rabbitmq container \e[33m***\e[0m\n"
  docker stop rabbitmq && docker rm -v rabbitmq
fi

docker run -d --hostname rabbitmq \
  --name rabbitmq \
  -p 15672:15672 -p 5672:5672 \
  rabbitmq:3.5-management
