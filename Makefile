
workdir = /var/www/site

#composer path
phpunit = ./vendor/bin/phpunit

#docker compose container
app_exec = docker-compose exec --workdir $(workdir)
app_run  = docker-compose run --workdir $(workdir)

run:
	docker-compose stop
	docker-compose up -d --build
	docker-compose rm -f composer
	docker-compose exec php docker-php-ext-install mysqli
	docker-compose restart php
	make composer-install
bash:
	$(app_exec) web bash

composer-autoload:
	$(app_run) --rm composer dump-autoload

composer-install:
	$(app_run) --rm composer update

composer-update:
	$(app_run) --rm composer install

composer:
	$(app_run) --rm composer $(cmd)

test:
	$(app_exec) php $(phpunit) --testdox --colors=auto tests
