<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CustomerBookingServicesSeeder::class);
         $this->call(CleanersTableSeeder::class);
         $this->call(MessagesTableSeeder::class);
    }
}
