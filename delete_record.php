<?php
header('Content-Type: application/json');

require 'db.php';

if (!$conn) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

$table = $_GET['table'] ?? '';
$id = (int)($_GET['id'] ?? 0);

$allowedTables = [
    'cosmetic_products', 
    'masters', 
    'records', 
    'services', 
    'specific_services', 
    'the_masters_schedule', 
    'type_of_service', 
    'users'
];

if (!$id || !in_array($table, $allowedTables)) {
    echo json_encode(['success' => false, 'message' => 'Invalid parameters']);
    exit;
}

try {
    // Сначала узнаем имя первичного ключа
    $res = $conn->query("SHOW KEYS FROM `$table` WHERE Key_name = 'PRIMARY'");
    if (!$res || $res->num_rows === 0) {
        throw new Exception("Primary key not found");
    }
    $primaryKey = $res->fetch_assoc()['Column_name'];
    
    // Выполняем удаление
    $stmt = $conn->prepare("DELETE FROM `$table` WHERE `$primaryKey` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // Проверяем результат
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Record deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No record was deleted']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

// Закрываем соединение
if (isset($stmt)) $stmt->close();
$conn->close();
?>