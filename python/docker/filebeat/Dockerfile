FROM centos:6.9
USER root
RUN yum update -y
EXPOSE 8081
EXPOSE 5061
EXPOSE 9200
EXPOSE 5044
RUN mkdir  uxp
COPY lgi-rpm-4.0.3.0.377-filebeat.rpm  uxp
RUN yum install -y perl
RUN rpm -i  uxp/lgi-rpm-4.0.3.0.377-filebeat.rpm
RUN sleep 3s
RUN yum install initscripts -y
RUN yum install vim -y
RUN yum install telnet -y
COPY /start.sh  uxp
RUN chmod 777  uxp/start.sh
CMD ["/bin/sh"," uxp/start.sh"]
