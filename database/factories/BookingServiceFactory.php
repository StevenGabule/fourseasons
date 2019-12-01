<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use App\BookingService;
use App\Customer;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(BookingService::class, function (Faker $faker) {
    return [
        'booking_id' => Booking::pluck('id')->random(),
        'customer_id' => Customer::pluck('id')->random(),
        'extra_work' => rand(1,10),
        'extra_time' => rand(1,10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
