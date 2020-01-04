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
    return view('index');
});

Route::get('/booking-customer', function () {
    return view('booking');
})->name('booking.customer');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/booking', 'BookingsController@index')->name('booking.index');
Route::get('/booking/all', 'BookingsController@allReservation')->name('booking.all');
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

Route::get('/cleaners', 'CleanersController@index')->name('cleaners.all');
Route::get('/cleaners/all', 'CleanersController@cleanersAll')->name('cleaners.get');
Route::get('/cleaners/{id}/edit', 'CleanersController@edit')->name('cleaners.edit');
Route::post('/cleaners/add', 'CleanersController@store')->name('cleaners.store');
Route::post('/cleaners/update', 'CleanersController@update')->name('cleaners.update');
Route::get('/cleaners/deleting/{id}', 'CleanersController@destroy')->name('cleaners.deleting');
Route::get('/cleaners/availability/{id}/status/{status}', 'CleanersController@ChangeStatus')->name('cleaners.availability');

Route::get('/messages', 'MessagesController@index')->name('messages.index');
Route::get('/message/show/{id}', 'MessagesController@show')->name('messages.show');
Route::get('/messages/all/{status}', 'MessagesController@GetAllMessages')->name('messages.all');
Route::get('/messages/label/{label}', 'MessagesController@GetAllMessageLabel')->name('messages.label.all');
Route::post('/messages/store', 'MessagesController@store')->name('messages.store');
Route::get('/messages/deleting/{id}', 'MessagesController@destroy')->name('messages.destroy');
Route::get('/messages/label_/{label}/{id}', 'MessagesController@ChangeLabel')->name('messages.label.modify');

Route::get('/messages/status_/{id}/{status}', 'MessagesController@ChangeToMove')->name('messages.to.status');
Route::get('/messages/draft/{to}/{subject}/{message}', 'MessagesController@SaveMessageDraft')->name('messages.draft');


Route::get('user/logout', 'HomeController@logout')->name('user.logout');
