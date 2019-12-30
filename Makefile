# https://makefile.site
ARGS = $(filter-out $@,$(MAKECMDGOALS))
%:
 @:

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

docker-rebuild:
	docker-compose down && docker-compose up -d --build

composer:
	docker-compose exec php composer $(ARGS)

art:
	docker-compose exec php php artisan $(ARGS)

php:
	docker-compose exec php php $(ARGS)

migrate:
	docker-compose exec php php artisan migrate

migrate-refresh:
	docker-compose exec php php artisan migrate:refresh
	docker-compose exec php php artisan ide-helper:models -W -R

ide:
	docker-compose exec php php artisan ide-helper:generate
	docker-compose exec php php artisan ide-helper:models -W -R

update-docs:
	docker-compose exec php php artisan su:update_docs

clear:
	docker-compose exec php php artisan cache:clear
	docker-compose exec php php artisan config:clear
	docker-compose exec php php artisan route:clear
	docker-compose exec php php artisan view:clear

permissions:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache

test:
	docker-compose exec php vendor/bin/phpunit

queue:
	docker-compose exec php php artisan queue:work

