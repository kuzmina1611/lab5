<?php
require 'db.php';

// Проверка соединения
if (!$conn) {
    http_response_code(500);
    echo "Ошибка подключения к базе данных";
    exit;
}

$table = $_GET['table'] ?? '';
$allowedTables = [
    'cosmetic_products',
    'masters',
    'records',
    'services',
    'specific_services',
    'the_masters_schedule',
    'type_of_service',
    'users',
    'zapros1',
    'zapros2',
    'zapros3',
    'zapros4',
    'zapros5',
    'zapros6',
    'zapros7',
    'zapros8',
    'zapros9',
    'zapros10'
];

if (!in_array($table, $allowedTables)) {
    http_response_code(400);
    echo "Недопустимая таблица";
    exit;
}

$result = $conn->query("SELECT * FROM `$table`");

if ($result->num_rows > 0) {
    echo "<table><tr class='header-row'>";
    // Заголовки
    while ($field = $result->fetch_field()) {
        echo "<th>{$field->name}</th>";
    }
    echo "</tr>";
    // Данные
    while ($row = $result->fetch_assoc()) {
        echo "<tr data-id='{$row[array_key_first($row)]}'>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='no-data'>Нет данных</div>";
}
?>