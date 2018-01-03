<?php
use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'author' => $faker->name,
        'description' => $faker->paragraph,
        'barcode_no' => $faker->ean8,
        'book_category' => $faker->numberBetween(0,999)
    ];
});

