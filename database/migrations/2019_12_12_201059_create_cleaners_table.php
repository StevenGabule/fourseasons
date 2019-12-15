<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleanersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company', 150)->default('none');
            $table->text('logo');
            $table->string('owner', 100);
            $table->string('email', 100);
            $table->tinyInteger('members');
            $table->string('specialty');
            $table->text('location');
            $table->string('phoneNumber', 50);
            $table->tinyInteger('status')->default(1)->comment('1 = available | 0 = unavailable');
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
        Schema::dropIfExists('cleaners');
    }
}
