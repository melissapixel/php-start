<?php
  function slugify(string $text): string {
    $text_filter = strtolower(transliterator_transliterate('Any-Latin; Latin-ASCII', $text));
    return preg_replace('/[^\p{L}]+/u', '-', $text_filter); 
  }

  $text = slugify('Люблю Говрюшу!');
  echo $text;