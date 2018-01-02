<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
	    'title' => $faker->sentence,
	    'published_at' =>  $faker->date('Y,m,d'),
	    'description' => $faker->text,
	    'isbn' => $faker->isbn10
    ];
});
