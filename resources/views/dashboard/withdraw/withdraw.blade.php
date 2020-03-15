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

                            <span class="d-inline-block">Manage Your Withdraw Requests </span>

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

                                        Withdraw Information

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

            <div class="card-header-title fsize-5 text-capitalize font-weight-normal">All withdraw Details</div>

        </div>



        @include("layouts.includes.flash")

        <div class="main-card mb-3 card">

            <div class="card-body">

                <table style="width: 100%;" id="process_data_table" class="table table-hover table-striped table-bordered text-center">

                    <thead>

                        <tr>

                            <th>SL</th>

                            <th>User Id</th>

                            <th>Withdraw Type</th>

                            <th>Bank Name</th>

                            <th>Account Name</th>

                            <th>Account No.</th>

                            <th>Withdraw Amount</th>

                            <th>Previous Amount</th>

                            <th>Status</th>

                            <th>
                                <center>Request At</center>
                            </th>

                            <th>Withdraw Date</th>

                            <th> Action </th>

                        </tr>

                    </thead>

                    <tbody class="tbody-padd">

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@include('layouts.footer')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('#process_data_table').DataTable({

            processing: false,

            serverSide: true,

            paging: true,

            pageLength: 25,

            lengthChange: true,

            searching: true,

            ordering: true,

            info: true,

            autoWidth: false,
            // "sScrollX": "100%",
            // "sScrollXInner": "110%",
            // "bScrollCollapse": true,

            dom: 'l<"#date-filter"><"#action-filter">frtip',

            ajax: {

                url: 'withdraw_list_datatable',

                type: 'post',

                data: function(d) {

                    d._token = "{{ csrf_token() }}";

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

                    data: 'user_id',

                    name: 'user_id',

                    searchable: true,

                },
                {

                    data: 'payment_type',

                    name: 'payment_type',

                    searchable: true,

                },
                {

                    data: 'bank_name',

                    name: 'bank_name',

                    searchable: true,

                    render: function(data, type, row) {

                        if (row.bank_name == null) {

                            return "----";

                        } else {

                            return row.bank_name;

                        }
                    }

                },
                {

                    data: 'account_name',

                    name: 'account_name',

                    searchable: true

                },
                {

                    data: 'account_number',

                    name: 'account_number',

                    searchable: true

                },
                {

                    data: 'withdraw_amount',

                    name: 'withdraw_amount',

                    searchable: true

                },
                {

                    data: 'previous_amount',

                    name: 'previous_amount',

                    searchable: true,
                    render: function(data, type, row) {

                        if (row.previous_amount == null) {

                            return "----";

                        } else {

                            return row.previous_amount;

                        }
                    }

                },
                {

                    data: 'status',

                    name: 'status',

                    searchable: true,
                    render: function(data, type, row) {

                        if (row.status == 0) {

                            return "<div class ='badge badge-pill badge-info'> Pending </div>";

                        } else if (row.status == 1) {

                            return "<div class ='badge badge-pill badge-success'> Success </div>";
                        } else {
                            return "<div class ='badge badge-pill badge-danger'> Cancelled </div>";
                        }
                    }

                },
                {

                    data: 'created_at',

                    name: 'created_at',

                    searchable: false

                },
                {

                    data: 'withdraw_at',

                    name: 'withdraw_at',

                    searchable: false,
                    render: function(data, type, row) {

                        if (row.withdraw_at == null) {

                            return "----";

                        } else {

                            return row.withdraw_at;

                        }
                    }

                },
                {

                    data: 'status',

                    name: 'status',

                    user_id: 'user_id ',

                    withdraw_amount: 'withdraw_amount',

                    searchable: false,
                    render: function(data, type, row) {

                        if (row.status == 0) {

                            return "<a href='withdraw/" + row.user_id + "/" + row.id + "/" + row.withdraw_amount + "' class='btn-shadow btn btn-warning btn-sm'>Approve</a><a href='withdraw/" + row.id + "/decline' class='btn-shadow btn btn-danger btn-sm'>Decline</a>";

                        } else {

                            return "<a href='javascript:void(0)' class='btn-shadow btn btn-warning btn-sm  disabled'>Approve</a><a href='javascript:void(0)' class='btn-shadow btn btn-danger btn-sm  disabled'>Decline</a>";
                        }
                    }
                },

            ],


        });

        $("table").wrapAll("<div style='overflow-x:auto;width:100%' />");
        $('table.table-bordered.dataTable td').css('padding', '5px 0px');

        $('.dataTables_wrapper').addClass('row');

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');



        $('#date-filter').addClass('col-lg-4 col-md-4 col-sm-4');

        $('#action-filter').addClass('col-lg-3 col-md-3 col-sm-3');

        $('#process_data_table_filter').addClass('col-lg-3 col-md-3 col-sm-3');



        $('#process_data_table_filter input').addClass('form-control form-control-sm');

        var action_filter_html = '<select class="form-control-sm form-control" id="method" data-select2-id="1" tabindex="-1" aria-hidden="true">' +

            '<option value="null" data-select2-id="3">Select Status</option>' +

            '<option value="0" data-select2-id="3">Pending</option>' +

            '<option value="2" data-select2-id="3">Declined</option>' +

            '<option value="1" data-select2-id="3">Success</option>' +

            '</select>';

        $('#action-filter').append(action_filter_html);

        $('#method').on('change', function() {

            var method = $(this).val();
            if (method != "") {
                table.columns(8).search(method).draw();
            }
        })
        //$('.table.dataTable thead > tr > th.sorting').css('padding-right', '0px');
        //$('.table th').css('padding', '0rem');

        var date_picker_html = '<div id="date_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"> <i class="fa fa-calendar"> </i>&nbsp; <span> </span> <i class="fa fa-caret-down"></i></div>';

        $('#date-filter').append(date_picker_html);

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {

                $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                var range = start.format("YYYY-MM-DD") + "~" + end.format("YYYY-MM-DD");

                table.columns(9).search(range).draw();

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
</script>
<script>
    $('table.table-bordered.dataTable td').addClass('padding-zero');
</script>