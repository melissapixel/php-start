<?php
  $users = [
      ['name' => 'Аня',   'age' => 25, 'is_active' => true,  'balance' => 150],
      ['name' => 'Борис', 'age' => 17, 'is_active' => true,  'balance' => 500],
      ['name' => 'Вика',  'age' => 30, 'is_active' => false, 'balance' => 300],
      ['name' => 'Глеб',  'age' => 22, 'is_active' => true,  'balance' => 30],
      ['name' => 'Даша',  'age' => 40, 'is_active' => true,  'balance' => 1000],
  ];

  $premium_users = array_filter($users, function ($user) {
    // Проверка возраста.
    if ($user['age'] < 18) {
      return false;
    }

    // Проверка активности
    if ($user['is_active'] === false) {
      return false;
    }

    // Проверка баланса
    if ($user['balance'] < 100) {
      return false;
    }

    return true;
  });

  print_r($premium_users);