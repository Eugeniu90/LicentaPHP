#!/bin/bash

container_name=oracledb
if docker inspect $container_name &> /dev/null; then
  printf "\e[33m*** \e[32mStopping and removing $container_name container \e[33m***\e[0m\n"
  docker stop $container_name && docker rm -v $container_name
fi

printf "\e[33m*** \e[32mStarting $container_name container \e[33m***\e[0m\n"
docker run --name $container_name -d -p 49160:22 -p 1521:1521 hub.uxpsystems.com/docker/oracledb
sleep 5;
db_host=oracledb
#checking if oracledb is listening
nc_cmd=$(sleep 1 | telnet 192.168.99.100 1521)

if echo "$nc_cmd" | grep -q "Connected"; then
 printf "\e[33m*** \e[32m $container_name started \e[33m***\e[0m\n"    
 printf "\e[33m*** \e[32m Make sure the host: [%s] is added to the /etc/hosts \e[33m***\e[0m\n" "$db_host"
else
	echo "$container_name failed to start"
fi