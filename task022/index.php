<?php
  if (isset($_GET['name'])) {
    $name = htmlspecialchars($_GET['name']);
    echo "Hello, $name";
  } else {
    echo '<form action="" method="GET"> <input type="text" name="name"> <button>send</button> </form>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET: Greeting by name</title>
</head>
<body>
</body>
</html>