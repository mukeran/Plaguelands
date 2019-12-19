FROM ubuntu:18.04

RUN apt-get update && apt-get install -yq --no-install-recommends \
    ca-certificates \
    apt-utils \
    php7.2-fpm \
    php7.2-mysql \
    nginx-full \
    mysql-client \
    python3 \
    python3-pip

COPY bin /Plaguelands
RUN mkdir /Plaguelands/upload
RUN rm -rf /etc/nginx/sites-enabled/default
COPY www.conf /etc/nginx/sites-enabled/www.conf
RUN chmod -R 777 /Plaguelands
RUN python3 -m pip install -r /Plaguelands/SSTI/requirements.txt
RUN service nginx restart

COPY docker-entrypoint.sh /docker-entrypoint.sh
COPY initial.sql /initial.sql
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT [ "/docker-entrypoint.sh" ]