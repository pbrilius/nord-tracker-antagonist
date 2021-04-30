# Startup app

```shell
composer install
cp -v .env .env.local
cp -v phpunit.xml.dist phpunit.xml
```

- add the database - *MySQL* - credentials; create the database with authorized granted user first.

Run **phpunit** with `php ./vendor/bin/phpunit`. Migrate by `symfony console doctrine:migrations:migrate`.
Generate fixtures - `php bin/console doctrine:fixtures:load`.

## Serving

```shell
symfony serve
```

## Navigation

`/task/` - **CRUD** format.
