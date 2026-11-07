<?php
  $prefix = 'Mr.';

  $printName = function (string $name) use ($prefix) :string {
    return $prefix . ' ' . $name;
  };

  echo $printName('Kate');