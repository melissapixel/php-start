<?php
require_once '/app/db.php';
header('Content-Type: application/json');

// TASK 8

$sql = "SELECT t.name,
          COALESCE(
            NULLIF(CAST(COUNT(CASE WHEN p.is_active = 1 THEN 1 END) AS CHAR), '0'), 
            'Нет активных игроков'
          ) AS active_players_info
        FROM teams t
        LEFT JOIN players p ON t.id = p.team_id
        GROUP BY t.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(['success' => true, 'data' => $data, 'error' => null], JSON_UNESCAPED_UNICODE);
exit();