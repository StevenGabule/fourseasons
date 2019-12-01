<?php

use App\Booking;
use App\BookingService;
use App\Customer;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerBookingServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_services')->delete();
        DB::table('bookings')->delete();
        DB::table('customers')->delete();
        factory(User::class, 1)->create();
        factory(Customer::class, 1000)->create()->each(function($c) {
            $c->bookings()->saveMany(factory(Booking::class, 1)->make())->each(function($bs) {
                $bs->bookingServices()->saveMany(factory(BookingService::class, rand(1,10))->make());
            });
        });
    }
}
