<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT u.id,
            u.name,
            SUM(o.amount) as amount
          FROM users u
          LEFT JOIN orders o ON o.user_id = u.id
          GROUP BY u.id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'data' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  // echo json_encode(['success' => false, 'data' => null, 'error' => $e], JSON_UNESCAPED_UNICODE);
  exit();
}