#!/bin/sh

# reset rabbitmq
./reset-rabbitmq.sh

# reset redis
./reset-redis-cluster.sh

# reset idp-proxy
./reset-idp-proxy-local.sh