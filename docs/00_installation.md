# Установка

## Системные Требования

Для установки сайта вам потребуется только Docker.

- Для Windows достаточно воспользоваться ссылкой 
  [docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop)
- Для Linux (Debian-like) выполните `sudo apt install docker-ce`
  (Подробнее [docs.docker.com/engine/install](https://docs.docker.com/engine/install/))

## Установка

1) Скопируйте `.env.example` в `.env`:
   ```shell
   $ cp .env.example .env
   ```

2) Запустите сайт
   ```shell
   $ docker-compose up --build
   ``` 

Это запустит рабочее приложение сайта.

> Для завершения работы - просто закройте консоль.

После того, как сайт запустится вам потребуется настроить PHP и БД для его
корректной работы. Поэтому, для выполнения данных действий вам нужно войти 
внутрь контейнера и произвести ряд действий.

3) Для входа внутрь контейнера PHP вам потребуется открыть новое консольное окно и
   выполнить:
   ```shell
   $ docker exec -it laravelsu-php /bin/bash
   ```

После этого вы окажетесь внутри контейнера. 

4) Далее устанавливаем PHP зависимости сайта.
   ```shell
   $ composer install
   ```
5) Выдаём права для пользователя www-data для записи в кеш (опционально, может
   не потребоваться).
   ```shell
   $ chown www-data:www-data -R storage
   $ chown 0777 -R storage
   $ chown www-data:www-data -R bootstrap
   $ chown 0777 -R bootstrap
   ```

6) Генерация ключа шифрования Laravel (требуется, например, для работы сессий).
   ```shell
   $ php artisan key:generate
   ```

7) Создаём необходимые таблицы БД и заполняем некоторые тестовыми данными.
   ```shell
   $ php artisan migrate --seed
   ```

## Результат

После всех проделанных операций вам будет доступен сам сайт по адресу 
[`http://localhost:8080`](http://localhost:8080) (можно открыть в браузере).
