<?php
require_once '/app/db.php';
header('Content-Type: application/json');

$sql = "SELECT t.id,
          t.name AS teacher_name,
          COUNT(DISTINCT c.id) AS courses_count,
          COUNT(DISTINCT e.student_id) AS students_count,
          AVG(g.grade) AS teacher_avg,
          (SELECT AVG(grade) FROM grades) AS school_avg
        FROM teachers t

        JOIN courses c ON c.teacher_id = t.id
        LEFT JOIN enrollments e ON e.course_id = c.id
        LEFT JOIN grades g ON g.enrollment_id = e.id
        
        GROUP BY t.id, t.name
        HAVING teacher_avg > school_avg
        
        ORDER BY teacher_avg DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();