<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 4

$sql = "SELECT b.title,
          a.name AS author
        FROM authors a
        LEFT JOIN books b ON b.author_id = a.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();