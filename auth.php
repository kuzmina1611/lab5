<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "beauty_salon");
if ($mysqli->connect_errno) {
    die("Ошибка подключения к БД: " . $mysqli->connect_error);
}

// Регистрация
if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($name == '' || $email == '' || $password == '') {
        $_SESSION['error'] = "Все поля обязательны для заполнения";
        header("Location: index.php");
        exit;
    }

    // Проверка на существующий email
    $stmt = $mysqli->prepare("SELECT ID_Users FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Пользователь с таким Email уже существует";
        header("Location: index.php");
        exit;
    }
    $stmt->close();

    $role = 'user';
    $regDate = date('Y-m-d H:i:s');

    // Вставляем нового пользователя, не указывая ID_Users — он автоинкрементится
    $stmt = $mysqli->prepare("INSERT INTO users (Name, Password, Email, Role, Registration_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $password, $email, $role, $regDate);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_role'] = $role;
        $stmt->close();
        $mysqli->close();
        header("Location: cabinet.php");
        exit;
    } else {
        $_SESSION['error'] = "Ошибка регистрации: " . $stmt->error;
        header("Location: index.php");
        exit;
    }
}

// Вход
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($email == '' || $password == '') {
        $_SESSION['error'] = "Введите email и пароль";
        header("Location: index.php");
        exit;
    }

    $stmt = $mysqli->prepare("SELECT ID_Users, Name, Password, Role FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $name, $dbPassword, $role);
        $stmt->fetch();

        if ($password === $dbPassword) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_role'] = $role;
            $stmt->close();
            $mysqli->close();
            header("Location: cabinet.php");
            exit;
        } else {
            $_SESSION['error'] = "Неверный пароль";
            header("Location: index.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Пользователь не найден";
        header("Location: index.php");
        exit;
    }
}
?>