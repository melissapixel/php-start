<?php
  $prices = [100, 200, 300, 150];
  $tax = 1.2;

  $pricesWithMarkup = array_map(function(float $price): float {
    return $price * $tax;
  }, $prices);

  var_dump($pricesWithMarkup);