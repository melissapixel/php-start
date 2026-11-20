<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$min_orders = 2;
try {
  $sql = "SELECT customer_name AS customer,
            COUNT(customer_name) AS orders_count,
            ROUND(SUM(total), 2) AS total_spent,
            ROUND(AVG(total), 2) AS avg_order
          FROM orders
          GROUP BY customer_name
          HAVING COUNT(customer_name) > ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$min_orders]);
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'items' => $items, 'error' => null], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'items' => null, 'error' => '1Error in Server1'], JSON_UNESCAPED_UNICODE);
  exit();
}