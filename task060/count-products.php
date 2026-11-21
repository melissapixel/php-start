<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 7

$min_count = 0;
$sql = "SELECT c.name AS category,
          COUNT(p.category_id) AS count_products
        FROM categories c
        LEFT JOIN products p ON c.id = p.category_id
        GROUP BY c.id
        HAVING count_products > ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$min_count]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();