<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
                    $button = '<a name="edit" href="/booking/' . $data->booking_id . '" id="' . $data->booking_id . '" class="btn btn-primary btn-sm"><i class="far fa-fw fa-eye"></i></a> ';
                    $button .= '<button type="button" name="edit" id="' . $data->booking_id . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
//        return view('bookingData');
    }

    public function renderBookingCompleted()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customer_bookings_c')->get())
                ->addColumn('action', function ($data) {
                    $button = '<a name="edit" href="/booking/render/' . $data->booking_id . '" id="' . $data->booking_id . '" class="btn btn-primary btn-sm"><i class="far fa-fw fa-eye"></i></a> ';
                    $button .= '<button type="button" name="edit" id="' . $data->booking_id . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function renderBookingCancelled()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customer_bookings_cancelled')->get())
                ->addColumn('action', function ($data) {
                    $button = '<a name="edit" href="/booking/render/' . $data->booking_id . '" id="' . $data->booking_id . '" class="btn btn-primary btn-sm"><i class="far fa-fw fa-eye"></i></a> ';
                    $button .= '<button type="button" name="edit" id="' . $data->booking_id . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function renderBookingFraud()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customer_bookings_fraud')->get())
                ->addColumn('action', function ($data) {
                    $button = '<a name="edit" href="/booking/render/' . $data->booking_id . '" id="' . $data->booking_id . '" class="btn btn-primary btn-sm"><i class="far fa-fw fa-eye"></i></a> ';
                    $button .= '<button type="button" name="edit" id="' . $data->booking_id . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Booking $booking
     * @return Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Booking $bookings
     * @return Response
     */
    public function edit(Booking $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Booking $bookings
     * @return Response
     */
    public function update(Request $request, Booking $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Booking $bookings
     * @return Response
     */
    public function destroy(Booking $bookings)
    {
        //
    }
}
