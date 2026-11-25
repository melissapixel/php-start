<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT * FROM tasks";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (!$data) {
    http_response_code(200);
    echo json_encode(['success' => true, 'error' => 'Error with data.'], JSON_UNESCAPED_UNICODE);
    exit();
  }

  echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
  
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'error' => 'Error in Server.'], JSON_UNESCAPED_UNICODE);
  exit();
}