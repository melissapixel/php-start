<?php
declare(strict_types=1);

// Единая точка подключения к БД для всех задач
$dsn = 'mysql:host=db;port=3306;dbname=shop;charset=utf8mb4';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, 'app', 'app_secret', $options);
} catch (PDOException $e) {
    die("❌ Ошибка подключения к БД: " . $e->getMessage());
}