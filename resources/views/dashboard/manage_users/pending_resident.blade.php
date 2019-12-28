@section('pending-resident-list', 'mm-active')
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

                            <span class="d-inline-block">Pending Resident List</span>

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

                                        Filter Pending Resident List

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

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->


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

                dom: 'l<"#date-filter"><"#action-filter"><"#zone-filter">frtip',

                ajax: {

                    url: 'pending_resident_data',

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

                            return '<div class="badge badge-pill badge-warning">Pending</div>'

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

                        status: 'status',

                        searchable: false,

                        render: function(data, type, row) {

                            // return "<a href='view-resident/" + row.id + "' class='btn-shadow btn btn-warning btn-sm'>View</a>";

                            if (row.status == 1) {

                                return "<a href='view-resident/" + row.id + "' class='btn-shadow btn btn-warning btn-sm'>View</a> | <a href='update-resident-status/" + row.id + "/" + row.status + "' class='btn-shadow btn btn-danger btn-sm'>Inactive</a>";

                            } else {

                                return "<a href='view-resident/" + row.id + "' class='btn-shadow btn btn-warning btn-sm'>View</a> | <a href='update-resident-status/" + row.id + "/" + row.status + "' class='btn-shadow btn btn-success btn-sm'>Active</a>";

                            }

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

        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');



        $('#process_data_table_filter input').addClass('form-control form-control-sm');

        var category_filter_html = '<select class="form-control-sm form-control" id="resident_zone">' +

            '<option value="">Zone</option>' +
            '<option value="A">A</option>' +
            '<option value="B">B</option>' +
            '<option value="B">B</option>' +
            '<option value="C">C</option>' +
            '<option value="D">D</option>' +
            '<option value="E">E</option>' +

            '</select>';

        $('#zone-filter').append(category_filter_html);


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
                table.columns(2).search(resident_zone).draw();
            }
        })

        $('#resident_category').on('change', function() {

            var resident_category = $(this).val();
            if (resident_category != "") {
                table.columns(3).search(resident_category).draw();
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