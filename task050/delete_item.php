<?php
require_once '/app/db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

$sql = "SELECT * FROM shopping_list WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'error'   => 'Product not found.',
  ], JSON_UNESCAPED_UNICODE);
  exit;
}

try {
  $sql = "DELETE FROM shopping_list WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  echo json_encode(['success' => true, 'error' => null], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'error' => 'Error in Server.'], JSON_UNESCAPED_UNICODE);
  exit();
}