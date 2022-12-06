# Blog-Project

A basic web application using `php`, `mysql` and `docker-compose`

---

Start application with: 

    docker-compose up -d

`mysqli` and `mysql_pdo` install commands are in Dockerfile. They will be installed. 
    
When docker build is done go into the `server` container using:

    docker exec -it containerName /bin/sh

And run: 

    composer install && vendor/bin/phinx migrate -e development && vendor/bin/phinx seed:run

`Phinx` and `phpunit` and `phpfaker` will be installed.

Application and its data should be ready. Check [localhost:8000](localhost:8000)

---

If update for migration or seed is needed then below are the steps:

Initiate `phinx`. This will create `phinx.php`:

    vendor/bin/phinx init

Set correct data in `phinx.php` and create a migration file:

    vendor/bin/phinx create MyNewMigration

Fill it as in [phinx_docs](https://book.cakephp.org/phinx/0/en/migrations.html) and migrate:

    vendor/bin/phinx migrate -e development

Create seed class:

    vendor/bin/phinx seed:create UserSeeder
