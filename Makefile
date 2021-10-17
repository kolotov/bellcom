run:
	docker-compose up -d --build

exec:
	docker-compose exec --workdir /usr/share/nginx/html web bash
