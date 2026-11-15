<?php
require_once '/app/db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

try {
  $sql = "UPDATE posts SET likes = likes + 1 WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
} catch (Throwable $e) {
  echo json_encode("An error occurred: " . $e->getMessage());
}