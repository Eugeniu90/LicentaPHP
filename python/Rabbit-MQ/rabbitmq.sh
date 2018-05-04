#!/usr/bin/python
import sys
from subprocess import Popen, PIPE
elk = Popen(['cd /Users/eugeniugoncearuc/Personal/LicentaPHP/python/Rabbit-MQ; docker-compose up -d | grep done | wc -l'], stdin=PIPE, stdout=PIPE, stderr=PIPE, shell=True)
if elk.communicate() > 1:
    print "Success!"
else:
    print "Fail!"
    print elk.communicate()