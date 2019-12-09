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
                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Customers</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- DataTables for booking information-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Customers Data Table
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="dataTableCustomer" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Created Date</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                            </table><!-- end of table -->
                        </div><!-- end of table responsive -->
                    </div><!-- end of card body -->
                </div><!-- end of card -->
            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTableCustomer').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('customers.all') }}",
                columns: [
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data) {
                            return formatDate(data);
                        }
                    },
                    {
                        data: 'fullName',
                        name: 'fullName',
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phoneNumber',
                        name: 'phoneNumber'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'action',
                        name: 'action',
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
