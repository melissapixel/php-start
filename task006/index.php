<?php
  $users = [
      [
          'id' => 1,
          'name' => 'Иван Иванов',
          'email' => 'ivan@example.com',
          'role' => 'admin'
      ],
      [
          'id' => 2,
          'name' => 'Мария Петрова',
          'email' => 'maria@example.com',
          'role' => 'editor'
      ],
      [
          'id' => 3,
          'name' => 'Алексей Смирнов',
          'email' => 'alex@example.com',
          'role' => 'user'
      ]
  ];

  $users_json = json_encode($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <ul class='list'></ul>

  <script>
    const data = <?= $users_json ?>;
  </script>

  <script src="script.js"></script>
</body>
</html>