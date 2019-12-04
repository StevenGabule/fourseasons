<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index');
    }

    public function GetCustomers()
    {
        if (request()->ajax()) {
            return DataTables::of(DB::table('customers')->get())
                ->addColumn('action', function ($data) {
                    $button = '<a name="edit" href="/booking/' . $data->id . '" id="' . $data->id . '" class="btn btn-primary btn-sm"><i class="far fa-fw fa-eye"></i></a> ';
                    $button .= '<button type="button" name="edit" id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
     * @param \App\Customer $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customers)
    {
        //
    }
}
