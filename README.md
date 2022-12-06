# Blog-Project

A basic web application using `php`, `mysql` and `docker-compose`

---

Start application with: 

    docker-compose up -d

    
When docker build is done go into the `server` container using:

    docker exec -it containerName /bin/sh

And run: 

    composer install && vendor/bin/phinx migrate -e development && vendor/bin/phinx seed:run

`Phinx` and `phpunit` and `phpfaker` will be installed.

Application and its data should be ready. Check [localhost:8000](localhost:8000)

---

<br/><br/>
If an update for migration or seeding is needed then below are the steps:

After `composer install` initiate `phinx`. This will create `phinx.php`:

    vendor/bin/phinx init

Set db connection data in `phinx.php` and create a migration file:

    vendor/bin/phinx create MyNewMigration

Fill it as in [phinx_docs](https://book.cakephp.org/phinx/0/en/migrations.html) and migrate:

    vendor/bin/phinx migrate -e development

Create seed class:

    vendor/bin/phinx seed:create UserSeeder

Fill it with test data preferably using `faker` library and run seed:

    vendor/bin/phinx seed:run