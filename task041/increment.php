<?php
require_once '/app/db.php';


$sql = "SELECT views FROM page_views WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);


$incrementCount = $count['views'] + 1;
$sql = "UPDATE page_views SET views = :views WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':views', $incrementCount, PDO::PARAM_INT);
$stmt->bindValue(':id', 1, PDO::PARAM_INT);
$stmt->execute();

echo $incrementCount;