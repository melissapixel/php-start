<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POST: Checkbox</title>
</head>
<body>
  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['agreement'])) {
        echo 'Спасибо за регистрацию!';
      } else {
        echo 'Вы должны согласиться с условиями';
      }
    } else {
      echo '<form action="" method="POST"> <input type="checkbox" name="agreement" value="1"> Согласен с условиями <button>Send</button> </form>';
    }
  ?>
</body>
</html>