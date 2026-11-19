<?php
require_once '/app/db.php';
header('Content-Type: application/json');

try {
  $sql = "SELECT category,
            COUNT(category) AS products_count,
            SUM(stock) AS total_stock,
            ROUND(AVG(price), 2) AS avg_price,
            ROUND(MIN(price)) AS min_price,
            ROUND(MAX(price)) AS max_price
          FROM products
          GROUP BY category";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'items' => $items, 'error' => null], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'items' => null, 'error' => '1Error in Server1'], JSON_UNESCAPED_UNICODE);
  exit();
}