
workdir = /var/www/site

#composer path
phpunit = ./vendor/bin/phpunit

#docker compose container
app_exec = docker-compose exec --workdir $(workdir)
app_run  = docker-compose run --workdir $(workdir)

run:
	docker-compose stop
	docker-compose up -d --build

bash:
	$(app_exec) web bash

composer-autoload:
	$(app_run) --rm composer dump-autoload

composer-update:
	$(app_run) --rm composer update

composer:
	$(app_run) --rm composer $(cmd)

test:
	$(app_exec) web  $(phpunit) --testdox --colors=auto tests
