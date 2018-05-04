FROM centos:6.9
RUN yum update -y
RUN yum install wget -y
RUN wget -O /etc/yum.repos.d/jenkins.repo http://pkg.jenkins-ci.org/redhat/jenkins.repo
RUN rpm --import https://jenkins-ci.org/redhat/jenkins-ci.org.key
RUN yum install jenkins -y
RUN yum install java -y
ADD startup.sh /startup.sh
#RUN sleep 10m
#RUN service firewall-cmd --permanent --new-service=jenkins
#RUN firewall-cmd --permanent --service=jenkins --set-short="Jenkins Service Ports"
#RUN firewall-cmd --permanent --service=jenkins --set-description="Jenkins service firewalld port exceptions"
#RUN firewall-cmd --permanent --service=jenkins --add-port=8080/tcp
#RUN firewall-cmd --permanent --add-service=jenkins
#RUN firewall-cmd --zone=public --add-service=http --permanent
#RUN firewall-cmd --reload
#RUN firewall-cmd --list-all
EXPOSE 8080
RUN yum install net-tools -y
#RUN sleep 5s
RUN chmod 770 /startup.sh
RUN sleep 10m
CMD ["startup.sh"]