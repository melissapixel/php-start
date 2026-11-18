<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT * FROM products WHERE 1=1";
$params = [];

if (!empty($_GET['category'])) {
  $sql .= " AND category = ?";
  $params[] = $_GET['category'];
}
if (!empty($_GET['min_price'])) {
  $sql .= " AND price >= ?";
  $params[] = (int)($_GET['min_price']);
}
if (!empty($_GET['max_price'])) {
  $sql .= " AND price <= ?";
  $params[] = (int)($_GET['max_price']);
}
if (!empty($_GET['in_stock'])) {
  $sql .= " AND stock > 0";
}


// if (!empty($_GET['sort_by'])) {
//   $sql .= " ORDER BY ?";
//   $params[] = $_GET['sort_by'];
// }
// if (!empty($_GET['order'])) {
//   $sql .= " ?";
//   $params[] = strtoupper($_GET['order']);
// }

$allowedSort = ['price', 'name', 'created_at'];
$sortBy = in_array($_GET['sort_by'] ?? '', $allowedSort, true) 
    ? $_GET['sort_by'] 
    : 'price'; // дефолт
$sql .= " ORDER BY $sortBy";

$allowedOrder = ['ASC', 'DESC'];
$order = in_array(strtoupper($_GET['order'] ?? ''), $allowedOrder, true)
    ? strtoupper($_GET['order'])
    : 'ASC';
$sql .= " $order";



if (!empty($_GET['limit'])) {
  $sql .= " LIMIT ?";
  $params[] = (int)($_GET['limit']);
}

// echo json_encode(var_dump($params));

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'products' => $products, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'products' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  exit();
}