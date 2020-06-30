<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\Contact;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'user_id'    => factory(User::class),
        'address_id' => factory(Address::class),
        'name'       => $faker->name(),
        'email'      => $faker->email,
        'phone'      => $faker->phoneNumber,
    ];
});
