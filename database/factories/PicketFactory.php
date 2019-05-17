<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Picket;
use Faker\Generator as Faker;

$factory->define(Picket::class, function (Faker $faker) {
    return [
        'name' => ucwords($faker->lexify('??')), // generate two random letters with first uppercase (Xy)
    ];
});
