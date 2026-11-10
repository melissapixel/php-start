<?php
  $users = [
      // 1. Идеальный кандидат (сумма completed = 2100)
      ['name' => 'Алекс', 'status' => 'active', 'tags' => ['vip', 'early_adopter'], 'orders' => [
          ['status' => 'completed', 'amount' => 1500],
          ['status' => 'completed', 'amount' => 600]
      ]],
      
      // 2. Нет тега 'vip'
      ['name' => 'Борис', 'status' => 'active', 'tags' => ['regular'], 'orders' => [
          ['status' => 'completed', 'amount' => 5000]
      ]],
      
      // 3. Забанен (даже если деньги есть)
      ['name' => 'Вика', 'status' => 'banned', 'tags' => ['vip'], 'orders' => [
          ['status' => 'completed', 'amount' => 3000]
      ]],
      
      // 4. Ключа 'tags' вообще нет (частая ситуация в старых БД)
      ['name' => 'Глеб', 'status' => 'active', 'orders' => [
          ['status' => 'completed', 'amount' => 2500]
      ]],
      
      // 5. Сумма ровно 2000 (а нужно строго больше) + есть pending заказ
      ['name' => 'Даша', 'status' => 'active', 'tags' => ['vip'], 'orders' => [
          ['status' => 'completed', 'amount' => 2000],
          ['status' => 'pending', 'amount' => 5000]
      ]],
      
      // 6. Теги есть, но это null (еще один грязный кейс)
      ['name' => 'Егор', 'status' => 'active', 'tags' => null, 'orders' => [
          ['status' => 'completed', 'amount' => 3000]
      ]],
  ];

  $premium_users = array_filter($users, function ($user) {
    // status строго равен 'active'.
    if ($user['status'] !== 'active') {
      return false;
    }

    // У него существует ключ tags, он является массивом, и в этом массиве есть строка 'vip'.
    if (!isset($user['tags']) || !is_array($user['tags']) || !in_array('vip', $user['tags'])) {
      return false;
    }

    // Сумма amount только тех заказов, у которых status === 'completed', строго больше 2000.
    foreach ($user['orders'] as $order) {
      if ($order['status'] === 'completed' && (int)$order['amount'] > 2000) {
        return true;
      }
    }

    return false;
  });

  print_r($premium_users);