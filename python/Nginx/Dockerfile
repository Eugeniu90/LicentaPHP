FROM ubuntu:14.04

RUN apt-get -y update && apt-get -y install \
  nginx \
  nginx-extras \
  ca-certificates

# forward request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log
#RUN apt-get ins
ADD startup.sh /startup.sh
RUN chmod 770 startup.sh
#RUN rm -rf /etc/nginx
ADD nginx /etc/nginx/
EXPOSE 8086
#RUN sleep 10m

CMD ["/bin/sh","/startup.sh"]