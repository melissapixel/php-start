<?php
  function canEnterClub(int $age, bool $hasId, bool $isVIP): bool {
    return $age >= 18 && ($hasId || $isVIP);
  }