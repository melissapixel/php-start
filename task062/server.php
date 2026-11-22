<?php
require_once '/app/db.php';
header('Content-Type: application/json');


try {
  $sql = "SELECT s.name AS student,
            c.title AS course
          FROM students s
          INNER JOIN student_course sc ON sc.student_id = s.id
          INNER JOIN courses c ON c.id = sc.course_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
  exit();

} catch (Throwable $e) {
  http_response_code(500);
  // echo json_encode(['success' => false, 'data' => null, 'error' => 'Error in Server'], JSON_UNESCAPED_UNICODE);
  echo json_encode(['success' => false, 'data' => null, 'error' => $e], JSON_UNESCAPED_UNICODE);
  exit();
}