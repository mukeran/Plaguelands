FROM ubuntu:18.04

RUN sed -i 's/archive.ubuntu.com/mirrors.byrio.org/g' /etc/apt/sources.list
RUN sed -i 's/security.ubuntu.com/mirrors.byrio.org/g' /etc/apt/sources.list

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
RUN rm -rf /etc/nginx/sites-enabled/default
COPY www.conf /etc/nginx/sites-enabled/www.conf
RUN chmod -R 777 /Plaguelands
RUN python3 -m pip install -i https://pypi.tuna.tsinghua.edu.cn/simple -r /Plaguelands/SSTI/requirements.txt
RUN service nginx restart

COPY docker-entrypoint.sh /docker-entrypoint.sh
COPY initial.sql /initial.sql
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT [ "/docker-entrypoint.sh" ]