<?php
header('Content-Type: text/plain');

function getColor () {
  $random_num = random_int(0, 16777215);
  $hex_num = dechex($random_num);
  $processing_num = str_pad($hex_num, 6, "0", STR_PAD_LEFT); 
  return "#$processing_num";
}

echo getColor();