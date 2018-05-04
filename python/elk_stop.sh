#!/usr/bin/python
import sys
from subprocess import Popen, PIPE
elk_stop = Popen(['cd /Users/eugeniugoncearuc/Personal/LicentaPHP/python && docker-compose down '], stdin=PIPE, stdout=PIPE, stderr=PIPE, shell=True)
if elk_stop.communicate() > 1:
    print "Success!"
else:
    print "Fail!"
    print elk_stop.communicate()
