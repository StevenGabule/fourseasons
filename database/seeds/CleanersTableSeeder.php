<?php

use App\Cleaners;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CleanersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cleaners')->delete();
        factory(Cleaners::class, 100)->create();
    }
}
