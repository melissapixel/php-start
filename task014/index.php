<?php
  function generateOrderId(string $prefix = 'ORD'): string {
    static $count = 0;
    $id = str_pad(++$count, 5, "0", STR_PAD_LEFT); 
    return $prefix . '-' . $id;
  }

  $id = generateOrderId();
  echo $id;
  $id = generateOrderId();
  echo $id;
  $id = generateOrderId();
  echo $id;