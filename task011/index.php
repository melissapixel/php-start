<?php
  $users = [
      ['name' => 'Alice', 'age' => 25, 'active' => true],
      ['name' => 'Bob', 'age' => 17, 'active' => true],
      ['name' => 'Charlie', 'age' => 30, 'active' => false],
      ['name' => 'Diana', 'age' => 22, 'active' => true],
  ];

  $limit_age = 18;

  function getActiveAdultNames($users, $limit_age) {
    $new_array = [];
    foreach ($users as $user) {
      if ($user['age'] < $limit_age) {
        continue;
      }
      $new_array[] = $user;
    }
    return $new_array;
  }

  $new_array = getActiveAdultNames($users, $limit_age);
