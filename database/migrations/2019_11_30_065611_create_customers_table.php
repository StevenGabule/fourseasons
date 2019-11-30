<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('fullName', 100);
            $table->string('email', 255);
            $table->string('phoneNumber', 100);
            $table->char('reminder', 1)->default(0)->comment('0 - off | 1 - on');
            $table->text('address');
            $table->string('home_apartment_number', 200);
            $table->string('city', 100);
            $table->string('postcode', 100);
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
        Schema::dropIfExists('customers');
    }
}
