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

        .alert {
            padding: 0.75rem 1.25rem 0.15rem 1.25rem !important;
        }

        .fas.fa-circle-notch.mr-3.important {
            color: #FD397A !important;
        }

        .fas.fa-circle-notch.mr-3.promotions {
            color: #1dc9b7 !important;
        }

        .fas.fa-circle-notch.mr-3.social, .fas.fa-star, .far.fa-star {
            color: #FFB822 !important;
        }

        .BtnInbox_ .fas.fa-inbox,
        .BtnImportant_ .fas.fa-star,
        .BtnDraft_ .fas.fa-file,
        .BtnPromotions_ .fas.fa-ad,
        .BtnSocial_ .fas.fa-share-alt,
        .BtnMark_ .far.fa-bookmark,
        .BtnTrash .fas.fa-trash {
            color: #595d6e !important;
        }

        thead {
            visibility: hidden;
            display: none;
        }

        tbody tr td:nth-child(2), tbody tr td:nth-child(3) {
            font-weight: bold;
        }

        /*    toast toast-success*/
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
                    <li class="breadcrumb-item"><a href="{{ route('messages.index') }}">Messages</a></li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <div class="row">

                    <div class="col-2">

                        <a href="javascript:void(0)" id="BtnCompose"
                           class="btn btn-danger text-white btn-block btn-sm shadow-sm font-color font-weight-bold p-2 mb-3">Compose</a>

                        <div class="list-group small">

                            <div class="list-group-item font-weight-bold">
                                Folders
                            </div>

                            <a href="javascript:void(0)" class="list-group-item list-group-item-action" id="BtnInbox"><i
                                    class="fas fa-inbox mr-3"></i>
                                Inbox</a>

                            <a href="javascript:void(0)" id="BtnSent" class="list-group-item list-group-item-action"><i
                                    class="far fa-paper-plane mr-3"></i> Sent</a>

                            <a href="javascript:void(0)" id="BtnDraft" class="list-group-item list-group-item-action"><i
                                    class="far fa-file-alt mr-3"></i> Draft</a>

                        </div>
                        <br>
                        <div class="list-group small">
                            <div class="list-group-item font-weight-bold">
                                Label
                            </div>
                            <a href="javascript:void(0)" id="BtnImportant"
                               class="list-group-item list-group-item-action"><i
                                    class="fas fa-circle-notch mr-3 important"></i> Important</a>
                            <a href="javascript:void(0)" id="BtnPromotions"
                               class="list-group-item list-group-item-action"><i
                                    class="fas fa-circle-notch mr-3 promotions"></i> Promotions</a>
                            <a href="javascript:void(0)" id="BtnSocial"
                               class="list-group-item list-group-item-action"><i
                                    class="fas fa-circle-notch mr-3 social"></i> Social</a>
                        </div>
                    </div>

                    <div class="col-10">
                        <!-- DataTables for booking information-->
                        <div class="card mb-3 border-0 shadow">
                            <div class="card-header bg-transparent border-bottom-0">
                                <i class="fas fa-table"></i>
                                <span id="status">Inbox</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped small" id="DataTableMessages"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                    </table><!-- end of table -->
                                </div><!-- end of table responsive -->
                            </div><!-- end of card body -->
                        </div><!-- end of card -->
                    </div>
                </div>

            </div> <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts._footer')
        </div><!-- end of class content wrapper -->
    </div><!-- end of id content wrapper -->

    <div id="SendingMessageModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="message_form">
                    <div class="modal-header">
                        <h5 class="modal-title">Compose New Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div id="form_output"></div>

                        <div class="form-group">
                            <input type="text" name="to" class="form-control" placeholder="To:"
                                   id="to">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject:" id="subject">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Leave your message here..."
                                      id="message"
                                      rows="5"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="button" name="submit" id="BtnDraft__" class="btn btn-sm btn-dark"><i
                                        class="far fa-file-alt"></i> Draft
                                </button>
                            </div>
                            <div>
                                <button type="submit" name="submit" id="BtnAction" class="btn btn-sm btn-info">Send
                                </button>
                                <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Discard</button>
                            </div>
                        </div>
                    </div>
                </form><!-- end of form -->
            </div><!-- end of modal content -->
        </div><!-- end of modal dialog -->
    </div><!-- end of modal -->

    <!-- Modal -->
    <div class="modal fade" id="MessageDeletingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <input type="hidden" id="MessageID" value="0" name="ID">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="deletingMessage_" class="btn btn-danger btn-sm">Delete Cleaners</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ShowMessageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>From:</b> <span id="email_"></span></p>
                    <p><b>Name:</b> <span id="name_"></span></p>
                    <p><b>Subject:</b> <span id="subject_"></span></p>
                    <p id="message_"></p>
                    <br>
                    <p>Date sent: <span id="date_"></span></p>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary BtnReply btn-sm pull-right">Reply</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
            integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "500",
            "timeOut": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        $(document).on('click', '.BtnOpen_', function (e) {
            let id_ = $(this).attr('id');
            $.ajax({
                url: "/message/show/" + id_,
                dataType: "json",
                success: function (html) {
                    $('#email_').text(html.data.email);
                    $('#name_').text(html.data.name);
                    $('#subject_').text(html.data.subject);
                    $('#message_').text(html.data.message);
                    $('#date_').text(moment(html.data.created_at).format('LL') +  ' - ' + moment(html.data.created_at).fromNow());
                    $("#ShowMessageModal").modal('show');
                },
                error: function (e) {
                    alert(e.message);
                }
            });
        });

        $(document).on('click', '.BtnReply', function(e) {
            e.preventDefault();
            let email_ = $("#email_").text();
            let subject_ = $("#subject_").text();

            $("#ShowMessageModal").modal('hide');
            $('.modal-title').text("Reply a Message");
            $("#to").val(email_);
            $("#subject").val(subject_);
            $('#button_action').val("Send");
            $('#BtnAction').text("Send");
            $("#SendingMessageModal").modal('show');

        });

        $(document).ready(function () {

            let status = 0;
            let value_ = 0;
            getMessage(status);

            $(document).on('click', '#BtnInbox', function () {
                status = 0;
                $('#status').text('Inbox');
                getMessage(status);
            });

            $(document).on('click', '#BtnSent', function () {
                status = 1;
                $('#status').text('Sent');
                getMessage(status);
            });

            $(document).on('click', '#BtnDraft', function () {
                status = 2;
                $('#status').text('Draft');
                getMessage(status);
            });

            $(document).on('click', '#BtnTrash', function () {
                status = 3;
                $('#status').text('Trash');
                getMessage(status);
            });

            $(document).on('click', '#BtnImportant', function () {
                value_ = 0;
                getMessageLabel(value_);
            });

            $(document).on('click', '#BtnDraft__', function (e) {
                e.preventDefault();
                let to_ = $('#to').val();
                let subject_ = $('#subject').val();
                let message_ = $('#message').val() ? $('#message').val() :  'No text';

                $.ajax({
                    url: "/messages/draft/" + to_ + '/' + subject_ + '/' + message_,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                        $('#BtnDraft__').html('<span class="spinner-border spinner-border-sm disabled" role="status" aria-hidden="true"></span> Drafting...');
                    },
                    success: function (data) {
                        $('#message_form')[0].reset();
                        $('#DataTableMessages').DataTable().ajax.reload();
                        $('#SendingMessageModal').modal('hide');
                        $('#BtnDraft__').html('<i class="far fa-file-alt"></i> Draft')
                    },
                    error: function (e) {
                        alert(e.message)
                    }
                });
            });

            $(document).on('click', '#BtnPromotions', function () {
                value_ = 1;
                getMessageLabel(value_);
            });

            $(document).on('click', '#BtnSocial', function () {
                value_ = 2;
                getMessageLabel(value_);
            });

            let label_ = 0;

            $(document).on('click', '.BtnDraft_, .BtnInbox_', function () {
                let id_ = $(this).attr('id');
                let title_ = $(this).attr('title');
                let status_;
                if (title_ === 'inbox') {
                    status_ = 0;
                }
                if (title_ === 'draft') {
                    status_ = 2;
                }
                $.ajax({
                    url: "/messages/status_/" + id_ + '/' + status_,
                    beforeSend: function () {
                        toastr.info('Request processing...');
                    },
                    success: function (data) {
                        toastr.success('Request success');
                        messageID_ = 0;
                        if (status_ === 2) {
                            status = 2;
                            getMessage(status);
                        } else {
                            status = 0;
                            getMessage(status);
                        }

                    }
                });
            });


            $(document).on('click', '.BtnImportant_, .BtnPromotions_, .BtnSocial_', function () {
                let id_ = $(this).attr('id');
                let title_ = $(this).attr('title');

                if (title_ === 'important') {
                    label_ = 0;
                }

                if (title_ === 'promotions') {
                    label_ = 1;
                }

                if (title_ === 'social') {
                    label_ = 2;
                }

                $.ajax({
                    url: "/messages/label_/" + label_ + '/' + id_,
                    beforeSend: function () {
                        toastr.info('Done Mark as ' + title_);
                    },
                    success: function (data) {
                        messageID_ = 0;
                        getMessage();
                    }
                });
            });

            $(document).on('click', '#BtnCompose', function () {
                $('#message_form')[0].reset();
                $('.modal-title').text("Compose New Message");
                $('#button_action').val("Send");
                $('#BtnDraft__').val("Draft");
                $("#SendingMessageModal").modal('show');
            });

            let messageID_ = 0;

            $(document).on('click', '.BtnTrash', function () {
                messageID_ = $(this).attr('id');
                $('#MessageID').val(messageID_);
                $('#deletingMessage_').text('Delete');
                $("#MessageDeletingModal").modal('show');
            });

            $(document).on('click', '#deletingMessage_', function () {
                $.ajax({
                    url: "/messages/deleting/" + messageID_,
                    beforeSend: function () {
                        $('#deletingMessage_').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...');
                    },
                    success: function (data) {
                        messageID_ = 0;
                        getMessage(status);
                        $("#MessageDeletingModal").modal('hide');

                    }
                });
            });

            function getMessage(status) {
                $('#DataTableMessages').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    ajax: "/messages/all/" + status,
                    columnDefs: [{
                        targets: [0],
                        searchable: false
                    }],
                    columns: [
                        {
                            data: {
                                label: 'label',
                                status: 'status'
                            },
                            name: {
                                label: 'label',
                                status: 'status'
                            },
                            render: function (data) {
                                if (parseInt(data['label']) === 0) {
                                    return `<a href="javascript:void(0)" title="Click to mark as unimportant"><i class="fas fa-star"></i></a>`;
                                }
                                return `<a href="javascript:void(0)" title="Click to mark as unimportant"><i class="far fa-star"></i></a>`;
                            },
                            orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'subject',
                            name: 'subject',
                            render: (data) => data.substring(0, 30) + '...'
                        },
                        {
                            data: 'message',
                            name: 'message',
                            render: (data) => data.substring(0, 30) + '...'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: (data) => moment(data).fromNow()
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
                    ]
                });
            }

            function getMessageLabel(value_) {
                $('#DataTableMessages').DataTable({
                    destroy: true,
                    processing: true,
                    serverSide: true,
                    ajax: "/messages/label/" + value_,
                    columnDefs: [
                        {
                            targets: [0],
                            searchable: false
                        }
                    ],
                    columns: [
                        {
                            data: {
                                label: 'label',
                                status: 'status'
                            },
                            name: {
                                label: 'label',
                                status: 'status'
                            },
                            render: function (data) {
                                if (parseInt(data['label']) === 0) {
                                    return `<a href="javascript:void(0)" title="Click to mark as unimportant"><i class="fas fa-star"></i></a>`;
                                }
                                return `<a href="javascript:void(0)" title="Click to mark as unimportant"><i class="far fa-star"></i></a>`;
                            },
                            orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'subject',
                            name: 'subject',
                            render: (data) => data.substring(0, 30) + '...'
                        },
                        {
                            data: 'message',
                            name: 'message',
                            render: (data) => data.substring(0, 30) + '...'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: (data) => moment(data, 'YYYYMMDD').fromNow()
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
                    ]
                });
            }

            $('#message_form').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('messages.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                        $('#BtnAction').html('<span class="spinner-border spinner-border-sm disabled" role="status" aria-hidden="true"></span> Sending...');
                    },
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger small">';
                            for (let count = 0; count < data.errors.length; count++)
                                html += '<p>' + data.errors[count] + '</p>';
                            html += '</div>';
                            $('#form_output').html(html);
                            $('#BtnAction').text('Send');
                        }

                        if (data.success) {
                            $('#message_form')[0].reset();
                            $('#DataTableMessages').DataTable().ajax.reload();
                            $('#SendingMessageModal').modal('hide');
                        }

                    },
                    error: function (e) {
                        alert(e.message)
                    }
                });
            });
        });
    </script>
@endpush
