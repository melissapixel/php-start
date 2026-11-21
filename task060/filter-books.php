<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 2

$author_name = 'Лев Толстой';

try {
  $sql = "SELECT b.title,
            b.year,
            a.name as author
          FROM books b
          INNER JOIN authors a ON b.author_id = a.id
          WHERE a.name = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$author_name]);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  // echo json_encode(['success' => false, 'data' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  echo json_encode(['success' => false, 'data' => null, 'error' => $e], JSON_UNESCAPED_UNICODE);
  exit();
}