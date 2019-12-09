<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class CalendarEvent extends Controller
{
    //0-process|1-Com|2-Can|3-fraud
    public function index()
    {
        $bookings = Booking::with('customer')->get();
        $bookingList = [];
        foreach ($bookings as $key) {
            $bookingList[] = Calendar::event(
               $key->customer->fullName . ' ' . $key->service_time,
                true,
                new \DateTime($key->service_date_start),
                new \DateTime($key->service_date_end),
                $key->customer_id,
                [
                    'textColor' => $this->StatusCodeTex($key->status),
                    'color' => $this->StatusCode($key->status),
                    'url' => '/booking/' . $key->id
                ]
            );
        }
        $calendar_details = Calendar::addEvents($bookingList);
        return view('calendar.index', compact('calendar_details'));
//        return view('calendar.index', compact('bookings'));
    }

    public function StatusCode($status)
    {
        // progress
        if ($status == 0) {
            return 'rgba(54,108,243,0.1)';
        }
        // completed
        if ($status == 1) {
            return 'rgba(54,108,243,0.1)';
        }
        // cancel
        if ($status == 2) {
            return 'rgba(253,57,122,0.1)';
        }
        // fraud
        if ($status == 3) {
            return 'rgba(255,184,34,0.1)';
        }
    }

    public function StatusCodeTex($status)
    {
        // progress
        if ($status == 0) {
            return '#366cf3';
        }
        // completed
        if ($status == 1) {
            return '#1dc9b7';
        }
        // cancel
        if ($status == 2) {
            return '#fd397a';
        }
        // fraud
        if ($status == 3) {
            return '#ffb822';
        }
    }

    public function getFullName($id)
    {
        $customer = Customer::find($id);
        return  $customer->fullName;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calendar  $calendar
     * @return Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calendar  $calendar
     * @return Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendar  $calendar
     * @return Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendar  $calendar
     * @return Response
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
