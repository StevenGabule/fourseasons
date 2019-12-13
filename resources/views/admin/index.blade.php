@extends('layouts.app')

@push('css_custom')
    <style>
        .change-primary {
            background-color: #22B9FF;
            color: white
        }

        .change-warning {
            background-color: #FFB822;
            color: white;
        }

        .change-success {
            background-color: #FD27EB;
            color: white;
        }

        .change-secondary {
            background-color: #1DC9B7;
            color: white;
        }

        .far.fa-fw.fa.fa-clipboard,
        .fas.fa-fw.fa-user-clock,
        .fas.fa-fw.fa-chalkboard-teacher,
        .card-body-icon .far.fa-fw.fa-envelope,
        .fas.fa-angle-right {
            color: white !important;
        }

        td { vertical-align: middle !important; }
        td { vertical-align: middle !important; }
        table.dataTable.table-sm > thead > tr > th { color: #74788d !important;}
        table.dataTable { border-collapse: collapse !important;}
        .default-table-size { font-size: 12px !important;}
        .frequency {display:block;width: 100px;text-align: center; color: white; font-size: 13px;border-radius: 25px}
        .monthly { background: #fd27eb;}
        .weekly { background: #1dc9b7;}
        .biweekly { background: #ffb822;}
        .onetime { background: #22b9ff;}
        .dataTables_length {
            margin-left: 2%;
            margin-top: 2%;
        }
        div.dataTables_wrapper div.dataTables_filter label {
            margin-right: 2%;
            margin-top: 2%;
        }

        table.dataTable.table-sm > thead > tr > th:nth-child(1),
        table.dataTable td:nth-child(1) { padding-left: 15px; }

        div.dataTables_wrapper div.dataTables_info {
            margin-left: 2%;
            padding-bottom: 4%;
            font-size: 11px;
            font-weight: bold;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-right: 2%;
            font-size: 11px;
        }
        tr.odd,
        tr.even {
            color: #595d6e;
        }

        .card-footer { border-top: none; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
@endpush

@section('content')
    <div id="wrapper">
        @include('layouts._sidebar')
        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card change-primary text-white o-hidden h-100 border-0 shadow">
                            <div class="card-body pb-0">
                                <div class="card-body-icon">
                                    <i class="far fa-fw fa fa-clipboard"></i>
                                </div>
                                <div class="mr-5">Total Bookings</div>
                                <div class="mr-5 font-weight-bold mt-1 pb-2">26</div>
                            </div>
                            <a class="card-footer  text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card change-success text-white o-hidden h-100 border-0 shadow">
                            <div class="card-body pb-0">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-user-clock"></i>
                                </div>
                                <div class="mr-5">Total Customers</div>
                                <div class="mr-5 font-weight-bold mt-1 pb-2">26</div>

                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card change-warning text-white o-hidden h-100 border-0 shadow">
                            <div class="card-body pb-0">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                                </div>
                                <div class="mr-5">Total Visitor</div>
                                <div class="mr-5 font-weight-bold mt-1 pb-2">26</div>

                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card change-secondary text-white o-hidden h-100 border-0 shadow">
                            <div class="card-body pb-0">
                                <div class="card-body-icon">
                                    <i class="far fa-fw fa-envelope"></i>
                                </div>
                                <div class="mr-5">Total Messengers</div>
                                <div class="mr-5 font-weight-bold mt-1 pb-2">26</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div><!-- end of row -->

                <!-- Area Chart Example-->
                <div class="card border-0 mb-3 shadow-lg">
                    <div class="card-header border-0 bg-transparent smaller font-weight-bold">
                        <i class="fas fa-chart-area"></i>
                        Visitor Analytics Bar Chart
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                    </div>
                </div><!-- end of card for chart -->

                <!-- DataTables Example -->
                <div class="card mb-3 border-0">
                    <div class="card-header bg-transparent border-0 smaller font-weight-bold">
                        <i class="fas fa-table"></i>
                        All Booking Reservation
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered small" id="dataTableBooking" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th width="20%">Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div><!-- end of card -->
            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="BookingDeletingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to remove?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" id="deletingBooking_" class="btn btn-danger btn-sm">Delete Booking</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

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

        $(document).on('click', '.completed_progress', function() {
            let booking_completedID = $(this).attr('id');
            let type = 0; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "booking/" + booking_completedID + "/status/" + type,
                beforeSend: function () {
                    toastr.error('Request processing...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#dataTableBooking').DataTable().ajax.reload();
                        toastr.success('Requested completed!');
                    }, 2000);
                }
            });
        });

        $(document).on('click', '.booking_completed', function() {
            let booking_completedID = $(this).attr('id');
            let type = 1; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "booking/" + booking_completedID + "/status/" + type,
                beforeSend: function () {
                    toastr.info('Request processing...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#dataTableBooking').DataTable().ajax.reload();
                        toastr.success('Requested completed!');
                    }, 300);
                }
            });
        });

        $(document).on('click', '.booking_cancel, .completed_cancel', function() {
            let bookingCancelID = $(this).attr('id');
            let type = 2; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "booking/" + bookingCancelID + "/status/" + type,
                beforeSend: function () {
                    toastr.info('Request processing...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#dataTableBooking').DataTable().ajax.reload();
                        toastr.success('Requested completed!');
                    }, 2000);
                }
            });
        });

        $(document).on('click', '.booking_fraud, .completed_fraud', function() {
            let bookingFraudID = $(this).attr('id');
            let type = 3; // 0 process | 1 completed | 2 cancel |  3 fraud
            $.ajax({
                url: "booking/" + bookingFraudID + "/status/" + type,
                beforeSend: function () {
                    toastr.info('Request processing...');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#dataTableBooking').DataTable().ajax.reload();
                        toastr.success('Requested completed!');
                    }, 2000);
                }
            });
        });

        let booking_ID;
        $(document).on('click', '.bookingDeleting', function() {
            booking_ID = $(this).attr('id');
            $("#deletingBooking_").text("Delete Booking");
            $("#BookingDeletingModal").modal('show');
        });

        $(document).on('click', '#deletingBooking_', function() {
            $.ajax({
                url: "booking/deleting/" + booking_ID,
                beforeSend: function () {
                    $('#deletingBooking_').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...');
                },
                success: function (data) {
                    $('#dataTableBooking').DataTable().ajax.reload();
                    $('#BookingDeletingModal').modal('hide');
                }
            });
        });

        $(document).ready(function() {

            function formatDate(_date, _time="") {
                let d = new Date(_date);
                let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                return '<span class="font-weight-bold">' + months[d.getMonth()].substring(0, 3) + ' ' + d.getDate() + '</span> / ' + _time + ' / <span class="font-weight-bold">' + days[d.getDay()] + '</span>';
            }

            $('#dataTableBooking').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: "{{ route('booking.all') }}",
                columnDefs: [{ targets: [0,1,3,4], searchable: false }],
                columns: [
                    {
                        data: {
                            service_date_start: 'service_date_start',
                            service_time: 'service_time',
                        },
                        render: (data) => formatDate(data['service_date_start'], data['service_time'])
                    },
                    {
                        data: 'service_type',
                        name: 'service_type',
                        render: function (data) {
                            if (parseInt(data) === 1) {
                                return "Regular";
                            } else if (parseInt(data) === 2) {
                                return "Deep Clean";
                            } else {
                                return "Tenancy";
                            }
                        },
                    },
                    {
                        data: 'fullName',
                        name: 'fullName',
                        render: (data) => '<span class="font-weight-bold">' + data + '</span>'
                    },
                    {
                        data: 'location',
                        name: 'location',
                        render: function (data) {
                            return data.substr(0,80) + '...';
                        }
                    },
                    {
                        data: 'frequency',
                        name: 'frequency',
                        render: function (data) {
                            if (parseInt(data) === 1) {
                                return "<span class='frequency onetime'>One time</span>";
                            } else if (parseInt(data) === 2) {
                                return "<span class='frequency weekly'>Weekly</span>";
                            } else if (parseInt(data) === 3) {
                                return "<span class='frequency biweekly'>Biweekly</span>";
                            } else {
                                return "<span class='frequency monthly'>Monthly</span>";
                            }
                        },
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        })
    </script>
@endpush
