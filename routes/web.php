<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/booking', 'BookingsController@index')->name('booking.index');
Route::get('/booking/progress', 'BookingsController@renderBooking')->name('booking.render');
Route::get('/booking/completed', 'BookingsController@renderBookingCompleted')->name('booking.render.completed');
Route::get('/booking/cancelled', 'BookingsController@renderBookingCancelled')->name('booking.render.cancelled');
Route::get('/booking/fraud', 'BookingsController@renderBookingFraud')->name('booking.render.fraud');
Route::get('/booking/{booking_id}', 'BookingsController@show')->name('booking.render.by');


Route::get('/customers', 'CustomersController@index')->name('customers.index');
Route::get('/customers/all', 'CustomersController@GetCustomers')->name('customers.all');

Route::get('/calendars', 'CalendarEvent@index')->name('calendar.index');

Route::get('/booking/{id}/status/{type}', 'BookingsController@ChangedStatus')->name('booking.status');
Route::get('/booking/deleting/{id}', 'BookingsController@destroy')->name('booking.delete');


