<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'type' => rand(1,2),
        'name' => $faker->catchPhrase(50),
        'location' => $faker->city(50),
        'start_date'=>$faker->dateTimeBetween('now', '+15 days'),
        'end_date'=>$faker->dateTimeBetween('+16 days', '+200 days'),
    ];
});
