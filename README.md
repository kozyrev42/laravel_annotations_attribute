<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

php -S 127.0.0.1:8000 -t public

1. Установка проекта: composer create-project --prefer-dist laravel/laravel laravel_annotations_attribute

2. Регистрация методов, как консольных команд с помощью атрибута:
- создан атрибут Attributes\ConsoleCommand, который можно будет применять к методам класса
- создан класс с методом, к которому применим наш атрибут ConsoleCommand. Этот метод будет выполнять какую-либо задачу, в нашем случае — находить факториал числа.
- создан простой сервис-провайдер ConsoleCommandServiceProvider, который будет сканировать указанный класс или классы на наличие методов, помеченных атрибутом #ConsoleCommand, и регистрировать их как консольные команды
- вывод: сделана реализация механизма для использования созданного атрибута ConsoleCommand. Теперь, когда вы добавляете атрибут ConsoleCommand к методам в указанных классах, эти методы будут автоматически регистрироваться как консольные команды приложении Laravel.

3. Аннотации, например, OpenAPI (@OA...) размещаются в комментариях PHP над методами контроллеров (или другими частями вашего кода, которые вы хотите задокументировать). 

Эти комментарии не влияют на выполнение PHP-кода. Вместо этого они служат метаданными для инструментов, которые могут их интерпретировать(распознать и как-то их применить).

Чтобы преобразовать эти аннотации в документацию API, используются специальные инструменты, такие как Swagger-UI или Redoc. Для генерации самой документации из аннотаций чаще всего используется библиотека swagger-php. Эта библиотека анализирует код, находит аннотации OpenAPI и генерирует из них файл OpenAPI спецификации (обычно в формате JSON или YAML). Этот файл затем может быть использован для генерации красивой интерактивной документации API.