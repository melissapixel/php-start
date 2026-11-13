<?php
require_once '/app/db.php';


$sql = "SELECT views FROM page_views WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);

echo $count['views'];