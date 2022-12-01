# Blog-Project

A basic web application using `php`, `mysql` and `docker-compose`

Start application with 

    `docker-compose up -d`
If no `vendor` folder appear, go into `www` container using 

    `docker exec -it containerName /bin/sh`

And run `composer install`

Notes:
- `composer install` command on Dockerfile RUN didnt work. Because when `docker-compose` is run, Host directory volume is mounted on container thus vendor and composer.lock is overridden and `composer install` should be run again after composing. Therefore `composer install` is added as CMD

- `phinx` and `phpunit` executables are in `vendor/bin`