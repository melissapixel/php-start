<?php
  header('Content-Type: application/json; charset=utf-8');

  $products = [
      [
          'id' => 1,
          'name' => 'Ноутбук',
          'price' => 75000,
          'inStock' => true,
      ],
      [
          'id' => 2,
          'name' => 'Смартфон',
          'price' => 45000,
          'inStock' => true,
      ],
      [
          'id' => 3,
          'name' => 'Планшет',
          'price' => 30000,
          'inStock' => false,
      ],
      [
          'id' => 4,
          'name' => 'Наушники',
          'price' => 12000,
          'inStock' => true,
      ],
      [
          'id' => 5,
          'name' => 'Часы',
          'price' => 18000,
          'inStock' => false,
      ],
  ];

  echo json_encode($products, JSON_UNESCAPED_UNICODE);