@extends('layouts.app')
@push('css_booking_page')
    <style>
        td { vertical-align: middle !important; }
        table.dataTable.table-sm > thead > tr > th { color: #74788d !important;}
        table.dataTable { border-collapse: collapse !important;}
        .default-table-size { font-size: 14px !important;}
        .frequency {display:block;width: 100px;margin: 0 auto;text-align: center; color: white; font-size: 13px;border-radius: 25px}
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
        table.dataTable td:nth-child(1){
            padding-left: 15px;
        }

        div.dataTables_wrapper div.dataTables_info {
            margin-left: 2%;
            padding-bottom: 2%;
        }
        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-right: 2%;
        }
        tr.odd,
        tr.even {
            color: #595d6e;
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
                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Bookings</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- DataTables for booking information-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Booking Data Table
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm default-table-size" id="dataTableBooking" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th width="20%">Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                            </table><!-- end of table -->
                        </div><!-- end of table responsive -->
                    </div><!-- end of card body -->
                </div><!-- end of card -->

                <!-- DataTables for completed booking information-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                         Completed Booking Data Table
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm default-table-size" id="dataTableBookingCompleted" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table><!-- end of table -->
                        </div><!-- end of table responsive -->
                    </div><!-- end of card body -->
                </div><!-- end of card -->
                <!-- start of card for cancelled -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Cancelled Booking Data Table
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm default-table-size" id="dataTableBookingCancelled" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table><!-- end of table -->
                        </div><!-- end of table responsive -->
                    </div><!-- end of card body -->
                </div>

                <!-- start of card for cancelled -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Fraud Booking Data Table
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm default-table-size" id="dataTableBookingFraud" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table><!-- end of table -->
                        </div><!-- end of table responsive -->
                    </div><!-- end of card body -->
                </div>

            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->
@endsection

@push('scripts')
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#dataTableBooking').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: "{{ route('booking.render') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: {
                            service_date_start: 'service_date_start',
                            service_time: 'service_time',
                        },
                        render: function (data) {
                            return formatDate(data['service_date_start'], data['service_time']);
                        }
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
                        name: 'fullName'
                    },
                    {
                        data: 'location',
                        name: 'location',
                        render: function (data) {
                            return data.substr(0, 60) + '...';
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
            $('#dataTableBookingCompleted').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: "{{ route('booking.render.completed') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: {
                            service_date_start: 'service_date_start',
                            service_time: 'service_time',
                        },
                        render: function (data) {
                            return formatDate(data['service_date_start'], data['service_time']);
                        }
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
                        name: 'fullName'
                    },
                    {
                        data: 'location',
                        name: 'location',
                        render: function (data) {
                            return data.substr(0, 70) + '...';
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
            $('#dataTableBookingCancelled').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: "{{ route('booking.render.cancelled') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: {
                            service_date_start: 'service_date_start',
                            service_time: 'service_time',
                        },
                        render: function (data) {
                            return formatDate(data['service_date_start'], data['service_time']);
                        }
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
                        name: 'fullName'
                    },
                    {
                        data: 'location',
                        name: 'location',
                        render: function (data) {
                            return data.substr(0, 70) + '...';
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
            $('#dataTableBookingFraud').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: "{{ route('booking.render.fraud') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: {
                            service_date_start: 'service_date_start',
                            service_time: 'service_time',
                        },
                        render: function (data) {
                            return formatDate(data['service_date_start'], data['service_time']);
                        }
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
                        name: 'fullName'
                    },
                    {
                        data: 'location',
                        name: 'location',
                        render: function (data) {
                            return data.substr(0, 70) + '...';
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
            function formatDate(_date, _time="") {
                let d = new Date(_date);
                let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                return '<span class="font-weight-bold">' + months[d.getMonth()].substring(0, 3) + ' ' + d.getDate() + '</span> / ' + _time + ' / <span class="font-weight-bold">' + days[d.getDay()] + '</span>';
            }
        })
    </script>
@endpush
