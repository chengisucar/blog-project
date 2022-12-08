all: composer migrate seed

build:
	@docker-compose up -d
	@docker exec -it blog-project-www-1 /bin/sh

composer:
	@composer install

migrate:
	@vendor/bin/phinx migrate -e development

seed:
	@vendor/bin/phinx seed:run