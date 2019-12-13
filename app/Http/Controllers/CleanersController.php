<?php

namespace App\Http\Controllers;

use App\Cleaners;
use Illuminate\Http\Request;

class CleanersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->ajax()) {
            
        }
        return view('cleaners.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cleaners  $cleaners
     * @return \Illuminate\Http\Response
     */
    public function show(Cleaners $cleaners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cleaners  $cleaners
     * @return \Illuminate\Http\Response
     */
    public function edit(Cleaners $cleaners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cleaners  $cleaners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cleaners $cleaners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cleaners  $cleaners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cleaners $cleaners)
    {
        //
    }
}
