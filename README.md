1. Приложение позволяет загружать файлы зарегистрированным пользователям.
2. Приложение позволяет выводить имя файла вместе с логотипом типа файла, т.е. если например файл формата “doc” у пользователя отображается логотип “doc” и внизу название файла. Предусмотрен вывод файлов текущего пользователя и файлов всех пользователей на странице текущего, все разделено в удобном для понимания виде.
3. Dump БД не прилагается к текущим файлам. Предусмотрено создание БД локально на каждой машине. Для создания необходимо ввести пользователя, пароль и хост, данные вводятся в файле includes/data.php переменные $host, $user, $pass. Название создаваемой БД “andrukevich_eugene_php_test”, название также можно изменить переменная $dbname в файле includes/data.php
4. Загружаемые файлы не хранятся в БД. При создании БД создается папка с названием “uploaded_files”(переменная $uploaddir в файле includes/data.php) , где будут хранится файлы, в БД хранится путь к этим файлам.
5. Создание пользователей с одинаковыми email запрещено, поле email в БД уникальное.
6. Приложение сделано под ОС Windows.
