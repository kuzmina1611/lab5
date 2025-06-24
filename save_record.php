<?php
header('Content-Type: application/json');
require 'db.php';

$table = $_GET['table'] ?? '';
$action = $_GET['action'] ?? '';

if (!$table || !$action) {
    echo json_encode(['success' => false, 'message' => 'Недопустимые параметры']);
    exit;
}

// Получение всех полей таблицы
$stmt = $pdo->query("DESCRIBE `$table`");
$columns = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $columns[] = $row['Field'];
}

// Получение имени PRIMARY KEY
$stmt = $pdo->query("SHOW KEYS FROM `$table` WHERE Key_name = 'PRIMARY'");
$pkRow = $stmt->fetch(PDO::FETCH_ASSOC);
$primaryKey = $pkRow['Column_name'] ?? null;

$data = [];
foreach ($columns as $col) {
    if (isset($_POST[$col])) {
        $data[$col] = $_POST[$col];
    }
}

try {
    if ($action === 'add') {
        if ($primaryKey && isset($data[$primaryKey])) {
            unset($data[$primaryKey]); // не вставляем вручную PK
        }

        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');

        $stmt = $pdo->prepare("INSERT INTO `$table` (`" . implode("`,`", $fields) . "`) VALUES (" . implode(",", $placeholders) . ")");
        $stmt->execute(array_values($data));
    } elseif ($action === 'edit' && $primaryKey && isset($_POST[$primaryKey])) {
        $id = $_POST[$primaryKey];
        unset($data[$primaryKey]);

        $setClause = implode(", ", array_map(fn($f) => "`$f` = ?", array_keys($data)));
        $stmt = $pdo->prepare("UPDATE `$table` SET $setClause WHERE `$primaryKey` = ?");
        $stmt->execute([...array_values($data), $id]);
    } else {
        throw new Exception('Неверное действие или отсутствует ключ');
    }

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
