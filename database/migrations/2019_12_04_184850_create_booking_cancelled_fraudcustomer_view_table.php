<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateBookingCancelledFraudcustomerViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE VIEW customer_bookings_cancelled
            AS
            SELECT 
                bookings.id AS booking_id,
                bookings.customer_id,
                bookings.service_date_start,
                bookings.service_date_end,
                bookings.service_time,
                bookings.service_type,
                bookings.frequency,
                bookings.duration, 
                bookings.`status`,
                customers.id,
                customers.fullName,
                customers.email,
                CONCAT(customers.address, \" \", customers.home_apartment_number, \" \" , customers.city, \" \", customers.postcode) AS \"location\"
                FROM bookings 
                INNER JOIN customers ON
                bookings.customer_id = customers.id
                WHERE bookings.`status` = 2 
                ORDER BY bookings.`status` DESC;
      ");

        DB::statement("
            CREATE OR REPLACE VIEW customer_bookings_fraud
            AS
            SELECT 
                bookings.id AS booking_id,
                bookings.customer_id,
                bookings.service_date_start,
                bookings.service_date_end,
                bookings.service_time,
                bookings.service_type,
                bookings.frequency,
                bookings.duration, 
                bookings.`status`,
                customers.id,
                customers.fullName,
                customers.email,
                CONCAT(customers.address, \" \", customers.home_apartment_number, \" \" , customers.city, \" \", customers.postcode) AS \"location\"
                FROM bookings 
                INNER JOIN customers ON
                bookings.customer_id = customers.id
                WHERE bookings.`status` = 3 
                ORDER BY bookings.`status` DESC;
      ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
