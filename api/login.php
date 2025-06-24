<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    try {
        // Ищем пользователя
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['Password'])) {
            // Успешный вход
            $_SESSION['user_id'] = $user['ID_Users'];
            $_SESSION['user_name'] = $user['Name'];
            $_SESSION['user_role'] = $user['Role'];
            
            header("Location: cabinet.php");
            exit();
        } else {
            throw new Exception("Неверный email или пароль");
        }
    } catch (Exception $e) {
        // Логируем ошибку
        error_log("Login error: " . $e->getMessage());
        $_SESSION['error'] = "Ошибка входа: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
    <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red;"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
</body>
</html>