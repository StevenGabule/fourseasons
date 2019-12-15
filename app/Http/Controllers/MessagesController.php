<?php

namespace App\Http\Controllers;

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
                            <a class="dropdown-item font-weight-bold BtnOpen_" title="inbox" id="$data->id" href="javascript:void(0)"><i class="fas fa-eye mr-2"></i>Open Mail</a>
                            <h6 class="dropdown-header BtnMark_ font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 BtnInbox_" title="inbox" id="$data->id" href="javascript:void(0)"><i class="fas fa-inbox mr-2"></i>Inbox</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnDraft_" title="draft" id="$data->id" href="javascript:void(0)"><i class="fas fa-file mr-2"></i> Draft</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnImportant_" title="important" id="$data->id" href="javascript:void(0)"><i class="fas fa-star mr-2"></i>Important</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnPromotions_" title="promotions" id="$data->id" href="javascript:void(0)"><i class="fas fa-ad mr-2"></i>Promotions</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnSocial_" title="social" id="$data->id" href="javascript:void(0)"><i class="fas fa-share-alt mr-2"></i> Social</a>
                            <a class="dropdown-item font-weight-bold BtnTrash" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash mr-2"></i> Delete</a>
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
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 BtnDraft_" title="draft" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Draft</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnImportant_" title="important" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Important</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnPromotions_" title="promotions" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Promotions</a>
                            <a class="dropdown-item font-weight-bold ml-2 BtnSocial_" title="social" id="$data->id" href="javascript:void(0)"><i class="fas fa-user-ninja"></i> Social</a>
                            <a class="dropdown-item font-weight-bold BtnTrash" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete</a>
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

    public function show($id)
    {
        if (request()->ajax()) {
            $message = Message::findOrFail($id);
            return response()->json(['data' => $message]);
        }
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
        $message = Message::findOrFail($id);
        $message->delete();
        return response()->json(['success' => 'Successfully deleted']);
    }

    public function ChangeLabel($val, $id)
    {
        $message = Message::find($id)->update(['label' => $val]);
        $message->update();
        return response()->json(['success' => 'Successfully updated']);
    }

    public function ChangeToMove($id, $val)
    {
        Message::find($id)->update(['status' => $val]);
        return response()->json(['success' => 'Successfully updated']);
    }

    public function SaveMessageDraft($to, $subject, $message)
    {
        $message_ = new Message([
            'to' => $to,
            'subject' => $subject,
            'message' => $message,
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'status' => 2,
        ]);
        $message_->save();
        return response()->json(['success' => 'success drafting the message']);
    }

}
