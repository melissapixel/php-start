<?php
require_once '/app/db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid ID']);
    exit;
}

try {
  $sql = "SELECT name, email FROM users WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode($user, JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  echo "An error occurred: " . $e->getMessage();
}