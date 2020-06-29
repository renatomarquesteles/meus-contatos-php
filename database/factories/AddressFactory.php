<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'zipcode'      => $faker->postcode,
        'street'       => $faker->streetName,
        'number'       => $faker->buildingNumber,
        'neighborhood' => $faker->words(2, true),
        'city'         => $faker->city,
        'state'        => $faker->state,
        'complement'   => $faker->secondaryAddress
    ];
});
