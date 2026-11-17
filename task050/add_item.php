<?php
require_once '/app/db.php';

$item_name = trim($_POST['item_name'] ?? '');
$quantity  = trim($_POST['quantity'] ?? 0);

if ($item_name === '') {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'The name cannot be empty.'], JSON_UNESCAPED_UNICODE);
  exit();
}
if ($quantity <= 0) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'Quantity cannot be empty.'], JSON_UNESCAPED_UNICODE);
  exit();
}

try {
  $stmt = $pdo->prepare("INSERT INTO shopping_list (item_name, quantity) VALUES (:item_name, :quantity)");
  $stmt->bindParam(':item_name', $item_name);
  $stmt->bindParam(':quantity', $quantity);
  $stmt->execute();
  echo json_encode(['success' => true, 'error' => null], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'error' => 'Error in Server.'], JSON_UNESCAPED_UNICODE);
  exit();
}