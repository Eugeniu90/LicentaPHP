#!/bin/sh

if docker inspect redis &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing redis cluster container \e[33m***\e[0m\n"
  docker stop redis && docker rm -v redis
fi

docker run -d --name redis \
  -p 6379:6379 -p 6380:6380 \
  -p 6381:6381 -p 6382:6382 \
  -p 6383:6383 -p 6384:6384 \
  -p 6385:6385 -p 6386:6386 \
  -it uxpsystems/redis-cluster

if docker inspect redis-commander &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing redis commander container \e[33m***\e[0m\n"
  docker stop redis-commander && docker rm -v redis-commander
fi

docker run -d --name redis-commander \
  --link redis:redis \
  -p 8081:8081 tenstartups/redis-commander \
  --redis-host redis