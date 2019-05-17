<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Week;
use Faker\Generator as Faker;

$factory->define(Week::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase(50),
        'location' => $faker->city(50),
        'date'=>$faker->dayOfWeek(),
        'people'=>$faker->firstName()
    ];
});
