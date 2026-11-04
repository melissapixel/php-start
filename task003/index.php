<?php $code = 404; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Match</title>
</head>
<body>
  <?php
    $message = match ($code) {
      200, 201 => 'Success',
      400 => 'Bad Request',
      404 => 'Not Found',
      default => 'Unknown Status',
    };
  ?>

  <h1><?=$message?></h1>
</body>
</html>