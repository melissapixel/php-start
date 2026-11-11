<?php
  $users = [
      ['name' => 'Аня', 'age' => 25, 'gender' => 'female'],
      ['name' => 'Борис', 'age' => 30, 'gender' => 'male'],
      ['name' => 'Вика', 'age' => 22, 'gender' => 'female'],
      ['name' => 'Глеб', 'age' => 40, 'gender' => 'female'],
  ];

  $_GET['min_age'] = 28;
  $_GET['gender'] = 'all';

  $users_filter = array_filter($users, function ($user) {

    // Опциональный min_age (минимальный возраст)
    $isMinAgeOk = !isset($_GET['min_age']) || $_GET['min_age'] < $user['age'];

    // Опциональный gender (пол: male или female)
    $isGenderOk = !isset($_GET['gender']) || $_GET['gender'] === 'all' || $_GET['gender'] === $user['gender'];

    return $isMinAgeOk && $isGenderOk;
  });

  print_r($users_filter);


