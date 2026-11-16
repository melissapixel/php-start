<?php
header('Content-Type: application/json; charset=utf-8');
require_once '/app/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = trim($_POST['username'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (mb_strlen($username, 'UTF-8') < 3 || mb_strlen($username, 'UTF-8') > 20) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid Username']);
    exit;
  }

  if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid Email']);
    exit;
  }

  if (mb_strlen($password, 'UTF-8') <= 6) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid Password']);
    exit;
  }

  try {
    // проверка на уникальность имени
    $stmt = $pdo->prepare("SELECT EXISTS(SELECT 1 FROM users WHERE username = :username)");
    $stmt->execute(['username' => $username]);
    $isTaken = $stmt->fetchColumn();
    if ($isTaken) {
      http_response_code(400);
      echo json_encode(['error' => 'Invalid username']);
      exit;
    }

    // проверка на уникальность email
    $stmt = $pdo->prepare("SELECT EXISTS(SELECT 1 FROM users WHERE email = :email)");
    $stmt->execute(['email' => $email]);
    $isTaken = $stmt->fetchColumn();
    if ($isTaken) {
      http_response_code(400);
      echo json_encode(['error' => 'Invalid email']);
      exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      'username' => $username,
      'email'    => $email,
      'password' => $hashed_password
    ]);
    echo json_encode(['success' => true, 'message' => 'success']);

  } catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Внутренняя ошибка сервера']);
  }
}