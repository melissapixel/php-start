<?php
require_once '/app/db.php';
header('Content-Type: application/json');


$sql = "SELECT * FROM employees WHERE 1=1";
$params = [];


// FILTER DEPARTAMENT
$departmentsAccetable = ['IT', 'HR', 'Sales', 'Marketing', 'Finance'];
if (!empty($_GET['department']) && in_array($_GET['department'], $departmentsAccetable, true)) {
  $sql .= " AND department = ?";
  $params[] = $_GET['department'];
}
if (!empty($_GET['departments']) && is_array($_GET['departments']) && empty(array_diff($_GET['departments'], $departmentsAccetable))) {
  $placeholders = implode(',', array_fill(0, count($_GET['departments']), '?'));
  $sql .= " AND department IN ($placeholders)";
  $params = array_merge($params, $_GET['departments']);
}

// FILTER SALARY
if (!empty($_GET['min_salary'])) {
  $sql .= " AND salary >= ?";
  $params[] = $_GET['min_salary'];
}
if (!empty($_GET['max_salary'])) {
  $sql .= " AND salary <= ?";
  $params[] = $_GET['max_salary'];
}


// FILTER DATA
if (!empty($_GET['hire_from'])) {
    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format, $_GET['hire_from']);

    if (!$date || $date->format($format) !== $_GET['hire_from']) {
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Invalid hire_from format. Expected YYYY-MM-DD']);
        exit;
    }

    $sql .= " AND hire_date >= ?";
    $params[] = $date->format('Y-m-d');
}
if (!empty($_GET['hire_to'])) {
    $format = 'Y-m-d';
    $date = DateTime::createFromFormat($format, $_GET['hire_to']);

    if (!$date || $date->format($format) !== $_GET['hire_to']) {
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Invalid hire_to format. Expected YYYY-MM-DD']);
        exit;
    }

    $sql .= " AND hire_date <= ?";
    $params[] = $date->format('Y-m-d');
}

// FILTER STATUS ACTIVE
$activeAccetable = [0, 1];
if (!empty($_GET['is_active']) && in_array((int)$_GET['is_active'], $activeAccetable, true)) {
  $sql .= " AND is_active = ?";
  $params[] = (int)$_GET['is_active'];
}

// SEARCH FILTER 
if (!empty($_GET['search'])) {
  $sql .= " AND CONCAT(first_name, ' ', last_name) LIKE ?";
  $params[] = '%' . $_GET['search'] . '%';
}


// FILTER SORTED
$sortAccetable = ['salary', 'hire_date', 'last_name'];
$orderAccetable = ['desc', 'asc'];
if (!empty($_GET['sort_by']) && in_array($_GET['sort_by'], $sortAccetable)) {
  $sql .= " ORDER BY " . $_GET['sort_by'];

  if (!empty($_GET['order']) && in_array($_GET['order'], $orderAccetable)) {
    $sql .= " " . mb_strtoupper($_GET['order']);
  }
}


// PAGINATION
if (!empty($_GET['per_page'])) {
  $sql .= " LIMIT ?";
  $params[] = (int)$_GET['per_page'];

  if (!empty($_GET['page'])) {
    $offset = (int)($_GET['page'] - 1) * (int)$_GET['per_page'];
    $sql .= " OFFSET ?";
    $params[] = $offset;
  }
}

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (!$data) {
    echo json_encode(['success' => true, 'data' => [], 'error' => null], JSON_UNESCAPED_UNICODE);
    exit();
  }

  echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['success' => false, 'data' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  exit();
}