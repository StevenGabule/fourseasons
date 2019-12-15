<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'to' => $faker->safeEmail,
        'subject' => $faker->paragraph(1, true),
        'message' => $faker->paragraph(rand(3,6), true),
        'status' => rand(0,3),
        'label' => rand(0,3),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
