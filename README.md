# Beauty Salon - Nova Beauty

## Описание
Веб-приложение для салона красоты с функционалом онлайн-записи, личным кабинетом и административной панелью.

## Требования
- PHP версии 7.4 и выше
- MySQL 5.7 и выше
- Веб-сервер Apache (например, XAMPP)
- Современный браузер (Chrome, Firefox, Edge)

## Установка и запуск

### 1. Клонирование проекта


git clone https://github.com/kuzmina1611/lab5.git

### 2. Размещение в папке локального сервера
Поместите проект в папку локального сервера. Например, для XAMPP:
`C:\xampp\htdocs\lab5`
После этого сайт будет доступен по адресу:
http://localhost/lab5

### 3. Импорт базы данных
1. Перейдите в http://localhost/phpmyadmin
2. Создайте базу данных с именем beauty_salon
3. Импортируйте файл beauty_salon.sql из проекта

### 4. Подключение к базе данных
Файл подключения (db.php):
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_salon";
