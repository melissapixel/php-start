<?php
  $data = [ ['name' => 'Laptop', 'price' => 1000], ['name' => 'Mouse', 'price' => 50], ['name' => 'Keyboard', 'price' => 150] ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Doc</title>
</head>
<body>

<table>
  <tr>
    <th>Name</th>
    <th>Price</th>
  </tr>
    
  <?php foreach ($data as $product): ?>
    <?php $rowClass = $product['price'] > 100 ? 'expensive' : ''; ?>
    <tr class="<?= $rowClass ?>">
      <td><?= $product['name'] ?></td>
      <td><?= $product['price'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>

</body>
</html>