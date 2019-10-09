up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down-clear docker-pull docker-build docker-up demo-init

docker-up:
	docker-compose up -d --build

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

demo-init: demo-composer-install demo-migration demo-fixtures

demo-composer-install:
	docker-compose run --rm php-cli composer install

demo-migration:
	docker-compose run --rm php-cli php bin/console doctrine:migration:migrate --no-interaction

demo-fixtures:
	docker-compose run --rm php-cli php bin/console doctrine:fixtures:load --no-interaction
