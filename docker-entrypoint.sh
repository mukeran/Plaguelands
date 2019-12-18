#!/bin/sh

while ! mysql -h mysql -uroot -proot -P 3306 -e 'exit'; do
    sleep 1
    echo 'Waiting for mysql'
done

if [ ! -f 'lock' ]; then
    mysql -h mysql -uroot -proot -P 3306 < /initial.sql || exit 1
    touch lock
fi

service nginx start
service php7.2-fpm start
python3 /Plaguelands/SSTI/app.py