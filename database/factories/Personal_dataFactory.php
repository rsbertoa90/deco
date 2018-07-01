<?php

use Faker\Generator as Faker;

$factory->define(App\PersonalData::class, function (Faker $faker) {
    $path = $faker->image ( public_path('/storage/app/images/avatars/') );
    $path = strstr($path, '/storage');
    return [
        'firstname'=>$faker->firstName,
        'lastname'=>$faker->lastName,
        'state'=>$faker->state,
        'city' => $faker->city,
        'address' => $faker->secondaryAddress,
        'phone'=> $faker->tollFreePhoneNumber,
        'avatar'=>$path,
    ];
});
