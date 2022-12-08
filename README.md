# Blog-Project

A basic web application using `php`, `mysql` and `docker-compose`

---

Build environment with: 

    make 

These will install `Phinx`,`phpunit`, `phpfaker` and execute `migration` and `seed`.

Then application and its data should be ready
-  [localhost](http://localhost/)
-  [phpmyadmin](http://localhost:8080/)


If you want to skip __migration__ or __data seed__ steps, then first check `Makefile` and run the relevant steps or commands.
<br/><br/>

---

<br/>

## Notes
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