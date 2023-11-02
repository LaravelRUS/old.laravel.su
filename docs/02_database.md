# База Данных

База Данных содержит следующие параметры доступа:

| Наименование | Значение       |
|--------------|----------------|
| Host         | localhost:8081 |
| Database     | laravelsu      |
| Login        | mysql_user     |
| Password     | mysql_password |

База Данных содержит следующие таблицы:

| Наименование             | Описание                                  | Предназначение   |
|--------------------------|-------------------------------------------|------------------|
| `articles`               | Текстовые страницы                        | Пользовательская |
| `docs`                   | Страницы документации                     | Пользовательская |
| `migrations`             | Информация о миграциях БД                 | Системная        |
| `telescope_entries`      | Используется пакетом Telescope            | Системная        |
| `telescope_entries_tags` | Используется пакетом Telescope            | Системная        |
| `telescope_monitoring`   | Используется пакетом Telescope            | Системная        |
| `versions`               | Версии документации                       | Пользовательская |