<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use App\Customer;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'customer_id' => Customer::pluck('id')->random(),
        'service_type' => rand(1,3),
        'service_date_start' => $faker->date($format = 'Y/m/d', $max = 'now'),
        'service_date_end' => $faker->date($format = 'Y/m/d', $max = 'now'),
        'service_time' => '1:00PM - 2:00PM',
        'frequency' => rand(1,4),
        'sms_notification' => rand(0,1),
        'payment_type' => rand(0,1),
        'duration' => rand(2,5) . ' hours',
        'floors' => rand(1,2),
        'require_' => rand(0,1),
        'note' => $faker->paragraph(rand(3,7), true),
        'bedroom' => rand(1,5),
        'bathroom' => rand(1,5),
        'status' => rand(0,3),
        'booking_total' => rand(50, 300),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
