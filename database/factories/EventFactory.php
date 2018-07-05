<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        
        'state'=>$faker->state,
        'city' => $faker->city,
        'address' => $faker->secondaryAddress,
        'comments'=>$faker->text,
        'quota'=>30,
        'price'=>$faker->randomNumber(3),
    ];
});
