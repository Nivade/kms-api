<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'zip' => $faker->postcode,
        'city' => $faker->city,
        'country' => 'Nederland',
        'street_address' => $faker->streetAddress,
        'full_address' => $faker->address,

    ];
});
