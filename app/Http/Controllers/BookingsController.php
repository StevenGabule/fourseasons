<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('booking.index');
    }

    public function renderBooking()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customer_bookings_p')->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->booking_id . '" class="btn btn-primary btn-sm"><i class="far fa-fw fa-eye"></i></button>';
                    $button .= '<button type="button" name="edit" id="' . $data->booking_id . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
//        return view('bookingData');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Booking $bookings
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Booking $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Booking $bookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Booking $bookings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $bookings)
    {
        //
    }
}
