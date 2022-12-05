# Blog-Project

A basic web application using `php`, `mysql` and `docker-compose`

Start application with 

    `docker-compose up -d`
    
`vendor` folder will not appear, go into `server` container using 

    `docker exec -it containerName /bin/sh`

And run `composer install`

Version Notes:

- `composer install` command on Dockerfile RUN didnt work. Because when `docker-compose` is run, Host directory volume is mounted on container thus vendor and composer.lock is overridden and `composer install` should be run again after composing. Therefore `composer install` is added as CMD. 
- That didnt work as well since container automatically exits after running CMD command. 
- CMD `composer install` command removed. Needs to be manually run

- `phinx` and `phpunit` executables are in `vendor/bin`

- for mysql connections `mysqli` is used.

- no db migration/phinx is used. db tables are created via phpMyAdmin