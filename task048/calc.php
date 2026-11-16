<?php
header('Content-Type: application/json');

$allowedCurrencies = ['USD' => 1, 'EUR' => 0.85, 'RUB' => 75];

// ckeck валидность
$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
if ($amount === false || $amount === null || $amount <= 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid amount provided.'], JSON_UNESCAPED_UNICODE);
    exit();
}

$from = strtoupper(trim($_POST['from_currency'] ?? ''));
$to = strtoupper(trim($_POST['to_currency'] ?? ''));
if (!isset($allowedCurrencies[$from]) || !isset($allowedCurrencies[$to])) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'error'   => 'Unsupported or invalid currency code',
  ], JSON_UNESCAPED_UNICODE);
  exit;
}

$result = $amount / $allowedCurrencies[$from] * $allowedCurrencies[$to];
echo json_encode(['success' => true, 'result' => $result], JSON_UNESCAPED_UNICODE);
