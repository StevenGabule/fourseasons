<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Customer;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookings = Booking::all()->count();
        $customers = Customer::all()->count();
        $messages = Message::all()->count();
        return view('admin.index', compact('bookings', 'customers', 'messages'));
    }

    public function logout()
    {
        Auth::logout();
    }
}
