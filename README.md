## Сайт русскоязычного сообщества Laravel

Новая версия сайта [http://laravel.su](http://laravel.su). 

### Установка VPS 

Купить vps на Ubuntu 18.04, зайти под root, cкопировать на vps файл `install_vps.sh` . 

Отредактировать файл - изменить имя пользователя, sudo-пароль и добавить содержимое id_rsa.pub со всех устройств, с которых будет разрешён вход на vps. Вход по паролю будет запрещён.  

```
chmod +x install_vps.sh

./install_vps.sh 
```

Войти на vps под заданным пользователем.

### Установка сайта

Склонировать сайт.

1. `make docker-up`
2. `make permissions`
3. `make composer install`
4. `cp .env.example .env`
5. `make art key:generate`
6. edit .env file (debug, url etc)
7. `make migrate`
8. `make update-docs`
9. Для периодического обновления документации установить крон 1 */1 * * * cd /path/to/site && docker-compose exec php php artisan su:update_docs

Make под windows есть в cygwin. 
   
### Перевод документации
   
[Инструкция, как это делать правильно](http://laravel.su/articles/rus-documentation-contribution-guide).
