Docker Compose :
- nginx:alpine 			-> Expose Port 80
- mysql:5.6 			-> Expose Port 3306
- php:7.2-fpm-alpine 	-> Null
- redis:4.0.5-alpine 	-> Expose Port 6379

Sebelum Start Docker Compose buat folder ini :
- /docker/mysql/data/
- /docker/redis/data/
- /docker/nginx/logs/

Rename file dan folder ini :
- .env_sample -> .env
- www_sample -> www

Web root ada di directory docker ./www
ada 3 example web : info, mysql, redis

Config nginx virtual host ada di directory ./docker/nginx/sites-available
ada 3 example config virtual host :
- info.local.conf
- mysql.local.conf
- redis.local.conf


Pointing virtual host docker ke computer host, tambah list domain di /etc/hosts :
- 127.0.0.1       mysql.local
- 127.0.0.1       redis.local
- 127.0.0.1       info.local
