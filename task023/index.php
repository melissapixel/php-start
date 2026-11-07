<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET: Addition of two numbers</title>
</head>
<body>
  <?php
    if (isset($_GET['num1']) && isset($_GET['num2']) && is_numeric($_GET['num1']) && is_numeric($_GET['num2'])) {
      echo $_GET['num1'] + $_GET['num2'];
    } else {
      echo '<form action="" method="GET"> <input type="text" name="num1"> <input type="text" name="num2"> <button>Send</button> </form>';
    }
  ?>
</body>
</html>