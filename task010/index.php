<?php
  $orders = [
      ['id' => 1, 'status' => 'paid', 'amount' => 100],
      ['id' => 2, 'status' => 'pending', 'amount' => 200],
      ['id' => 3, 'status' => 'paid', 'amount' => 150],
      ['id' => 4, 'status' => 'failed', 'amount' => 300],
  ];

  foreach ($orders as $order) {
    if (!($order['status'] === 'paid')) {
        continue; 
    }

    echo "Id {$order['id']}, amount {$order['amount']}" . PHP_EOL;
  }