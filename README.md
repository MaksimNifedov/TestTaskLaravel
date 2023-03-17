# TestTaskLaravel

С Docker не получилось настроить POST-запросы.

1. Клонируйте репозиторий
2. Проверьте пользователя и пароль MySQL, так же название БД.
3. Выполните миграции php artisan migrate
4. Запустить сервер php artisan serve

Тестировал работу в Postman

POST http://localhost:8000/api/v1/notebook/?FIO=Max&phone=88005353&email=example@gmail.com добавит запись о человеке

GET http://localhost:8000/api/v1/notebook/ Вернет список всех записей по 5 на страницу

GET http://localhost:8000/api/v1/notebook?page=2 Вернет записи с 5 по 10

GET http://localhost:8000/api/v1/notebook/1 Вернет первую запись

POST http://localhost:8000/api/v1/notebook/1?email=new@gmail.ru обновит почту у первой записи

DELETE http://localhost:8000/api/v1/notebook/1/ Удаление первой записи

Документация API-методов и модели.
http://127.0.0.1:8000/api/documentation#/notebook