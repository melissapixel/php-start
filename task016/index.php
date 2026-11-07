<?php
  $taxRate = 0.2;

  $calculateTax = function (float $total) use ($taxRate): float {
    return $total * $taxRate;
  };


  echo $calculateTax(12.3);