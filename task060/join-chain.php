<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 3

$sql = "SELECT b.title,
          a.name AS author,
          g.name AS genre
        FROM books b
        INNER JOIN authors a ON b.author_id = a.id
        INNER JOIN genres g ON b.genre_id = g.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();