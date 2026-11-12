<?php
declare(strict_types=1);

require_once '/app/db.php';

$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL
    )
");

$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");

$name = 'John Doe';
$email = 'john@example.com';
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->execute();


// task 4
$sql = "SELECT name FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
echo $user['name'];


// task 5
$sql = "SELECT name, email FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user) {
  echo $user['name'] . '<br>';
};


// task 6
$foundName = 'Алексей';
$newEmail = 'john.doe@newdomain.com';
$sql = "UPDATE users SET email = :email WHERE name = :name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $foundName);
$stmt->bindParam(':email', $newEmail);
$stmt->execute();
$rowCount = $stmt->rowCount();
echo $rowCount;


// task 7
$idTodelete = 4;
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $idTodelete, PDO::PARAM_INT);
$stmt->execute();