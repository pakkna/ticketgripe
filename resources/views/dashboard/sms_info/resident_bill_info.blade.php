@section('resident-bill-info', 'mm-active')
@include('layouts.header')

@include('layouts.sidebar')



<!-- Dashboard Header  section -->



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

                            <span class="d-inline-block">All Resident Bill Info</span>

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

                                        Bill Information

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        <!-- Dashboard Row section -->

        <form id="user-bill-info" action="{{url('user-bill-info')}}" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input name="id" id="id" type="number" hidden>
        </form>


        <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header">
            <div class="card-header-title fsize-2 text-capitalize font-weight-normal">Target Section</div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">{{ date('F-Y', strtotime("first day of previous month"))}} Paid Amount</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-calculator"> </i></small>
                                            {{!empty ($totalp->paid) ? $totalp->paid : 0 }} TK

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">{{ date('F-Y', strtotime("first day of previous month"))}} due Amount</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4 text-danger">
                                            <small class="opacity-5 text-muted"><i class="fa fa-money"></i> </small>
                                            {{ ($totalc->cost-$totalp->paid)>0 ? round($totalc->cost-$totalp->paid,2) : 0  }} TK


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">{{ date('F-Y', strtotime("first day of previous month"))}} Unpaid Residents </h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-calculator"> </i></small>
                                            {{$total_unpaid}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                                            
        </div>
        <!-- table Section -->

        <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header">

            <div class="card-header-title fsize-5 text-capitalize font-weight-normal">All Residents Last Month Details</div>

        </div>


        @include("layouts.includes.flash")

        <div class="main-card mb-3 card">

            <div class="card-body">

                <table style="width: 100%; text-align:center;" id="process_data_table" class="table table-hover table-striped table-bordered">
                    <thead>

                        <tr>

                            <th>Id</th>

                            <th>Resident Name</th>

                            <th>Resident Category</th>

                            <th>Manager No</th>

                            <th>Zone</th>

                            <th>Total SMS</th>

                            <th>SMS Cost</th>

                            <th>Total Cost</th>

                            <th>Month</th>

                            <th>Status</th>

                            <th>Due</th>

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

                order: [
                    [0, 'desc']
                ],

                autoWidth: false,

                dom: 'l<"#date-filter"><"#action-filter"><"#zone-filter"><"#status-filter">frtip',

                ajax: {

                    url: 'resident-bill-filter',

                    type: 'POST',

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

                        data: 'resident_name',

                        name: 'users.resident_name',

                        searchable: true

                    },
                    {

                        data: 'resident_category',

                        name: 'users.resident_category',

                        searchable: true

                    },
                    {

                        data: 'manager_cell',

                        name: 'users.manager_cell',

                        searchable: true

                    },
                    {

                        data: 'zone',

                        name: 'users.zone',

                        searchable: true

                    },
                    {

                        data: 'sms_total_sent',

                        name: 'sms_total_sent',

                        searchable: true

                    },
                    {

                        data: 'sms_cost_amount',

                        name: 'sms_cost_amount',

                        searchable: true,

                        render: function(data, type, row) {

                            return row.sms_cost_amount + ' TK';
                        }


                    },
                    {

                        data: 'total_cost',

                        name: 'total_cost',

                        searchable: true,

                        render: function(data, type, row) {

                            return row.total_cost + ' TK';
                        }

                    },
                    {

                        data: 'bill_month',

                        name: 'bill_month',

                        searchable: true,

                        render: function(data, type, row) {

                            return moment(row.bill_month).format("MMMM YYYY");
                        }

                    },
                    {

                        data: 'status',

                        name: 'status',

                        searchable: false,

                        render: function(data, type, row) {
                            if (data == 0) {
                                return '<div class="badge badge-pill badge-warning">Unpaid</div>'
                            } else {
                                return '<div class="badge badge-pill badge-success">paid</div>'
                            }

                        }

                    },
                    {

                        data: 'status',

                        name: 'status',

                        total_cost: 'total_cost',

                        searchable: true,

                        render: function(data, type, row) {

                            if (row.status != 0) {
                                return '0 TK';
                            } else {
                                return row.total_cost + ' TK';
                            }
                        }

                    },
                    {

                        data: 'id',

                        id: 'id',

                        status: 'status',

                        searchable: false,

                        render: function(data, type, row) {

                            return '<a href="javascript:void(0)"' +
                                'onclick="send_id(' + row.id + ')" class="btn-shadow btn btn-alternate btn-sm">Previous Details</a>';

                        }

                    }

                ]

            });

        $("table").wrapAll("<div style='overflow-x:auto;width:100%' />");

        $('.dataTables_wrapper').addClass('row');

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');


        $('#date-filter').addClass('col-lg-4 col-md-4 col-sm-4 adjust');

        $('#zone-filter').addClass('col-lg-1 col-md-2 col-sm-2');

        $('#action-filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#status-filter').addClass('col-lg-1 col-md-1 col-sm-2');

        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter input').addClass('form-control form-control-sm');

        var zone_filter_html = '<select class="form-control-sm form-control" id="resident_zone">' +

            '<option value="nai">Zone</option>' +
            '<option value="A">A</option>' +
            '<option value="B">B</option>' +
            '<option value="C">C</option>' +
            '<option value="D">D</option>' +
            '<option value="E">E</option>' +

            '</select>';

        $('#zone-filter').append(zone_filter_html);

        var status_filter_html = '<select class="form-control-sm form-control" id="resident_status">' +

            '<option value="">Status</option>' +
            '<option value="1">Paid</option>' +
            '<option value="0">Unpaid</option>' +

            '</select>';

        $('#status-filter').css("padding", "0");
        $('#status-filter').append(status_filter_html);


        var action_filter_html = '<select class="form-control-sm form-control" id="resident_category" data-select2-id="2" tabindex="-1" aria-hidden="true">' +

            '<option value="">Select Category</option>' +
            '<option value="Hotel">Hotel</option>' +
            '<option value="Motel">Motel</option>' +
            '<option value="Resort">Resort</option>' +
            '<option value="Guest House">Guest House</option>' +
            '<option value="Cottage">Cottage</option>' +
            '<option value="Others">Others</option>' +

            '</select>';

        $('#action-filter').append(action_filter_html);

        $('#resident_zone').on('change', function() {

            var resident_zone = $(this).val();
            if (resident_zone != "") {
                table.columns(4).search(resident_zone).draw();
            }
        })

        $('#resident_category').on('change', function() {

            var resident_category = $(this).val();
            if (resident_category != "") {
                table.columns(2).search(resident_category).draw();
            }
        });

        $('#resident_status').on('change', function() {

            var resident_status = $(this).val();
            if (resident_status != "") {
                table.columns(9).search(resident_status).draw();
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

                table.columns(8).search(range).draw();

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
    function send_id(id) {

        $('#id').attr('value', id);

        document.getElementById("userform").submit();
    }
</script>