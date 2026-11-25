<?php
require_once '/app/db.php';
header('Content-Type: application/json');


$task = trim($_POST['task'] ?? "");

if (empty($task)) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'The task cannot be empty.'], JSON_UNESCAPED_UNICODE);
  exit();
}

try {
  $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (:task)");
  $stmt->bindValue(':task', $task);
  $stmt->execute();

  $lastId = $pdo->lastInsertId();

  $stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
  $stmt->execute(['id' => $lastId]);
  $post = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $post, 'error' => null], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'error' => 'Error in Server.'], JSON_UNESCAPED_UNICODE);
  exit();
}