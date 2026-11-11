<?php
  $products = [
      ['name' => 'Ноутбук', 'price' => 50000],
      ['name' => 'Мышка', 'price' => 500],
      ['name' => 'Монитор', 'price' => 15000],
      ['name' => 'Клавиатура', 'price' => 3000],
  ];

  $_GET['max_price'] = 3000;


  $products_filter = array_filter($products, function ($product) {
    // Опциональный фильтр max_price (максимальная цена из $_GET)
    $isMaxPrice = (!isset($_GET['max_price'])) || $_GET['max_price'] >= $product['price'];

    return $isMaxPrice;
  });

  print_r($products_filter);