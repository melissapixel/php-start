<?php
header('Content-Type: application/json; charset=utf-8');

$num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
$num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
$operator = $_POST['operator'];


if ($num1 === false || $num1 === null) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'Error in first num'], JSON_UNESCAPED_UNICODE);
  exit;
} 
if ($num2 === false || $num2 === null) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'Error in second num'], JSON_UNESCAPED_UNICODE);
  exit;
} 
if ($operator !== '*' && $operator !== '+' && $operator !== '/' && $operator !== '-') {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'Error in operator'], JSON_UNESCAPED_UNICODE);
  exit;
}


function calculate($num1, $num2, $operator) {
  switch ($operator) {
    case '+':
        return $num1 + $num2;
    case '-':
        return $num1 - $num2;
    case '*':
        return $num1 * $num2;
    case '/':
        return $num2 != 0 ? $num1 / $num2 : null;
    default:
        return null;
  }
}

$result = calculate($num1, $num2, $operator);

if ($result === null) {
  http_response_code(400);
  echo json_encode(['success' => false, 'error' => 'Error in operator'], JSON_UNESCAPED_UNICODE);
  exit;
}

echo json_encode(['success' => true, 'result' => $result], JSON_UNESCAPED_UNICODE);