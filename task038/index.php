<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function getEvenNum (array $arr): array {
  return array_filter($arr, fn($n) => $n % 2 === 0);
}

function getSquareNum (array $arr): array {
  return array_map(fn($n) => $n * $n, $arr);
}

function getTotalNum (array $arr): int {
  return array_reduce($arr, fn($a, $b) => $a + $b, 0);
}


print_r(getTotalNum(getSquareNum(getEvenNum($numbers))));