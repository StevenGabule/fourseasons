<?php

namespace App\Http\Controllers;

use App\Cleaners;
use App\Mail\SendingEmailToCustomers;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Validator;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('messages.index');
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

    public function GetAllMessages($status)
    {
        if (request()->ajax()) {
            return DataTables::of(Message::all()->where('status', '=', $status))
                ->addColumn('action', function ($data) {
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 BtnRead" id="$data->id" href="javascript:void(0)"><i class="fas fa-hourglass-half"></i> Read</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnSpam" id="$data->id" href="javascript:void(0)"><i class="fas fa-check"></i> Spam</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnDraft_" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Draft</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnImportant_" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Important</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnPromotions_" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Promotions</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnSocial_" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Social</a>
                            <a class="dropdown-item font-weight-bold BtnTrash" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Trash</a>
                          </div>
                        </div>
EOT;
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function GetAllMessageLabel($label)
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('messages')->where('label', '=', $label)->get())
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


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'to' => 'required',
            'subject' => 'required',
            'message' => 'required',
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = array(
            'name' => Auth::user()->name,
            'to' => $request->to,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        Mail::to($request->to)->send(new SendingEmailToCustomers($data));

        $Message = new Message([
            'email' => Auth::user()->email,
            'to' => $request->to,
            'name' => Auth::user()->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $Message->save();
        return response()->json(['success' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Message $message
     * @return Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Message $message
     * @return Response
     */
    public function update(Request $request, Message $message)
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
        $message = Message::find($id);
        $message->delete();
        return response()->json(['success' => 'Successfully deleted']);
    }
}
