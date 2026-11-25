<?php
header('Content-Type: application/json; charset=utf-8');
require_once '/app/db.php';


$sql = "SELECT name FROM users WHERE 1=1";
$params = [];

if (isset($_GET['name']) && $_GET['name'] !== "") {
  $sql .= " AND name LIKE ?";
  $params[] = '%' . $_GET['name'] . '%';
}

if (isset($_GET['city']) && $_GET['city'] !== "") {
  $sql .= " AND city = ?";
  $params[] = $_GET['city'];
}

if (isset($_GET['minAge']) && $_GET['minAge'] !== "") {
  $sql .= " AND age >= ?";
  $params[] = $_GET['minAge'];
}

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (!$users) {
    echo json_encode(['success' => true, 'users' => [], 'error' => null], JSON_UNESCAPED_UNICODE);
    exit();
  }

  echo json_encode(['success' => true, 'users' => $users, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'users' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  exit();
}