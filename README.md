# Сайт русскоязычного сообщества Laravel

Новая версия сайта [https://laravel.su](https://laravel.su). 

## Установка

1. Скачайте и установите Docker и Docker Compose.
2. Откройте консоль и выполните `docker-compose up --build`
> Это запустит рабочее приложение сайта. Для завершения работы - просто закройте консоль.
3. Откройте новую сессию терминала и выполните `docker exec -it laravelsu-php /bin/bash` 
> Это позволит войти внутрь контейнера
4. Выполните:
```bash
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate --seed
```
5. Откройте в браузере `http://localhost:7001/`

Пунткы 3 и 4 требуются только при первом запуске. В дальнейшем они понядобятся только при обновлениях.

### База Данных

Для подключения к базе снаружи контейнера используйте следующие параметры:

| Наименование | Значение       |
|--------------|----------------|
| Host         | localhost:7003 |
| Database     | laravelsu      |
| Login        | mysql_user     |
| Password     | mysql_password |

После установки вы увидите следующие таблицы:

![](https://habrastorage.org/webt/sw/xf/2y/swxf2yrlhrkywbprmaidvkxqoow.png)

### Заполнение базы данных

Для выгрузки самой последней документации [из репозитория GitHub](https://github.com/LaravelRUS/docs) стоит 
воспользоваться командой:
```bash
$ php artisan su:docs:update
```

Обратите внимание, что GitHub имеет ограничение на количество запросов и скорее всего у вас возникнет ошибка, 
которая содержит следующий текст:
```
\Github\Exception\RuntimeException You have reached GitHub hourly limit! Actual limit is: 60
```

В этот момент некоторая документация уже будет в наличии (скорее всего для Laravel 4.1) и ресурсом 
можно пользоваться.

Для выгрузки полной документации стоит прописать ключ GitHub в `.env` файл. Получить его можно на 
странице https://github.com/settings/tokens

1) Нажимаем на кнопку генерации нового токена (1).
2) Выставляем права на чтение репозиториев.
3) Получившийся ключ (2) вставляем в файл `.env` в качестве значения для переменной `GITHUB_CLIENT_SECRET`.

![](https://habrastorage.org/webt/eb/xv/17/ebxv172okbewdbgxwn-wquola7g.png)

После этого выгрузку всей документации можно произвести полностью, от начала и до конца.

### Системные требования для локальной установки.

- PHP 7.4 или выше
- MySql 5.7 или выше
- Веб-сервер (Apache, Nginx, Roadrunner, etc.)

### Перевод документации

[Инструкция, как это делать правильно](http://laravel.su/articles/rus-documentation-contribution-guide).
