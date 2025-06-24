<?php
session_start();
require 'db.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получение данных пользователя
$stmt = $pdo->prepare("SELECT * FROM users WHERE ID_Users = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

// Проверка роли и запрет доступа к админ-панели для клиентов
if (isset($_GET['admin']) && $user['Role'] !== 'Администратор') {
    header("Location: cabinet.php");
    exit();
}

// Получение записей пользователя
$records = $pdo->prepare("
    SELECT r.*, s.Name as service_name, m.FIO as master_name 
    FROM records r
    JOIN services s ON r.ID_Services = s.ID_Services
    JOIN masters m ON r.ID_Masters = m.ID_Masters
    WHERE r.ID_Users = ?
    ORDER BY r.Date_and_time DESC
");
$query = "SELECT Name FROM users WHERE ID_Users = :id";

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/cabinet.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="logo">
                    <img src="img/13.jpg" alt="Nova Beauty" class="logo__img">
                    <span class="logo__text">Nova Beauty</span>
                </div>
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#services" class="nav__link">Услуги</a></li>
                        <li class="nav__item"><a href="#promotions" class="nav__link">Акции</a></li>
                        <li class="nav__item"><a href="masters.php" class="nav__link">Мастера</a></li>
                        <li class="nav__item"><a href="contacts.php" class="nav__link">Контакты</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">О салоне</a></li>
                        <li class="nav__item">
                            <a href="#" class="nav__link" onclick="openAuthModal(); return false;">Личный кабинет</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="container" style="pading: 20px;">
        <div class="cabinet">
            <h1>Добро пожаловать, <?= htmlspecialchars($user['Name']) ?>!</h1>

            <section class="profile">
                <h2>Ваши данные</h2>
                <p>Имя: <?= htmlspecialchars($user['Name']) ?></p>
                <p>Email: <?= htmlspecialchars($user['Email']) ?></p>
                <p>Дата регистрации: <?= $user['Registration_date'] ?></p>
                <p>Роль: <?= $user['Role'] ?></p>
            </section>

            <section class="records">
                <h2>Ваши записи</h2>
                <?php if ($records->rowCount() > 0): ?>
                    <?php while ($record = $records->fetch()): ?>
                        <div class="record">
                            <p>Услуга: <?= htmlspecialchars($record['service_name']) ?></p>
                            <p>Мастер: <?= htmlspecialchars($record['master_name']) ?></p>
                            <p>Дата: <?= $record['Date_and_time'] ?></p>
                            <p>Статус: <?= $record['Recording_status'] ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>У вас пока нет записей.</p>
                <?php endif; ?>
            </section>

            <div class="button-group">
                <a href="logout.php" class="button-logout">Выйти</a>
                <?php if ($user['Role'] === 'Администратор'): ?>
                    <a href="panel.php" class="button-admin">Админ-панель</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>