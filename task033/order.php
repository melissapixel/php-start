<?php
  header('Content-Type: application/json; charset=utf-8');

  $order = [
    'orderId' => 12345,
    'customer' => [
        'name' => 'Alice',
        'phone' => '+79991234567',
    ],
    'items' => [
        [
            'name' => 'Книга',
            'qty' => 2,
            'price' => 500,
        ],
        [
            'name' => 'Ручка',
            'qty' => 5,
            'price' => 50,
        ],
    ],
    'delivery' => [
        'address' => 'Moscow, Lenin St. 1',
        'date' => '2026-11-15',
    ],
    'total' => 1250,
  ];

  echo json_encode($order);