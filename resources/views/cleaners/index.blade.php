@extends('layouts.app')
@push('css_booking_page')
    <style>
        td {
            vertical-align: middle !important;
        }

        table.dataTable.table-sm > thead > tr > th {
            color: #74788d !important;
        }

        .font-color {
            color: #595d6e;
        }

        table.dataTable {
            border-collapse: collapse !important;
        }

        tr.odd,
        tr.even {
            color: #595d6e;
        }

        .dataTables_length {
            margin-left: 2%;
            margin-top: 2%;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            margin-right: 2%;
            margin-top: 2%;
        }

        table.dataTable.table-sm > thead > tr > th:nth-child(1),
        table.dataTable td:nth-child(1) {
            padding-left: 15px;
        }

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

        .av-success {
            background-color: #1dc9b7
        }

        .av-danger {
            background-color: #FD397A
        }

        .alert {
            padding: 0.75rem 1.25rem 0.15rem 1.25rem !important;
        }
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
                    <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Cleaners</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
                <div class="text-right mb-3">
                    <a href="javascript:void(0)" id="CleanersAdd" class="btn btn-light btn-sm shadow-sm font-color font-weight-bold">Add Cleaner</a>
                </div>
                <!-- DataTables for booking information-->
                <div class="card mb-3 border-0 shadow">
                    <div class="card-header bg-transparent border-bottom-0">
                        <i class="fas fa-table"></i>
                        Cleaners Data Table
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered small" id="DataTableCleaners" width="100%"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Managed By</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Specialty</th>
                                    <th>Availability</th>
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

    <div id="CleanersModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="cleaners_form">
                    <div class="modal-header">
                        <h5 class="modal-title">Cleaners Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div id="form_output"></div>

                        <div class="form-group">
                            <input type="text" name="company" class="form-control" placeholder="Company Name"
                                   id="company">
                        </div>
                        <div class="form-group">
                            <input type="text" name="owner" class="form-control" placeholder="Owner name" id="owner">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phoneNumber" class="form-control" placeholder="Phone number"
                                   id="PhoneNumber">
                        </div>
                        <div class="form-group">
                            <input type="text" name="members" class="form-control" placeholder="How many members?"
                                   id="members">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="specialty" placeholder="Write the specialties"
                                      id="specialty"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="location" placeholder="Location" id="location"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Available:</label>
                            <select name="status" class="form-control" id="status">
                                <option value="">Select</option>
                                <option value="0">Available</option>
                                <option value="1">Unavailable</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="button_action" id="button_action" value="insert"/>
                        <input type="hidden" name="hidden_id" id="hidden_id"/>
                        <input type="submit" name="submit" id="action" value="Submit" class="btn btn-sm btn-info"/>
                        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form><!-- end of form -->
            </div><!-- end of modal content -->
        </div><!-- end of modal dialog -->
    </div><!-- end of modal -->

    <!-- Modal -->
    <div class="modal fade" id="CleanersDeletingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Delete confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to remove?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" id="deletingCleaners_" class="btn btn-danger btn-sm">Delete Cleaners</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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

        $(document).on('click', '#CleanersAdd', function() {
            $('#cleaners_form')[0].reset();
            $('.modal-title').text("New Cleaners");
            $('#action').val("Done");
            $('#button_action').val("Done");
            $("#CleanersModal").modal('show');

        });

        let CleanerID;
        $(document).on('click', '.CleanersDeleting', function () {
            CleanerID = $(this).attr('id');
            $('#deletingCleaners_').text('Delete');
            $("#CleanersDeletingModal").modal('show');
        });

        $(document).on('click', '.availableClass, .unavailableClass', function () {
            let id = $(this).attr('id');
            let status = $(this).attr('title');
            $.ajax({
                url: "/cleaners/availability/" + id + "/status/" + status,
                beforeSend: function () {
                    toastr.info('Request processing...');
                },
                success: function () {
                    $('#DataTableCleaners').DataTable().ajax.reload();
                }
            })
        });

        $(document).on('click', '#deletingCleaners_', function () {
            $.ajax({
                url: "/cleaners/deleting/" + CleanerID,
                beforeSend: function () {
                    $('#deletingCleaners_').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...');
                },
                success: function (data) {
                    $('#CleanersDeletingModal').modal('hide');
                    $('#DataTableCleaners').DataTable().ajax.reload();
                }
            });
        });

        $(document).on('click', '.CleanersShow', function () {
            let CleanersID = $(this).attr('id');
            $.ajax({
                url: "/cleaners/" + CleanersID + "/edit",
                dataType: "json",
                success: function (html) {
                    $('#company').val(html.data.company);
                    $('#owner').val(html.data.owner);
                    $('#email').val(html.data.email);
                    $('#members').val(html.data.members);
                    $('#specialty').val(html.data.specialty);
                    $('#PhoneNumber').val(html.data.phoneNumber);
                    $('#location').val(html.data.location);
                    $('#status').val(html.data.status);
                    $('#hidden_id').val(html.data.id);
                    $('.modal-title').text("Edit Cleaners");
                    $('#action').val("Update");
                    $('#button_action').val("Update");
                    $("#CleanersModal").modal('show');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });

        $(document).ready(function () {
            $('#DataTableCleaners').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('cleaners.get') }}",
                columns: [
                    {
                        data: 'company',
                        name: 'company',
                        render: (data) => '<span class="font-weight-bold">' + data + '</span>'
                    },
                    {
                        data: 'owner',
                        name: 'owner',
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
                        data: 'specialty',
                        name: 'specialty',
                        render: (data) => data.substring(0, 40) + '...'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: (data) => statusIn(data)
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

            function statusIn(status) {
                if (parseInt(status) === 1) {
                    return '<span class="p-1 text-white rounded small av-success">Available</span>'
                } else {
                    return '<span class="p-1 text-white rounded small av-danger">Unavailable</span>'
                }
            }

            $('#cleaners_form').on('submit', function (e) {
                e.preventDefault();
                let action_ = $('#button_action').val();

                if (action_ === "Done") {
                    $.ajax({
                        url: "{{ route('cleaners.store') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",

                        success: function (data) {
                            let html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger small">';
                                for (let count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }

                                html += '</div>';
                                $('#form_output').html(html);
                            }

                            if(data.success) {
                                $('#cleaners_form')[0].reset();
                                $('#DataTableCleaners').DataTable().ajax.reload();
                                $('#CleanersModal').modal('hide');
                            }

                        },
                        error: function (e) {
                            alert(e.message)
                        }
                    });
                }

                if (action_ === "Update") {
                    $.ajax({
                        url: "{{ route('cleaners.update') }}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",

                        success: function (data) {
                            let html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (let count = 0; count < data.errors.length; count++)
                                    html += '<p>' + data.errors[count] + '</p>';
                                html += '</div>';
                            }

                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#cleaners_form')[0].reset();
                                $('#DataTableCleaners').DataTable().ajax.reload();
                            }
                            $('#CleanersModal').modal('hide');
                        },
                        error: function (e) {
                            alert(e.message)
                        }
                    });
                }
            });
        });
    </script>
@endpush
