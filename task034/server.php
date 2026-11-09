<?php
header('Content-Type: application/json; charset=utf-8');
$products = [
    // Книги (books)
    ['name' => 'PHP для начинающих', 'category' => 'books', 'price' => 500],
    ['name' => 'Изучаем JavaScript', 'category' => 'books', 'price' => 1200],
    ['name' => 'Совершенный код', 'category' => 'books', 'price' => 2500],
    ['name' => 'Чистая архитектура', 'category' => 'books', 'price' => 1800],

    // Электроника (electronics)
    ['name' => 'Ноутбук', 'category' => 'electronics', 'price' => 50000],
    ['name' => 'Смартфон', 'category' => 'electronics', 'price' => 35000],
    ['name' => 'Беспроводные наушники', 'category' => 'electronics', 'price' => 7000],
    ['name' => 'Монитор 27 дюймов', 'category' => 'electronics', 'price' => 18000],

    // Одежда (clothing)
    ['name' => 'Футболка хлопковая', 'category' => 'clothing', 'price' => 1000],
    ['name' => 'Джинсы классические', 'category' => 'clothing', 'price' => 3500],
    ['name' => 'Зимняя куртка', 'category' => 'clothing', 'price' => 12000],
    ['name' => 'Кроссовки', 'category' => 'clothing', 'price' => 6000],

    // Дом и кухня (home & kitchen)
    ['name' => 'Кофеварка капсульная', 'category' => 'home', 'price' => 8500],
    ['name' => 'Увлажнитель воздуха', 'category' => 'home', 'price' => 4000],
    ['name' => 'Набор посуды', 'category' => 'home', 'price' => 5500],

    // Спорт (sports)
    ['name' => 'Коврик для йоги', 'category' => 'sports', 'price' => 1500],
    ['name' => 'Фитнес-браслет', 'category' => 'sports', 'price' => 3000],
    ['name' => 'Футбольный мяч', 'category' => 'sports', 'price' => 2200],
  ];

  $produtsFilter = array_filter($products, function ($product) {

      if (isset($_GET['category']) && $_GET['category'] !== 'all') {
          if ($product['category'] !== $_GET['category']) {
              return false;
          }
      }

      if (isset($_GET['min-price'])) {
          if ($product['price'] < $_GET['min-price']) {
              return false;
          }
      }

      if (isset($_GET['max-price'])) {
          if ($product['price'] > $_GET['max-price']) {
              return false;
          }
      }
      return true;
  });

  echo json_encode($produtsFilter);

?>