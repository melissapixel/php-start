<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT * FROM employees";

if ($_GET['filter'] == 'all') {
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'title' => 'All users.', 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
}

if ($_GET['filter'] == 'no_phone') {
  $sql .= " WHERE phone IS NULL";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'title' => 'Users who have not provided a phone number.', 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
}

if ($_GET['filter'] == 'no_email') {
  $sql .= " WHERE email IS NULL";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'title' => 'Users who have not provided a email.', 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
}

if ($_GET['filter'] == 'no_contact') {
  $sql .= " WHERE phone IS NULL AND email IS NULL";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'title' => 'Users who have not provided a contact.', 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();
}