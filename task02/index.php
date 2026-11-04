<?php
  $data = [42, "42", 3.14, true, null, []];
  $num = 42;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Types</title>
</head>
<body>
  <table border="1">
    <caption>Table Caption</caption>
    <tr>
      <?php foreach ($data as $el): ?>
        <td>
            <?php print_r($el) ?>
        </td>
      <?php endforeach; ?>
    </tr>

    <tr>
      <?php foreach ($data as $el): ?>
        <td>
            <?= gettype($el) ?>
        </td>
      <?php endforeach; ?>
    </tr>

    <tr>
      <?php foreach ($data as $el): ?>
        <td>
            <?php
              echo ($el === $num) ? 'Yeas' : 'No';
            ?>
        </td>
      <?php endforeach; ?>
    </tr>
  </table>
</body>
</html>