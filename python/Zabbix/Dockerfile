FROM centos:6.9
RUN yum update -y
RUN yum install vim -y
#RUN yum install nettools -y
#ADD yum.repos.d/ /etc/yum.repos.d
RUN sleep 15m
#ADD lgi-rpm-4.0.3.0.705-zabbix-agent.rpm /lgi-rpm-4.0.3.0.705-zabbix-agent.rpm
RUN yum install mint-zabbix-mariadb-4.0.2.11.1 && mint-zabbix-agent-4.0.2.11.1 && mint-genconfig-4.0.2.11.1 --disablerepo=* --enablerepo=LGI-Release-Candidate,MINT-Thirdparty -y
RUN yum install -y unixODBC
#RUN rpm -i /lgi-rpm-4.0.3.0.705-zabbix-agent.rpm
RUN sleep 10m
EXPOSE 10050
EXPOSE 10052
EXPOSE 3306
