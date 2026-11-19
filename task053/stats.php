<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT
            COUNT(name) AS total_employees,
            AVG(salary) AS average_salary,
            MIN(salary) AS min_salary,
            MAX(salary) AS max_salary,
            SUM(salary) AS sum_salary,
            AVG(age) AS average_age
          FROM employees";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $stats = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'stats' => $stats, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'stats' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  exit();
}