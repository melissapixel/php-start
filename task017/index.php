<?php
  $counter = 0;

  $incrementByValue = function () use ($counter): int {
    return ++$counter;
  };
  $incrementByValue();
  echo $counter;

  $incrementByReference = function () use (&$counter): int {
    return ++$counter;        // преинкремент ВНЕШНЕЙ переменной
  };

  $incrementByReference();
  echo $counter;