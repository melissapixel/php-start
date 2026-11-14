<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT * FROM quotes ORDER BY RAND() LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $quote = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode($quote);
} catch (Throwable $e) {
  http_response_code(500);
}