<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT rating,
            COUNT(*) AS movies_count,
            AVG(duration) AS avg_duration,
            SUM(duration) AS sum_duration,
            MIN(year) AS min_year,
            MAX(year) AS max_year
          FROM movies
          GROUP BY rating";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'items' => $items, 'error' => null], JSON_UNESCAPED_UNICODE);
  
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'items' => null, 'error' => '1Error in Server1'], JSON_UNESCAPED_UNICODE);
  exit();
}