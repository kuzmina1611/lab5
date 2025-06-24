<?php
$host = 'localhost';
$dbname = 'beauty_salon';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$conn = new mysqli("localhost", "root", "", "beauty_salon");

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}
?>