<?php
  header("Content-Type: text/plain");
  $time = date('H');

  $message = match (true) {
    $time >= 5 && $time < 11 => "Доброе утро!",
    $time >= 12 && $time < 17 => "Добрый день!",
    $time >= 18 && $time < 22 => "Добрый вечер!",
    $time >= 23 && $time < 4 => "Доброй ночи!",
    default => "Not found",
  };

  echo $message;