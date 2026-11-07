<?php
  $status = 2;

  $message = match ($status) {
    0 => "Pending",
    1 => "Processing",
    2 => "Shipped",
    3 => "Delivered",
    default => "Unknown",
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <p class="<?= strtolower($message) ?> message"><?= $message ?></p>
</body>
</html>