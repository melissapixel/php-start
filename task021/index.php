<?php
  $type = 'video';

  function getContentTypeIcon(string $type): string {
    return match ($type) {
      'article' => '📄',
      'video' => '🎬',
      'audio' => '🎵',
      'image' => '🖼️',
      default => '📦',
    };
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?= getContentTypeIcon($type) ?></p>
</body>
</html>