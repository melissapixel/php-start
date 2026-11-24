<?php
require_once '/app/db.php';
header('Content-Type: application/json');


$sql = "SELECT c.title AS course,
          t.name AS teacher,
          COUNT(DISTINCT e.student_id) AS students_count,
          ROUND(AVG(g.grade), 2) AS avg_grade,
          COUNT(DISTINCT e.id) * c.price AS revenue
        FROM courses c
        JOIN teachers t ON t.id = c.teacher_id
        JOIN enrollments e ON e.course_id = c.id
        JOIN grades g ON g.enrollment_id = e.id
        GROUP BY c.id
        ORDER BY students_count DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();