<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 5

$sql = "SELECT a.name AS author,
          a.id AS author_id,
          COUNT(b.author_id) AS books_count
        FROM authors a
        LEFT JOIN books b ON a.id = b.author_id
        GROUP BY a.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();