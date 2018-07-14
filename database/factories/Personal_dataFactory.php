<?php

use Faker\Generator as Faker;

$factory->define(App\PersonalData::class, function (Faker $faker) {

    return [
        'firstname'=>$faker->firstName,
        'lastname'=>$faker->lastName,
        'state'=>$faker->state,
        'city' => $faker->city,
        'address' => $faker->secondaryAddress,
        'phone'=> $faker->tollFreePhoneNumber,
        
    ];
});
