<?php
  header('Content-Type: application/json');

  $user = [
    'name'       => 'Иван Петров', // строка
    'age'        => 28,            // число (integer)
    'email'      => 'ivan@example.com', // строка
    'city'       => 'Москва',      // строка
    'isVerified' => false           // булево (boolean)
  ];

  echo json_encode($user, JSON_UNESCAPED_UNICODE);
