<?php

namespace App\Http\Controllers;

use App\Cleaners;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Validator;

class CleanersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cleaners.index');
    }

    public function cleanersAll()
    {
        if (request()->ajax()) {
            return DataTables::of(Cleaners::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = <<<EOT
                        <div class="dropdown bookingCustomer">
                          <a class="btn btn-light shadow-sm" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-h fa-sm fa-fw"></i>
                          </a>

                          <div class="dropdown-menu" style="font-size: 11px;width: 50px;" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item font-weight-bold CleanersShow" id="$data->id" href="javascript:void(0)">
                                <i class="fas fa-calendar-week"></i> Show Details
                                </a>
                            <h6 class="dropdown-header font-weight-bold" style="font-size: 11px;"><i class="far fa-bookmark"></i> Mark as </h6>
                            <a class="dropdown-item font-weight-bold ml-2 availableClass" title="available" id="$data->id" href="javascript:void(0)"><i class="fas fa-check"></i> Available</a>
                            <a class="dropdown-item font-weight-bold ml-2 unavailableClass" title="unavailable" id="$data->id" href="javascript:void(0)"><i class="fas fa-ban"></i> Unavailable</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold CleanersShow" href="/booking/edit/$data->id"><i class="fas fa-user-edit"></i> Edit Cleaners</a>
                            <a class="dropdown-item font-weight-bold CleanersDeleting" id="$data->id" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete Cleaners</a>
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'owner' => 'required',
            'email' => 'required|unique:cleaners',
            'phoneNumber' => 'required',
            'status' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if ($request->button_action == "Done") {
            $cleaner = new Cleaners([
                'company' => $request->company,
                'owner' => $request->owner,
                'email' => $request->email,
                'members' => $request->members,
                'specialty' => $request->specialty,
                'location' => $request->location,
                'phoneNumber' => $request->phoneNumber,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);
            $cleaner->save();
        }
        return response()->json(['success' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cleaners $cleaners
     * @return Response
     */
    public function show(Cleaners $cleaners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $cleaners = Cleaners::findOrFail($id);
            return response()->json(['data' => $cleaners]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'owner' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'status' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'company' => $request->company,
            'owner' => $request->owner,
            'email' => $request->email,
            'members' => $request->members,
            'specialty' => $request->specialty,
            'location' => $request->location,
            'phoneNumber' => $request->phoneNumber,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        );
        Cleaners::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        Cleaners::find($id)->delete();
    }

    public function ChangeStatus($id, $status)
    {
        $cleaners = Cleaners::find($id);
        if ($status == 'available') {
            $cleaners->status = 1;
        } else {
            $cleaners->status = 0;
        }
        $cleaners->update();
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
