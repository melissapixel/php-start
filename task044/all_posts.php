<?php
require_once '/app/db.php';
header('Content-Type: application/json; charset=utf-8');

try {
  $sql = "SELECT * FROM posts";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($posts, JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
  echo json_encode("An error occurred: " . $e->getMessage());
}