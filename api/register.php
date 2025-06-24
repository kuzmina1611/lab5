<?php
header('Content-Type: application/json');
session_start();

$mysqli = new mysqli("localhost", "root", "", "beauty_salon");
if ($mysqli->connect_errno) {
    echo json_encode(['success' => false, 'error' => 'Ошибка подключения к БД']);
    exit;
}

// Получаем JSON-данные
$data = json_decode(file_get_contents('php://input'), true);
$name = trim($data['Imya'] ?? '');
$email = trim($data['Pochta'] ?? '');
$password = $data['Parole'] ?? '';

// Валидация
if (empty($name) || empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'error' => 'Все поля обязательны']);
    exit;
}

// Проверка корректности email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'error' => 'Некорректный email']);
    exit;
}

// Проверка, занят ли email
$stmt = $mysqli->prepare("SELECT ID_Users FROM users WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(['success' => false, 'error' => 'Email уже занят']); // Четкое сообщение
    exit;
}
$stmt->close();

// Регистрация
$role = 'user';
$regDate = date('Y-m-d H:i:s');
$stmt = $mysqli->prepare("INSERT INTO users (Name, Password, Email, Role, Registration_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $password, $email, $role, $regDate);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Регистрация успешна']);
} else {
    echo json_encode(['success' => false, 'error' => 'Ошибка БД: ' . $stmt->error]);
}

$stmt->close();
$mysqli->close();