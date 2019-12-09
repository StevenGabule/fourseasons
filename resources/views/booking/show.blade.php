@extends('layouts.app')

@push('css_custom')
    <style>

    </style>
@endpush

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
                                <ul class="list-unstyled" style="font-size: 14px">
                                    <li>From</li>
                                    <li><b>{{ $booking->customer->fullName }}</b></li>
                                    <li>{{ $booking->customer->address }} {{ $booking->customer->home_apartment_number }}</li>
                                    <li>{{ $booking->customer->city}}, {{ $booking->customer->postcode}}</li>
                                    <li><b>Phone:</b> {{ $booking->customer->phoneNumber }}</li>
                                    <li><b>Email:</b> {{ $booking->customer->email }}</li>
                                    <li><b>Notes:</b> <br>{{ $booking->note }}</li>
                                </ul>
                            </div>
                            <div class="col-3">
                                <ul class="list-unstyled" style="font-size: 14px">
                                    <li>Services</li>
                                    <li>
                                        <b>Type: {{ $booking->service_type == 1 ? 'Regular' : $booking->service_type == 2 ? 'Deep clean' : 'End of Ternary' }}</b>
                                    </li>
                                    <li>Pricing parameters
                                        <ul>
                                            <li>{{ $booking->bathroom }}
                                                x {{ str_plural('Bathroom', $booking->bathroom) }}</li>
                                            <li>{{ $booking->bedroom }}
                                                x {{ str_plural('Bedroom', $booking->bedroom) }}</li>
                                        </ul>
                                    </li>
                                    {{--<li>Extra
                                        <ul>
                                            @foreach($booking->bookingServices as $extras)
                                                <li>{{ $services_extra[$extras->extra_work] }}</li>
                                            @endforeach
                                        </ul>
                                    </li>--}}
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-unstyled" style="font-size: 14px;">
                                    <li>Booking Info</li>
                                    <li><b>Booking Number: {{ $booking->id }}</b></li>
                                    <li><b>Date / Time</b>: {{ date('l jS \of F Y h:i:s A') }} at</li>
                                    <li><b>Frequency</b>: {{ $frequency[$booking->frequency] }}</li>
                                    <li><b>Duration</b>: {{ $booking->duration  }}</li>
                                    <li><b>SMS Notification</b>: {{ $booking->sms_notification == 0 ? 'off' : 'on'}}</li>
                                    <li><b>Payment Method</b>: {{ $booking->payment_type == 0 ? 'PayPal' : 'Stripe'}}</li>
                                    <li><b>Floors</b>: {{ $floors[$booking->floors] }}</li>
                                    <li>Do you have a mop and vacuum?: {{ $booking->floors == 0 ? 'No' : 'Yes' }}</li>
                                    <li><b>Total Earning</b>: £{{ number_format($booking->booking_total, 2) }}</li>
                                </ul>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-sm table-bordered table-striped" style="font-size: 14px;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Extra Work</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach($booking->bookingServices as $extras)
                                        <tr>
                                            <td><?= $count; ?></td>
                                            <td>{{ $services_extra[$extras->extra_work] }}</td>
                                            <td>{{ $extras->extra_time }}</td>
                                        </tr>
                                        <?php $count++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="" class="btn btn-success btn-sm">Mark as Completed</a>
                                    </div>
                                    <div class="right">
                                        <a href="" class="btn btn-dark btn-sm">Mark as Fraud</a>
                                        <a href="" class="btn btn-danger btn-sm">Cancel Booking</a>
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

