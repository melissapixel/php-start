<?php
require_once '/app/db.php';
header('Content-Type: application/json');


$id = trim($_POST['id'] ?? "");

if (empty($id)) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'The id of post cannot be empty.'], JSON_UNESCAPED_UNICODE);
  exit();
}

try {
  $sql = "DELETE FROM tasks WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  echo json_encode(['success' => true, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'error' => 'Error in Server.'], JSON_UNESCAPED_UNICODE);
  exit();
}