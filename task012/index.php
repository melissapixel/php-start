<?php
  function normalizeEmail(string $email): ?string {
    $email_processing = strtolower(trim($email));

    if (filter_var($email_processing, FILTER_VALIDATE_EMAIL)) {
      return $email_processing;
    } else {
      return null;
    }
  }

  // test
  normalizeEmail('LOLOLO');
  normalizeEmail('#@%^%#$@#$@#.com');
  normalizeEmail('nemail@-example.com');
  normalizeEmail('very.common@example.com');