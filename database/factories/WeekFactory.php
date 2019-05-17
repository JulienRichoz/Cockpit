<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Factory;
use Faker\Generator as Faker;

$factory->define(Factory::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase(50),
        'location' => $faker->city(50),
        'date'=>$faker->dayOfWeek(),
        'people'=>$faker->firstName()
    ];
});
