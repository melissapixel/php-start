<?php
  $price = 100;
  $quantity = 5;
  $discount = 10;

  function totallSum ($price, $quantity, $discount) {
    $sum = $price * $quantity;
    $totalSum = $sum * (1 - $discount / 100);
    return $totalSum;
  }

  $total = totallSum($price, $quantity, $discount);
  echo $total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task 7</title>
</head>
<body>
  <p>Total sum: <?= $total ?></p>
</body>
</html>