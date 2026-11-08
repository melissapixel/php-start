<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POST: Select with country selection</title>
</head>
<body>

  <form action="" method="POST">
    <select name="country" id="country-select">
      <option value="russia">Russia</option>
      <option value="usa">USA</option>
      <option value="germany">Germany</option>
    </select>
    <button>Send</button>
  </form>

  <?php
    if (isset($_POST['country'])) {
      $country = htmlspecialchars($_POST['country']);
      echo $country;
    }
  ?>

</body>
</html>