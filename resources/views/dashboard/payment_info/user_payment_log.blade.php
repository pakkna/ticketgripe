@section('user-payment-log', 'mm-active')
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

                            <span class="d-inline-block">Resident Payment Log</span>

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

                                        Monthly Payment Log

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        <!-- Dashboard Row section -->

        <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header">
            <div class="card-header-title fsize-2 text-capitalize font-weight-normal">Target Section</div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Pending payments </h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-calculator"> </i></small>
                                            <?php
                                            $time = strtotime(-$pending_month . 'months');

                                            $interval = date_diff(date_create(date("Y-m-d")), date_create(date("Y-m-d", $time)));

                                            if ($interval->y != 0 && $interval->m != 0) {

                                                echo $interval->y . ' years ' . $interval->m . ' months';
                                            } else if ($interval->y != 0 && $interval->m == 0) {

                                                echo $interval->y . ' years';
                                            } else {
                                                echo $interval->m . ' months';
                                            }


                                            ?>
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
                            <h6 class="widget-subheading">Total Cost Amount</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-calculator"> </i></small>
                                            {{round($total_cost, 2)}} TK

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
                            <h6 class="widget-subheading">Total Due Amount</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4 text-danger">
                                            <small class="opacity-5 text-muted"><i class="fa fa-money"></i> </small>
                                            {{ ($total_cost-$total_paid)>0 ? round($total_cost-$total_paid,2) : 0  }} TK


                                            <!--      {{round($total_cost-$total_paid, 2)}} -->
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

            <div class="card-header-title fsize-5 text-capitalize font-weight-normal">All Month Details</div>

        </div>


        @include("layouts.includes.flash")

        <div class="main-card mb-3 card">

            <div class="card-body">

                <table style="width: 100%; text-align:center;" id="process_data_table" class="table table-hover table-striped table-bordered">
                    <thead>

                        <tr>

                            <th>Id</th>

                            <th>Card Type</th>

                            <th>Transaction ID</th>

                            <th>Card Brand</th>

                            <th>Amount</th>

                            <th>Bill Month</th>

                            <th>Status</th>

                            <th>Payment Date</th>

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

                autoWidth: false,

                dom: 'l<"#date-filter">frtip',

                ajax: {

                    url: 'ajax-user-payment-log',

                    type: 'POST',

                    data: function(d) {

                        d._token = "{{  csrf_token() }}";

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

                        data: 'card_type',

                        name: 'card_type',

                        searchable: true

                    },
                    {

                        data: 'tran_id',

                        name: 'tran_id',

                        searchable: true


                    },
                    {

                        data: 'card_brand',

                        name: 'card_brand',

                        searchable: true

                    },
                    {

                        data: 'amount',

                        name: 'amount',

                        searchable: true,

                        render: function(data, type, row) {

                            return row.amount + ' TK';
                        }

                    },

                    {

                        data: 'month',

                        name: 'month',

                        searchable: true,

                        render: function(data, type, row) {

                            return moment(row.month).format("MMMM YYYY");
                        }

                    },
                    {

                        data: 'status',

                        name: 'status',

                        searchable: false,

                        render: function(data, type, row) {

                            return '<div class="badge badge-pill badge-success">Paid</div>'

                        }

                    },
                    {

                        data: 'tran_date',

                        name: 'tran_date',

                        searchable: true,

                        render: function(data, type, row) {

                            return moment(row.tran_date).format("MMMM Do YYYY, h:mm:ss A");
                        }

                    }


                ]

            });


        $("table").wrapAll("<div style='overflow-x:auto;width:100%' />");

        $('.dataTables_wrapper').addClass('row');

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');


        $('#date-filter').addClass('offset-2 col-lg-4 col-md-4 col-sm-4');

        $('#process_data_table_filter').addClass('offset-1 col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter input').addClass('form-control form-control-sm');


        var date_picker_html = '<div id="date_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"> <i class="fa fa-calendar"> </i>&nbsp; <span> </span> <i class="fa fa-caret-down"></i></div>';

        $('#date-filter').append(date_picker_html);

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {

                $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                var range = start.format("YYYY-MM-DD") + "~" + end.format("YYYY-MM-DD");

                table.columns(7).search(range).draw();

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