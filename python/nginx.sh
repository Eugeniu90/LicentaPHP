#!/usr/bin/python
import sys
from subprocess import Popen, PIPE
nginx = Popen(['docker run  -p 80:80 -d licenta/nginx:1.0'], stdin=PIPE, stdout=PIPE, stderr=PIPE, shell=True)
print nginx.communicate()

