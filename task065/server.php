<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT c.title,
          s.name AS student,
          g.grade,
          g.graded_at
        FROM courses c
        INNER JOIN enrollments e ON e.course_id= c.id
        INNER JOIN students s ON s.id = e.student_id
        INNER JOIN grades g ON g.enrollment_id = e.id
        ORDER BY g.graded_at ASC, c.title";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();