@section('ResidentList', 'mm-active')
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

                            <span class="d-inline-block">All Resident List</span>

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

                                        Filter Resident List

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

                            <th>Resident Name</th>

                            <th>Zone</th>

                            <th>Category</th>

                            <th>Manager No</th>

                            <th>SMS Rate</th>

                            <th>Monthly Rate</th>

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

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>


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

                dom: 'l<"#date-filter"><"#action-filter"><"#zone-filter"><"#status-filter">fBrtip',

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],

                ajax: {

                    url: 'resident_filter_data',

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

                        name: 'resident_name',

                        searchable: true

                    },
                    {

                        data: 'zone',

                        name: 'zone',

                        searchable: true,

                    },
                    {

                        data: 'resident_category',

                        name: 'resident_category',

                        searchable: true

                    },
                    {

                        data: 'manager_cell',

                        name: 'manager_cell',

                        searchable: true

                    },
                    {

                        data: 'sms_rate',

                        name: 'sms_rate',

                        searchable: true,
                        render: function(data, type, row) {

                            return '<div class="badge badge-pill badge-info">' + row.sms_rate + ' BDT</div>'
                        }

                    },
                    {

                        data: 'monthly_rate',

                        name: 'monthly_rate',

                        searchable: true,

                        render: function(data, type, row) {

                            return '<div class="badge badge-pill badge-primary">' + row.monthly_rate + ' BDT</div>'
                        }

                    },
                    {

                        data: 'status',

                        name: 'status',

                        searchable: true,

                        render: function(data, type, row) {

                            if (row.status == 0) {
                                return '<input type="text" value="" hidden><div class="badge badge-pill badge-danger">Inactive</div>'

                            } else {
                                return '<div class="badge badge-pill badge-success">Active</div>'
                            }
                        }

                    },
                    {

                        data: 'created_at',

                        name: 'created_at',

                        searchable: false,

                        render: function(data, type, row) {

                            return moment(row.created_at).format("MMMM Do YYYY");
                        }

                    },
                    {

                        data: 'id',

                        id: 'id',

                        status: 'status',

                        searchable: false,

                        render: function(data, type, row) {

                            if (row.status == 1) {

                                return "<a href='update-resident-status/" + row.id + "/" + row.status + "' class='btn-hover-shine btn btn-shadow btn-alternate btn-sm'>Inactive</a> | <a href='view-resident/" + row.id + "' class='btn-hover-shine btn-shadow btn btn-warning btn-sm'>View</a> | <a href='update-resident-status/" + row.id + "/" + row.id + "' class='btn-hover-shine btn btn-shadow btn-danger btn-sm'>Delete</a>";

                            } else {

                                return "<a href='update-resident-status/" + row.id + "/" + row.status + "' class='btn-hover-shine btn-shadow btn btn-success btn-sm'>Active</a> | <a href='view-resident/" + row.id + "' class='btn-hover-shine btn-shadow btn btn-warning btn-sm'>View</a> | <a href='update-resident-status/" + row.id + "/" + row.id + "' class='btn-hover-shine btn btn-shadow btn-danger btn-sm'>Delete</a>";

                            }

                            /* return "<a href='view-resident/" + row.id + "' class='btn-hover-shine btn-hover-shinebtn-shadow btn btn-warning btn-sm'>View</a> | <a href='update-resident-status/" + row.id + "/" + row.id + "' class='btn-hover-shine btn btn-shadow btn-danger btn-sm'>Delete</a>";
                             */
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
        $('#zone-filter').addClass('col-lg-1 col-md-2 col-sm-2');
        $('#status-filter').addClass('col-lg-1 col-md-1 col-sm-2');

        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');



        $('#process_data_table_filter input').addClass('form-control form-control-sm');

        var category_filter_html = '<select class="form-control-sm form-control" id="resident_zone">' +

            '<option value="nai">Zone</option>' +
            '<option value="A">A</option>' +
            '<option value="B">B</option>' +
            '<option value="C">C</option>' +
            '<option value="D">D</option>' +
            '<option value="E">E</option>' +

            '</select>';

        $('#zone-filter').append(category_filter_html);

        var status_filter_html = '<select class="form-control-sm form-control" id="resident_status">' +

            '<option value="">Status</option>' +
            '<option value="1">Active</option>' +
            '<option value="0">Inactive</option>' +

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

        $('div.dt-buttons').css({
            "position": "absolute",
            "right": "0",
            "top": "-44px"
        });

        $('#resident_zone').on('change', function() {

            var resident_zone = $(this).val();
            if (resident_zone != "") {
                table.columns(2).search(resident_zone).draw();
            }
        })

        $('#resident_category').on('change', function() {

            var resident_category = $(this).val();
            if (resident_category != "") {
                table.columns(3).search(resident_category).draw();
            }
        });

        $('#resident_status').on('change', function() {

            var resident_status = $(this).val();
            if (resident_status != "") {
                table.columns(7).search(resident_status).draw();
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