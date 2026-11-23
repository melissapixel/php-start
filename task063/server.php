<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT t.name AS tag,
          COUNT(p.is_published) AS published_posts_count
        FROM tags t
          LEFT JOIN post_tag pt ON pt.tag_id = t.id
          LEFT JOIN posts p ON pt.post_id = p.id AND p.is_published = 1
        GROUP BY t.id
        ORDER BY published_posts_count DESC, t.name ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();
