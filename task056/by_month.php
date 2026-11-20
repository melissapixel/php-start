<?php
require_once '/app/db.php';
header('Content-Type: application/json');


try {
  $sql = "SELECT DATE_FORMAT(visit_date, '%Y-%m') AS month,
            COUNT(*) AS visits_count,
            COUNT(DISTINCT user_name) AS unique_visits,
            SUM(duration_minutes) AS total_duration,
            AVG(duration_minutes) AS avg_duration
          FROM visits
          GROUP BY DATE_FORMAT(visit_date, '%Y-%m')";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'items' => $items, 'error' => null], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'items' => null, 'error' => '1Error in Server1'], JSON_UNESCAPED_UNICODE);
  exit();
}