<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
	    'lastname' => $faker->lastName,
	    'forename' => $faker->firstName,
    ];
});
