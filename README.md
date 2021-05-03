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

- `/task/` - **CRUD** format
- `/api/v1/task` - **REST** format

Please consider *[Postman](https://g.co/kgs/ZNJ1Y1)* usage. REST authentication:

- `X-AUTH-TOKEN`: `7cf7046f676bbc149803541c658deba9`

Export to *XSLX*:

- `curl -H "X-AUTH-TOKEN: 7cf7046f676bbc149803541c658deba9" http://localhost:8000/export --output table-long.xslx`
