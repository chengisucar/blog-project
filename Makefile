all: build composer migrate seed

build:
	@echo "Running containers..."
	@docker-compose up -d

composer:
	@echo "Installing composer..."
	@docker-compose exec -it www composer install

migrate:
	@echo "Migration in proggress..."
	@docker-compose exec -it www vendor/bin/phinx migrate -e development

seed:
	@echo "Seeding test data..."
	@docker-compose exec -it www vendor/bin/phinx seed:run
	@echo "\n\n\n===================>>>>>>>>>> App:   http://localhost  <<<<<<<<<=============="
	@echo "\n=============>>>>>>>>>> PhpMyAdmin:   http://localhost  <<<<<<<<<==============\n\n\n"