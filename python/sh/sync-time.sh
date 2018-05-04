#!/bin/sh
docker-machine ssh iam "sudo ntpclient -s -h pool.ntp.org"
