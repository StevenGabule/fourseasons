@extends('layouts.app')

@section('content')
    @php
        $services_extra = ['none', 'Cabinet', 'Windows', 'Walls', 'Laundry', 'Oven', 'Fridge', 'Ironing', 'Pets', 'Provide mop and vacuum', 'Bed Changing'];
        $frequency = ['none', 'One Time', 'Weekly', 'Biweekly', 'Monthly'];
        $floors = ['Single Floor', 'Two Floors', 'More than 2 floors'];
        $status = ['In Progress', 'Completed', 'Cancelled', 'Mark as Fraud'];
    @endphp

    <div id="wrapper">
        @include('layouts._sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Bookings</a></li>
                    <li class="breadcrumb-item active">Invoice Overview</li>
                </ol>

                <div class="card">
                    <div class="card-header small">
                        <div class="d-flex justify-content-between">
                            <p class="m-0 p-0">Booking Information <span class="badge badge-primary">{{ $status[$booking->status] }}</span></p>
                            <p class="m-0 p-0">Date created: {{ $booking->created_at->toFormattedDateString() }}</p>
                        </div>
                    </div><!-- end of card-header -->
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
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-unstyled" style="font-size: 14px;">
                                    <li>Booking Info</li>
                                    <li><b>Booking Number: {{ $booking->id }}</b></li>
                                    <li><b>Date / Time</b>: {{ date('l jS \of F Y') }} at {{ $booking->service_time }}
                                    </li>
                                    <li><b>Frequency</b>: {{ $frequency[$booking->frequency] }}</li>
                                    <li><b>Estimated Duration</b>: {{ $booking->duration }}</li>
                                    <li><b>SMS Notification</b>: {{ $booking->sms_notification == 0 ? 'off' : 'on'}}
                                    </li>
                                    <li><b>Payment Method</b>: {{ $booking->payment_type == 0 ? 'PayPal' : 'Stripe'}}
                                    </li>
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
                                        <th width="3%">#</th>
                                        <th>Extras</th>
                                        <th>Values</th>
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
                                        <button type="button" id="{{ $booking->id }}" class="btn btn-success btn-sm MarkCompleted">Mark as Completed</button>
                                    </div>
                                    <div class="right">
                                        <button type="button" id="{{ $booking->id }}" class="btn btn-dark btn-sm MarkFraud">Mark as Fraud</button>
                                        <button type="button" id="{{ $booking->id }}" class="btn btn-danger btn-sm MarkBookingCancel">Cancel Booking</button>
                                    </div>
                                </div>
                            </div><!-- end of col -->
                        </div><!-- end of row -->
                    </div><!-- end of card-body -->
                </div><!-- end of card -->
            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $(document).on('click', '.MarkCompleted', function() {
            let booking_completedID = $(this).attr('id');
            let type = 1; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "/booking/" + booking_completedID + "/status/" + type,
                beforeSend: function () {
                    $('.MarkCompleted').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                }, success: function (data) {
                    return window.location.href="/booking";
                }
            });
        });

        $(document).on('click', '.MarkFraud', function() {
            let BookingID = $(this).attr('id');
            let type = 3; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "/booking/" + BookingID + "/status/" + type,
                beforeSend: function () {
                    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                }, success: function (data) {
                    return window.location.href="/booking";
                }
            });
        });

        $(document).on('click', '.MarkBookingCancel', function() {
            let bookingID = $(this).attr('id');
            let type = 2; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "/booking/" + bookingID + "/status/" + type,
                beforeSend: function () {
                    $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                }, success: function (data) {
                    return window.location.href="/booking";
                }
            });
        });
    </script>
@endpush

