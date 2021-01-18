<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {

    $random = rand(1, 1000);
    $cover = "https://picsum.photos/id/{$random}/200/300";

    return [
        'author_id' => Author::inRandomOrder()->first()->id,
        'cover' => $cover,
        'title' => $faker->sentence(3),
        'isbn'  => $faker->randomNumber(7),
        'jumlah' => random_int(10, 20),
        'short_description' => $faker->sentence(50)
    ];
});
