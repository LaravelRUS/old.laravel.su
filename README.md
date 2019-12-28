## Сайт русскоязычного сообщества Laravel

Новая версия сайта [http://laravel.su](http://laravel.su). 

### Инсталляция

1. `make docker-up`
2. `make permissions`
3. `make composer install`
4. `cp .env.example .env`
5. `make art key:generate`
6. edit .env file (debug, url etc)
7. `make migrate-refresh`
8. `make update-docs`

Make под windows есть в cygwin. 
   
### Перевод документации
   
[Инструкция, как это делать правильно](http://laravel.su/articles/rus-documentation-contribution-guide).
