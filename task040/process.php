<?php
require_once '/app/db.php';
  $name = trim($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
  $email = trim($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
  $message = trim($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

  try {
    if ($name === '' || mb_strlen($name) < 2) {
      throw new Exception("Error in name.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new Exception("Error in email.");
    }
    if ($message === '' || mb_strlen($message) < 10) {
      throw new Exception("Error in message.");
    }

    try {
      $sql = "INSERT INTO users (name, email, message) VALUES (:name, :email, :message)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':message', $message);
      $stmt->execute();
      echo 'Success';

    } catch (PDOException $err) {
        echo "Database error: " . $err->getMessage();
    }

  } catch (Exception $err) {
    echo $err->getMessage();
  }