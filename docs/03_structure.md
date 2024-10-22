# Структура Проекта

Структура проекта оставлена классической, такой же как предлагается в основном
[репозитории Laravel](https://github.com/laravel/laravel). Подробнее о базовой
структуре можно прочитать [в документации](https://laravel.su/docs/8.x/structure).

Помимо основных директорий добавлено несколько своих:
- [Директория `docker`](#директория-docker)
- [Директория `docs`](#директория-docs)
- [Директория `libs`](#директория-libs)

## Директория `docker`

Данная директория содержит дополнительные файлы конфигурации и данных для 
Docker. Каждая поддиректория сгруппированна по имени сервиса: Таким обазом 
директория `docker/php` содержит параметры настроек PHP, а директория 
`docker/nginx`, соответственно, содержит параметры настроек сервера nginx.

Исключением является директория `docker/data`, которая появляется после первого
запуска Docker и содержит информацию о проекте: Файлы логов nginx и redis 
серверов, файлы БД и прочее.

## Директория `docs`

Эта директория содержит краткую документацию по данному проекту в формате md 
файлов на русском языке.

## Директория `libs`

Директория "библиотек" содержит дополнительные независимые библиотеки, которые 
не зависят от основного кода проекта и могут быть в будущем вынесены в отдельные
пакеты Composer. Для их подключения в проект используется функционал Composer,
позволяющий разделять таким образом проект.

```json5
// composer.json основного проекта
{
    "repositories": [
        // Ссылка на библиотеку в локальной файловой системе
        {"type": "path", "url": "путь_к_локальной_библиотеке"},
    ],
    "require": {
        // Имя подключаемой библиотеки.
        //
        // Версия этой библиотеки будет эквивалентна используемой ветки git
        // (если, конечно, не прописать версию явно). Таким образом, если вы
        // работете в ветке "master", то версия библиотеки будет соответствовать
        // "dev-master".
        //
        // Следовательно, используем любую версию (т.е. "*"), чтобы версия не
        // зависела от текущей ветки git.
        "имя/библиотеки": "*"
    }
}
```

Каждая библиотека в директории `libs` содержит полноценный пакет Composer, за
тем исключением что он располагается локально, а не опубликован на packagist.org.

Подробнее о типах репозиториев можно прочитать
[в документации по Composer](https://getcomposer.org/doc/05-repositories.md)
