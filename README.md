# symfony_testapp

## Installation
```
# install packages
$ composer install

# up a docker container
$ docker-compose up -d

# run migrations
$ php bin/console doctrine:migrations:migrate
```

## Start
```
# run fixtures for testing data
$ php bin/console doctrine:fixtures:load --group=test

# start local server
$ symfony serve -d
```
