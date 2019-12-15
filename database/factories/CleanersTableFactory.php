<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cleaners;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Cleaners::class, function (Faker $faker) {
    return [
        'company' => $faker->company,
        'logo' => 'logo.png',
        'owner' => $faker->name,
        'email' => $faker->companyEmail,
        'members' => rand(4,10),
        'specialty' => $faker->paragraph(1, true),
        'location' => $faker->address,
        'phoneNumber' => $faker->phoneNumber,
        'status' => rand(0,1),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
