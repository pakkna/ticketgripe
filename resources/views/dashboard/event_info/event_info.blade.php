@section('EventList', 'mm-active')
@include('layouts.header')
@include('layouts.sidebar')
<!-- Dashboard Header  section -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                            <span class="d-inline-block pr-2">
                                <i class="lnr-apartment opacity-6"></i>
                            </span>
                            <span class="d-inline-block">All Event List</span>
                        </div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>Dashboards</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Filter Events
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" data-placement="left" class="btn btn-dark" title="" data-original-title="Show a Toastr Notification!">
                        <i class="fa fa-battery-three-quarters"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- table Section -->
        <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header">
            <div class="card-header-title fsize-5 text-capitalize font-weight-normal"></div>
        </div>
        @include("layouts.includes.flash")
        <div class="main-card mb-3 card">
            <div class="card-body">
                <table style="width: 100%;" id="process_data_table" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Event Start</th>
                            <th>Event End</th>
                            <th>Seat</th>
                            <th>Credit</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>
                                <center>Action</center>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<div class="modal fade bd-example-modal-lg" id="sms_send" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Send Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="title" class="">Guest Name</label>
                        <input name="name" id="name" placeholder="Name" type="text" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="title" class="">Mobile Number</label>
                        <input name="number" id="number" placeholder="Mobile number" value="" type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="Description" class="">Message</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display: flex;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" data-dismiss="modal" onclick="message_sent()" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="{!! asset('js/sweetalert.min.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table =
            $('#process_data_table').DataTable({
                processing: false,
                serverSide: true,
                paging: true,
                pageLength: 10,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                dom: 'l<"#date-filter"><"#category-filter"><"#action-filter">fBrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: '/event-list-dt',
                    type: 'POST',
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.user_id = "{{ Request::segment(2) }}";
                    }
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'title',
                        name: 'title',
                        searchable: true
                    },
                    {
                        data: 'start_date',
                        name: 'start_date',
                        searchable: false,
                        render: function(data, type, row) {
                            return moment(row.start_date).format("MMMM Do YYYY, h:mm:ss A");
                        }
                    },
                    {
                        data: 'end_date',
                        name: 'end_date',
                        searchable: false,
                        render: function(data, type, row) {
                            return moment(row.end_date).format("MMMM Do YYYY, h:mm:ss A");
                        }
                    },
                    {
                        data: 'seat_number',
                        name: 'seat_number',
                        searchable: true
                    },
                    {
                        data: 'sold_amount',
                        name: 'sold_amount',
                        searchable: true,
                        render: function(data, type, row) {
                            var num = Number(row.sold_amount);
                            return num.toFixed(2);
                        }
                    },
                    {
                        data: 'event_status',
                        name: 'event_status',
                        end_date: 'end_date',
                        searchable: true,
                        render: function(data, type, row) {
                            var compareTo = moment(row.end_date).unix(Number);
                            var CurrentDate = moment().unix(Number);
                            var isAfter = moment(CurrentDate).isAfter(compareTo);

                            if(data == "Cancel"){
                                    return '<div class="badge badge-pill badge-warning">Cancel</div>'
                            }else if (CurrentDate > compareTo || row.event_status != "Active") {
                                return '<div class="badge badge-pill badge-danger">Expired</div>'
                            }else {
                            return '<div class="badge badge-pill badge-success">Active</div>'
                            }
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false,
                        render: function(data, type, row) {
                            return moment(row.created_at).format("MMMM Do YYYY, h:mm:ss A");
                        }
                    },
                    {
                        data: 'id',
                        id: 'id',
                        searchable: false,
                        render: function(data, type, row) {
                            return "<a href='/single-event-info/" + row.id + "' class='btn-hover-shine btn-shadow btn btn-warning btn-sm' target='_blank'>Detils</a>";
                            /* if (row.status == 2) {
                                return "<a href='approve/" + row.id + "/approve' class='btn-shadow btn btn-info'>Approve</a><a href='approve/" + row.id + "/decline' class='btn-shadow btn btn-danger'>Decline</a>";
                                moment(dateString,"MMMM Do YYYY, h:mm a").toDate();
                            } else {
                                return '<center><i class="fa fa-remove m--font-danger"></i></center>';
                            } */
                        }
                    },
                ]
            });
        $("table").wrapAll("<div style='overflow-x:auto;width:100%' />");
        $('.dataTables_wrapper').addClass('row');
        // $('.dataTables_processing').addClass('m-loader m-loader--brand');
        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');
        $('#date-filter').addClass('col-lg-4 col-md-4 col-sm-4 adjust');
        $('#action-filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#category-filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#process_data_table_filter input').addClass('form-control form-control-sm');

        $('div.dt-buttons').css({
            "position": "absolute",
            "right": "0",
            "top": "-44px"
        });
        var action_filter_html = '<select class="form-control-sm form-control" id="event_status" data-select2-id="2" tabindex="-1" aria-hidden="true">' +
            '<option value="">Select Status</option>' +
            '<option value="Active">Active</option>' +
            '<option value="Cancel">Cancel</option>' +
            // '<option value="Expired">Expired</option>' +
            '</select>'; 
        $('#action-filter').append(action_filter_html);

        $('#event_status').on('change', function() {
            var event_status = $(this).val();
            if (event_status != "") {
                table.columns(6).search(event_status).draw();
            }
        });
        var date_picker_html = '<div id="date_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"> <i class="fa fa-calendar"> </i>&nbsp; <span> </span> <i class="fa fa-caret-down"></i></div>';
        $('#date-filter').append(date_picker_html);
        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();
            function cb(start, end) {
                $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                var range = start.format("YYYY-MM-DD") + "~" + end.format("YYYY-MM-DD");
                table.columns(3).search(range).draw();
                //alert(range);
            }
            $('#date_range').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function sms_pop_up(number, name) {
        $('#number').val(number);
        $('#name').val(name);
        $('#message').val('');
    }
    function message_sent() {
        var number = $('#number').val();
        var message = $('#message').val();
        $.ajax({
            url: 'message-send',
            type: 'post',
            data: {
                number: number,
                message: message,
            },
            dataType: 'json',
            success: function(response) {
                if (response) {
                    swal("Message Sent Successfully", {
                        icon: "success",
                    });
                } else {
                    swal("Message Send Error !", {
                        icon: "error",
                    });
                }
            }
        });
    }
</script>