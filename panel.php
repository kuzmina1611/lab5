<?php
session_start();
require 'db.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получение данных пользователя
$stmt = $conn->prepare("SELECT * FROM users WHERE ID_Users = ?");
$stmt->bind_param("i", $_SESSION['user_id']); // "i" - integer
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Проверка роли (только для администраторов)
if ($user['Role'] !== 'Администратор') {
    header("Location: cabinet.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора Beauty Salon</title>
    <link rel="stylesheet" href="css/panel.css">
</head>
<body>
    <div class="sidebar">
        <h2>Nova Beauty</h2>
        <ul id="tables-list">
            <li><a href="#" data-table="records">Записи</a></li>
            <li><a href="#" data-table="services">Услуги</a></li>
            <li><a href="#" data-table="masters">Мастера</a></li>
            <li><a href="#" data-table="the_masters_schedule">График мастеров</a></li>
            <li><a href="#" data-table="specific_services">Конкретные услуги</a></li>
            <li><a href="#" data-table="cosmetic_products">Косметика и продукты</a></li>
            <li><a href="#" data-table="users">Пользователи</a></li>
            <li><a href="#" data-table="type_of_service">Типы услуг</a></li>
            <li><a href="#" data-table="zapros1">Запрос 1</a></li>
            <li><a href="#" data-table="zapros2">Запрос 2</a></li>
            <li><a href="#" data-table="zapros3">Запрос 3</a></li>
            <li><a href="#" data-table="zapros4">Запрос 4</a></li>
            <li><a href="#" data-table="zapros5">Запрос 5</a></li>
            <li><a href="#" data-table="zapros6">Запрос 6</a></li>
            <li><a href="#" data-table="zapros7">Запрос 7</a></li>
            <li><a href="#" data-table="zapros8">Запрос 8</a></li>
            <li><a href="#" data-table="zapros9">Запрос 9</a></li>
            <li><a href="#" data-table="zapros10">Запрос 10</a></li>

        </ul>
        <div class="user-info">
            <p class="user-info-text">Вы вошли как: <?= htmlspecialchars($user['Name']) ?></p>
            <a href="cabinet.php" class="back-to-cabinet">В личный кабинет</a>
            <a href="logout.php" class="logout-admin">Выйти</a>
        </div>
    </div>
    
    <div class="content">
        <h1 id="table-title">Выберите таблицу</h1>
        <div class="controls">
            <button class="btn btn-edit" id="edit-btn">Редактировать</button>
            <button class="btn btn-delete" id="delete-btn">Удалить</button>
            <button class="btn btn-add" id="add-btn">Добавить запись</button>
        </div>
        
        <div id="table-container">
            <p class="empty-message">Пожалуйста, выберите таблицу из меню слева</p>
        </div>
    </div>
    
    <script src="admin.js"></script>
</body>
</html>