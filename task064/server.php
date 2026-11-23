<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT s.name,
          s.email,
          c.title
        FROM students s
        INNER JOIN enrollments e ON e.student_id = s.id
        INNER JOIN courses c ON c.id = e.course_id
        ORDER BY s.name, c.title";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();