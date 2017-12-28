<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
	    'title' => $faker->sentence,
	    'published_at' =>  $faker->date('Y,m,d'),
	    'publisher_id' => 1  // TODO: existing publisher
    ];
});
