<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 6

$sql = "SELECT u.name,
          COUNT(p.user_id) AS count_posts
        FROM users u
        LEFT JOIN posts p ON u.id = p.user_id
        GROUP BY u.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();