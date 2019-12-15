@extends('layouts.app')
@push('css_calendar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        .fc-ltr .fc-basic-view .fc-day-number {
            font-size: 20px !important;
        }
    </style>
@endpush
@section('content')
    <div id="wrapper">
        @include('layouts._sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('calendar.index') }}">Calendar of Events</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- DataTables for booking information-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Calendar of Events
                    </div>
                    <div class="card-body">
                        {!! $calendar_details->calendar() !!}
                        {{--                        <div id='calendar'></div>--}}
                    </div><!-- end of card body -->
                </div><!-- end of card -->
            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->
@endsection

@push('calendar')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar_details->script() !!}--}}

@endpush
