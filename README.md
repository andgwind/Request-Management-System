# Тестовое задание

---

## Общие положения:
- Данное тестовое задание не направлено на полноценную реализацию задачи, сколько на возможность продемонстрировать уровень понимая в таких вопросах, как: PHP, REST API, работа с СУБД, основы безопасности. Помните, у задания не существует единственно правильного решения, но каждому вашему решению должно находиться объяснение.
- Постарайтесь показать свои лучшие практики написания кода.
- В процессе выполнения можно использовать любые библиотеки и фреймворки, если они позволяют реализовать задачу качественно и быстрее, но в случае использования библиотек будьте готовы объяснить, почему используется конкретная библиотека, если появятся таковые вопросы.
- Тем не менее, предпочтительна реализация на Laravel (8+), Yii2 (последняя стабильная версия), Symfony 5+. В качестве СУБД можно использовать MySQL 5.7 или PostgreSQL актуальной стабильной версии.
- Предпочтительно выложить сайт в GIt репозиторий. По возможности, ведите историю коммитов, чтобы мы могли отследить Ваш процесс разработки.
- По возможности и при наличии времени, очищайте неиспользуемый шаблонный код.

## Общее описание:
Необходимо реализовать систему принятия и обработки заявок пользователей с сайта. Любой пользователь может отправить данные по публичному API, реализованному нами, оставив заявку с каким-то текстом. Затем заявка рассматривается ответственным лицом и ей устанавливается статус Завершено. Чтобы установить этот статус, ответственное лицо должно оставить комментарий. Пользователь должен получить свой ответ по email.
При этом, ответственное лицо должно иметь возможность получить список заявок, отфильтровать их по статусу и по дате, а также иметь возможность ответить задающему вопрос через email.

## Сущности:

---
### Заявка
| Поле          | Описание                                       | Тип данных              |
| ------------- | ---------------------------------------------- | ----------------------- |
| id            | Уникальный идентификатор                       | Целое число             |
| name          | Имя пользователя - строка, обязательная      | Строка                  |
| email         | Email пользователя - строка, обязательная    | Строка                  |
| status        | Статус - enum("Active", "Resolved")           | Строка (возможно enum)  |
| message       | Сообщение пользователя - текст, обязательный | Текстовая строка        |
| comment       | Ответ ответственного лица - текст, обязательный, если статус Resolved | Текстовая строка |
| created_at    | Время создания заявки - timestamp или datetime | Временная метка         |
| updated_at    | Время ответа на заявку - timestamp или datetime | Временная метка         |



### Endpointы API:
Методы API должны быть документированы каким-нибудь средством документации на ваш выбор. Предпочтительно, с наличием песочницы.
- GET /requests/ - получение заявок ответственным лицом, с фильтрацией по статусу
- PUT /requests/{id}/ - ответ на конкретную задачу ответственным лицом
- POST /requests/ - отправка заявки пользователями системы

### Дополнения:
- Вы можете дополнять задачу отдельными методами и расширять объем входящих параметров, если посчитаете нужным
- Вы можете сделать авторизацию как и для публичного пользователя, так и для ответственного лица так, как вы посчитаете нужным
- Вы можете сами рассмотреть особенности безопасности входящих запросов, чтобы избежать кроссдоменных запросов или же наоборот, разрешить их безопасно
- Вам необязательно делать web интерфейс для отправки заявок и ответа на них
- Вам разрешено делать дополнительные улучшения, дополнительные фильтрации и методы API, но будьте готовы их прокомментировать
- Вам также разрешено переименовать поля сущностей и добавить новые, если вы считаете, что они приведут к большему пониманию того, что происходит в предметной области задачи или расширят ее (Например, endpoint удаления задачи, прикрепление за заявкой ответственного лица и д.р.)
- Дополнительно будет преимуществом, если вы представите себе, что заявки отправляются очень часто и храниться их может огромное количество
- Для отправки email можете воспользоваться NullObject реализацией какого-нибудь стандартного интерфейса, либо же сохранять email в виде plain файлов в директории временных файлов вашего фреймворка или по вашему выбору
- Unit тесты также приветствуются




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
