<?php
header('Content-Type: application/json; charset=utf-8');
$movies = [
    ['title' => 'Начало', 'genre' => 'sci-fi', 'rating' => 8.8, 'is_hd' => true],
    ['title' => '1+1', 'genre' => 'drama', 'rating' => 8.5, 'is_hd' => true],
    ['title' => 'Матрица', 'genre' => 'sci-fi', 'rating' => 8.7, 'is_hd' => false],
    ['title' => 'Форрест Гамп', 'genre' => 'drama', 'rating' => 8.8, 'is_hd' => false],
    ['title' => 'Интерстеллар', 'genre' => 'sci-fi', 'rating' => 8.6, 'is_hd' => true],
];

$movies_filter = array_filter($movies, function ($movie) {
    $isGenreOk = !isset($_GET['genre']) || $_GET['genre'] === 'all' || $_GET['genre'] === $movie['genre'];

    $isHdOnlyOk = !isset($_GET['hd_only']) || $movie['is_hd'];

    $isRatingOk = !isset($_GET['min_rating']) || $movie['rating'] >= $_GET['min_rating'];

    return $isGenreOk && $isHdOnlyOk && $isRatingOk;
}); 

echo json_encode(array_values($movies_filter), JSON_UNESCAPED_UNICODE); 