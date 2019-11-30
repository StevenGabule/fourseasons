<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->unsignedBigInteger('customer_id');
            $table->smallInteger('service_type')->default(1);
            $table->dateTime('service_date');
            $table->string('service_time');
            $table->smallInteger('frequency')->default(1)->comment('');
            $table->string('duration', 50);
            $table->string('floors', 50)->default(0);
            $table->smallInteger('require_')->default(0)->comment('0 for not | 1 for yes');
            $table->text('note');
            $table->smallInteger('bedroom');
            $table->smallInteger('bathroom');
            $table->double('booking_total', 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
