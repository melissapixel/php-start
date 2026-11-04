<?php 
  $names = ['Zara', 'Alex', 'Mike', 'Bob'];
  sort($names);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сортировка</title>
</head>
<body>
  <ol>
    <?php foreach ($names as $name): ?>
      <li><?= $name ?></li>
    <?php endforeach; ?>
  </ol>
</body>
</html>