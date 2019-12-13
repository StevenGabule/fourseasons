<?php

namespace App\Http\Controllers;

use App\Booking;
use App\BookingService;
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

    public function allReservation()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('booking_all')->get())
                ->addColumn('action', function ($data) {
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item font-weight-bold" href="/booking/$data->id"><i class="fas fa-calendar-week"></i> Show Details</a>
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 completed_progress" id="$data->id" href="javascript:void(0)"><i class="fas fa-hourglass-half"></i> Pending</a>
                            <a class="dropdown-item font-weight-bold ml-2 booking_completed" id="$data->id" href="javascript:void(0)"><i class="fas fa-check"></i> Completed</a>
                            <a class="dropdown-item font-weight-bold ml-2 booking_cancel" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Cancel</a>
                            <a class="dropdown-item font-weight-bold ml-2 booking_fraud" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Fraud</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold bookingEditing" href="/booking/edit/$data->id"><i class="fas fa-user-edit"></i> Edit Booking</a>
                            <a class="dropdown-item font-weight-bold bookingDeleting" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete Booking</a>
                          </div>
                        </div>
EOT;
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function renderBooking()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customer_bookings_p')->get())
                ->addColumn('action', function ($data) {
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item font-weight-bold" href="/booking/$data->id"><i class="fas fa-calendar-week"></i> Show Details</a>
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 booking_completed" id="$data->id" href="javascript:void(0)"><i class="fas fa-check"></i> Completed</a>
                            <a class="dropdown-item font-weight-bold ml-2 booking_cancel" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Cancel</a>
                            <a class="dropdown-item font-weight-bold ml-2 booking_fraud" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Fraud</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold bookingEditing" href="/booking/edit/$data->id"><i class="fas fa-user-edit"></i> Edit Booking</a>
                            <a class="dropdown-item font-weight-bold bookingDeleting" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete Booking</a>
                          </div>
                        </div>
EOT;
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function renderBookingCompleted()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customer_bookings_c')->get())
                ->addColumn('action', function ($data) {
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item font-weight-bold" href="/booking/$data->id"><i class="fas fa-calendar-week"></i> Show Details</a>

                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            
                            <a class="dropdown-item font-weight-bold ml-2 completed_progress" id="$data->id" href="javascript:void(0)"><i class="fas fa-hourglass-half"></i> Pending</a>
                            <a class="dropdown-item font-weight-bold ml-2 completed_cancel" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Cancel</a>
                            <a class="dropdown-item font-weight-bold ml-2 completed_fraud" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Fraud</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold bookingEditing" href="/booking/edit/$data->id"><i class="fas fa-user-edit"></i> Edit Booking</a>
                            <a class="dropdown-item font-weight-bold bookingDeleting" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete Booking</a>
                          </div>
                        </div>
EOT;
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
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item font-weight-bold" href="/booking/$data->id"><i class="fas fa-calendar-week"></i> Show Details</a>
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 completed_progress" id="$data->id" href="javascript:void(0)"<i class="fas fa-hourglass-half"></i> Pending</a>
                            <a class="dropdown-item font-weight-bold ml-2 booking_completed" id="$data->id" href="javascript:void(0)"><i class="fas fa-check"></i> Completed</a>
                            <a class="dropdown-item font-weight-bold ml-2 completed_fraud" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Fraud</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold bookingEditing" href="/booking/edit/$data->id"><i class="fas fa-user-edit"></i> Edit Booking</a>
                            <a class="dropdown-item font-weight-bold bookingDeleting" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete Booking</a>
                          </div>
                        </div>
EOT;
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
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item font-weight-bold" href="/booking/$data->id"><i class="fas fa-calendar-week"></i> Show Details</a>
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 completed_progress" id="$data->id" href="javascript:void(0)"><i class="fas fa-check"></i> Pending</a>
                            <a class="dropdown-item font-weight-bold ml-2 completed_cancel" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Cancel</a>
                            <a class="dropdown-item font-weight-bold ml-2 completed_fraud" id="$data->id" href="javascript:void(0)"><i class="fas fa-hourglass-half"></i> Completed</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold bookingEditing" href="/booking/edit/$data->id"><i class="fas fa-user-edit"></i> Edit Booking</a>
                            <a class="dropdown-item font-weight-bold bookingDeleting" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete Booking</a>
                          </div>
                        </div>
EOT;
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function ChangedStatus($id, $type)
    {
        $bookingStatus = Booking::findOrFail($id);

        if ($type == 0)
            $bookingStatus->status = 0;

        if ($type == 1)
            $bookingStatus->status = 1;

        if ($type == 2)
            $bookingStatus->status = 2;

        if ($type == 3)
            $bookingStatus->status = 3;

        $bookingStatus->update();
        return redirect()->route('booking.index');
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
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();
        BookingService::where('booking_id', $id)->delete();
        return redirect()->route('booking.index');
    }
}


