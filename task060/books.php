<?php
require_once '/app/db.php';
header('Content-Type: application/json');


// TASK 1

try {
  $sql = "SELECT authors.name as author,
            books.title as title,
            books.year as year
          FROM books
          INNER JOIN authors ON books.author_id = authors.id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  // echo json_encode(['success' => false, 'data' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  echo json_encode(['success' => false, 'data' => null, 'error' => $e], JSON_UNESCAPED_UNICODE);
  exit();
}