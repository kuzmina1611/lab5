<?php
require 'db.php';

$table = $_GET['table'] ?? '';
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

if (!$table || !$action) {
    http_response_code(400);
    echo 'Недопустимые параметры';
    exit;
}

// Получение всех полей таблицы
$columns = [];
$stmt = $pdo->query("DESCRIBE `$table`");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $columns[] = $row['Field'];
}

// Определение имени первичного ключа
$primaryKey = null;
$stmt = $pdo->query("SHOW KEYS FROM `$table` WHERE Key_name = 'PRIMARY'");
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $primaryKey = $row['Column_name'];
}

// Получение данных при редактировании
$data = [];
if ($action === 'edit' && $id && $primaryKey) {
    $stmt = $pdo->prepare("SELECT * FROM `$table` WHERE `$primaryKey` = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Генерация формы
echo '<form id="edit-form">';
foreach ($columns as $col) {
    if ($action === 'add' && $col === $primaryKey) continue;

    $value = $data[$col] ?? '';
    echo "<label>$col:<br><input type='text' name='$col' value='" . htmlspecialchars($value) . "'></label><br>";
}
echo '<button type="submit">Сохранить</button>';
echo '</form>';
?>
