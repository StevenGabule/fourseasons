@extends('layouts.app')
@push('css_booking_page')
    <style>
        td {
            vertical-align: middle !important;
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTableBooking" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTableBookingCompleted" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTableBookingCancelled" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTableBookingFraud" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Customer</th>
                                    <th>Location</th>
                                    <th>Frequency</th>
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
    <script>
        $(document).ready(function () {
            $('#dataTableBooking').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking.render') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: 'service_date',
                        name: 'service_date',
                        render: function (data) {
                            return formatDate(data);
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
                                return "One time";
                            } else if (parseInt(data) === 2) {
                                return "Weekly";
                            } else if (parseInt(data) === 3) {
                                return "Biweekly";
                            } else {
                                return "Monthly";
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
                ajax: "{{ route('booking.render.completed') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: 'service_date',
                        name: 'service_date',
                        render: function (data) {
                            return formatDate(data);
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
                                return "One time";
                            } else if (parseInt(data) === 2) {
                                return "Weekly";
                            } else if (parseInt(data) === 3) {
                                return "Biweekly";
                            } else {
                                return "Monthly";
                            }
                        },
                        orderable: false
                    }
                ]
            });

            $('#dataTableBookingCancelled').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking.render.cancelled') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: 'service_date',
                        name: 'service_date',
                        render: function (data) {
                            return formatDate(data);
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
                                return "One time";
                            } else if (parseInt(data) === 2) {
                                return "Weekly";
                            } else if (parseInt(data) === 3) {
                                return "Biweekly";
                            } else {
                                return "Monthly";
                            }
                        },
                        orderable: false
                    }
                ]
            });
            $('#dataTableBookingFraud').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking.render.fraud') }}",
                columnDefs: [
                    {
                        targets: [0,1,3,4],
                        searchable: false
                    }
                ],
                columns: [
                    {
                        data: 'service_date',
                        name: 'service_date',
                        render: function (data) {
                            return formatDate(data);
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
                                return "One time";
                            } else if (parseInt(data) === 2) {
                                return "Weekly";
                            } else if (parseInt(data) === 3) {
                                return "Biweekly";
                            } else {
                                return "Monthly";
                            }
                        },
                        orderable: false
                    }
                ]
            });

            function formatDate(_date) {
                var d = new Date(_date);
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                return months[d.getMonth()].substring(0, 3) + '. ' + d.getDate() + ' / ' + days[d.getDay()];
            }
        })
    </script>
@endpush