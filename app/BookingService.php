<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
