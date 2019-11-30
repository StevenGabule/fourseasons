<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'fullName' => $faker->name,
        'email' => $faker->email,
        'phoneNumber' => $faker->phoneNumber,
        'reminder' => rand(1,2),
        'address' => $faker->streetAddress,
        'home_apartment_number' => $faker->address,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
