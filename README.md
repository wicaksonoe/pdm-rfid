README
 
> *$ = run as user* <br>
> *# = run as root* 
 
> First thing first <br>
> `$ docker-compose build` 
 
> First time run compose <br>
> `$ docker-compose up -d` 
 
> Stop all container <br>
> `$ docker-compose build` 
 
> Start all container <br>
> `$ docker-compose start 
 
> Start terminal to use *`php artisan`* <br>
> `$ docker-compose exec -u 1000:1000 php /bin/sh` 
 
```
webserver   : http://localhost:5080 
mysql       : mysql://localhost:5081 
phpmyadmin  : http://localhost:5082 
```
