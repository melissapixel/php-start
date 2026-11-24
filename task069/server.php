<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT DISTINCT s.id AS student_id,
          s.name AS student_name,
          s.email AS email
        FROM students s
        
        JOIN enrollments e ON e.student_id = s.id
        JOIN grades g ON g.enrollment_id = e.id

        WHERE g.grade >= 9
        ORDER BY s.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();