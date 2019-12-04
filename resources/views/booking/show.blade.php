@extends('layouts.app')

@section('content')
    @php

        $services_extra = ['none', 'Cabinet', 'Windows', 'Walls', 'Laundry', 'Oven', 'Fridge', 'Ironing', 'Pets', 'Provide mop and vacuum', 'Bed Changing'];
        $frequency = ['none', 'One Time', 'Weekly', 'Biweekly', 'Monthly'];
        $floors = ['Single Floor', 'Two Floors', 'More than 2 floors'];
    @endphp

    <div id="wrapper">
        @include('layouts._sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Bookings</a></li>
                    <li class="breadcrumb-item active">Invoice Overview</li>
                </ol>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <p class="m-0 p-0">Booking Information</p>
                            <p class="m-0 p-0">Date created: {{ $booking->created_at->toFormattedDateString() }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <ul class="list-unstyled">
                                    <li><b>From</b></li>
                                    <li>{{ $booking->customer->fullName }}</li>
                                    <li>{{ $booking->customer->address }} {{ $booking->customer->home_apartment_number }}</li>
                                    <li>{{ $booking->customer->city}}, {{ $booking->customer->postcode}}</li>
                                    <li>Phone: {{ $booking->customer->phoneNumber }}</li>
                                    <li>Email: {{ $booking->customer->email }}</li>
                                    <li>Notes: <br>{{ $booking->note }}</li>
                                </ul>
                            </div>
                            <div class="col-3">
                                <ul class="list-unstyled">
                                    <li><b>Services</b></li>
                                    <li>
                                        Type: {{ $booking->service_type == 1 ? 'Regular' : $booking->service_type == 2 ? 'Deep clean' : 'End of Ternary' }}</li>
                                    <li>Pricing parameters
                                        <ul>
                                            <li>{{ $booking->bathroom }}
                                                x {{ str_plural('Bathroom', $booking->bathroom) }}</li>
                                            <li>{{ $booking->bedroom }}
                                                x {{ str_plural('Bedroom', $booking->bedroom) }}</li>
                                        </ul>
                                    </li>
                                    <li>Extra
                                        <ul>
                                            @foreach($booking->bookingServices as $extras)
                                                <li>{{ $services_extra[$extras->extra_work] }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-unstyled">
                                    <li><b>Booking Info</b></li>
                                    <li>Booking Number: {{ $booking->id }}</li>
                                    <li>Date / Time: {{ date('l jS \of F Y h:i:s A') }} at</li>
                                    <li>Frequency: {{ $frequency[$booking->frequency] }}</li>
                                    <li>Duration: {{ $booking->duration  }}</li>
                                    <li>SMS Notification: {{ $booking->sms_notification == 0 ? 'off' : 'on'}}</li>
                                    <li>Payment Method: {{ $booking->payment_type == 0 ? 'PayPal' : 'Stripe'}}</li>
                                    <li>Floors: {{ $floors[$booking->floors] }}</li>
                                    <li>Do you have a mop and vacuum? (These are required for us to clean)
                                        : {{ $booking->floors == 0 ? 'No' : 'Yes' }}</li>
                                    <li>Total Earn: £{{ number_format($booking->booking_total, 2) }}</li>
                                </ul>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="" class="btn btn-success btn-sm">Mark as Completed</a>
                                    </div>
                                    <div class="right">
                                        <a href="" class="btn btn-dark btn-sm">Mark as Fraud</a>
                                        <a href="" class="btn btn-danger btn-sm">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->
@endsection

