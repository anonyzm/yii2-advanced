#############################################
#                                           #
#                  USAGE                    #
#                                           #
#          make env                         #
# ** edit .env & docker/nginx/vhost.conf ** #
#          make build                       #
#                                           #
#############################################

# environment initalization
env:
	cp ./.env.dist ./app/.env
	ln -s ./app/.env ./.env
	cp ./docker/nginx/vhost.conf.dist ./docker/nginx/vhost.conf

# project compilation
build: up composer-install migrate

# docker containers up
up:
	docker-compose up -d

# docker containers down
down:
	docker-compose stop

# installing composer dependencies
composer-install:
	docker-compose exec --user application php bash -c 'cd /app; composer install'

# proceeding migrations
migrate:
	timeout 5
	docker-compose exec --user application php php /app/yii migrate --interactive=0

# shortcut to enter php container as application user
bash:
	docker-compose exec --user application php bash

# shortcut to enter php container as root
bash-root:
	docker-compose exec php bash




