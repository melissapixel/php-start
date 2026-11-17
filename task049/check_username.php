<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$username = trim($_GET['username'] ?? '');

if (mb_strlen($username) < 3) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'The name is too short.'], JSON_UNESCAPED_UNICODE);
  exit();
}

if (mb_strlen($username) > 20) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'The name is too long.'], JSON_UNESCAPED_UNICODE);
  exit();
}

if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'Only Latin letters, digits, and underscores'], JSON_UNESCAPED_UNICODE);
  exit();
}

try {
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
  $stmt->execute(['username' => $username]);
  $exists = $stmt->fetchColumn() > 0;

  if ($exists) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'This name is already in use.'], JSON_UNESCAPED_UNICODE);
    exit();
  }

  $stmt = $pdo->prepare("INSERT INTO users (username) VALUES (:username)");
  $stmt->execute(['username' => $username]);
  echo json_encode(['success' => true, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
  
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'error' => '1Error in Server1'], JSON_UNESCAPED_UNICODE);
  exit();
}