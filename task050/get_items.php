<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT * FROM shopping_list";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (!$items) {
    echo json_encode(['success' => false, 'items' => null, 'error' => 'There is nothing in the list yet'], JSON_UNESCAPED_UNICODE);
    exit();
  }

  echo json_encode(['success' => true, 'items' => $items, 'error' => null], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'items' => null, 'error' => '1Error in Server1'], JSON_UNESCAPED_UNICODE);
  exit();
}