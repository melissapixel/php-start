<?php
  $names = ['Alice', 'Bob', 'Charlie', 'David', 'Eve'];
  $found = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET: List filter</title>
</head>
<body>

  <form action="" method="GET">
    <input type="text" name="search">
    <button>Send</button>
  </form>

  <ul>
    <?php
      if (isset($_GET['search'])) {
        $input = $_GET['search'];

        foreach ($names as $name) {
          $pos = stripos($name, $input);

          if ($pos !== false) {
            $found = true;
            echo "<li>" . $name . "</li>";
          }
          
        }

        if ($found == false) {
          echo "<p>Not Found</p>";
        }

      }
    ?>
  </ul>

</body>
</html>