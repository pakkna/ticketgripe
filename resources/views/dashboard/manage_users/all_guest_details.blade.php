@section('all-guest-details', 'mm-active')
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

                            <span class="d-inline-block">All Guest Register Book</span>

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

                                        Filter All Guest List

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

                <div class="page-title-actions">

                    <!-- <button type="button" data-toggle="tooltip" data-placement="left" class="btn btn-dark" title="" data-original-title="Show a Toastr Notification!">

                        <i class="fa fa-battery-three-quarters"></i>

                    </button> -->

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

                            <th>Entry ID</th>

                            <th>Name</th>

                            <th>Guest Type</th>

                            <th>Category</th>

                            <th>Contact</th>

                            <th>Zone</th>

                            <th>Update</th>

                            <th>Check In</th>

                            <th>Check Out</th>

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

                dom: 'l<"#date-filter"><"#category-filter"><"#action-filter"><"#zone-filter">fBrtip ',

                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],

                ajax: {

                    url: 'all_guest_filter_data',

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

                        data: 'group_key',

                        name: 'guest_info.group_key',

                        searchable: true

                    },
                    {

                        data: 'name',

                        name: 'guest_info.name',

                        searchable: true,

                    },
                    {

                        data: 'guest_type',

                        name: 'guest_info.guest_type',

                        searchable: true

                    },
                    {

                        data: 'guest_category',

                        name: 'guest_info.guest_category',

                        searchable: true

                    },

                    {

                        data: 'contact_no',

                        name: 'guest_info.contact_no',

                        searchable: true

                    },
                    {

                        data: 'zone',

                        name: 'users.zone',

                        searchable: true

                    },
                    {

                        data: 'is_update',

                        name: 'is_update',

                        id: 'id',


                        searchable: false,
                        render: function(data, type, row) {

                            if (row.is_update == 0) {

                                return '<div class="badge badge-pill badge-success">Unchanged</div>';
                            } else {

                                return '<a href="javascript:void(0)" onclick="modal(' + row.id + ')" class="badge badge-pill badge-danger btn-hover-shine" data-toggle="modal" data-target="#largeModalresident" style="color: #fff;"><i class="fas fa-hand-pointer" style="margin-right:5px;"></i>Changed</a>';
                            }

                        }

                    },
                    {

                        data: 'check_in',

                        name: 'check_in',

                        searchable: false,

                        render: function(data, type, row) {

                            return moment(row.check_in).format("MMMM Do YYYY");
                        }

                    },
                    {

                        data: 'check_out',

                        name: 'check_out',

                        searchable: false,

                        render: function(data, type, row) {

                            return moment(row.check_out).format("MMMM Do YYYY");
                        }
                    },

                    {

                        data: 'id',

                        id: 'id',

                        name: 'guest_info.name',

                        contact_no: 'guest_info.contact_no',

                        searchable: false,

                        render: function(data, type, row) {

                            return "<a href='javascript:void(0)'data-toggle='modal' data-target='#sms_send' onclick='sms_pop_up(\"" + row.contact_no + "\",\"" + row.name + "\")' class='btn-hover-shine btn-shadow btn btn-alternate btn-sm'>Send sms</a>|<a href='single-guest-info/" + row.id + "' class='btn-hover-shine btn-shadow btn btn-warning btn-sm' target='_blank'>Detils</a>";

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

        $('#action-filter').addClass('col-lg-1 col-md-2 col-sm-2');
        $('#category-filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#zone-filter').addClass('col-lg-1 col-md-2 col-sm-2');
        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');



        $('#process_data_table_filter input').addClass('form-control form-control-sm');

        var category_filter_html = '<select class="form-control-sm form-control" id="guest_type">' +

            '<option value="select">Select Type</option>' +
            '<option value="Single">Single</option>' +
            '<option value="Couple">Couple </option>' +
            '<option value="Group">Group </option>' +
            '<option value="Family">Family </option>' +
            '<option value="Corporate">Corporate </option>' +

            '</select>';

        $('#category-filter').append(category_filter_html);




        var action_filter_html = '<select class="form-control-sm form-control" id="guest_category" data-select2-id="2" tabindex="-1" aria-hidden="true">' +

            '<option value="">Category</option>' +
            '<option value="Domestic">Domestic</option>' +
            '<option value="Foreigner">Foreigner</option>' +
            '<option value="VIP">VIP</option>' +

            '</select>';
        $('#action-filter').css("padding", "0");
        $('#action-filter').append(action_filter_html);

        var zone_filter_html = '<select class="form-control-sm form-control" id="resident_zone">' +

            '<option value="">Zone</option>' +
            '<option value="A">A</option>' +
            '<option value="B">B</option>' +
            '<option value="C">C</option>' +
            '<option value="D">D</option>' +
            '<option value="E">E</option>' +

            '</select>';

        $('#zone-filter').append(zone_filter_html);

        $('div.dt-buttons').css({
            "position": "absolute",
            "right": "0",
            "top": "-44px"
        });

        $('#guest_type').on('change', function() {

            var guest_type = $(this).val();
            if (guest_type != "") {
                table.columns(4).search(guest_type).draw();
            }
        })

        $('#guest_category').on('change', function() {

            var guest_category = $(this).val();
            if (guest_category != "") {
                table.columns(5).search(guest_category).draw();
            }
        });

        $('#resident_zone').on('change', function() {

            var resident_zone = $(this).val();
            if (resident_zone != "") {
                table.columns(7).search(resident_zone).draw();
            }
        })
        var date_picker_html = '<div id="date_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"> <i class="fa fa-calendar"> </i>&nbsp; <span> </span> <i class="fa fa-caret-down"></i></div>';

        $('#date-filter').append(date_picker_html);

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {

                $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                var range = start.format("YYYY-MM-DD") + "~" + end.format("YYYY-MM-DD");

                table.columns(11).search(range).draw();

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
<!------------------------------------------------ modal ------------------------------------->
<script src="{!! asset('js/sweetalert.min.js') !!}"></script>
<div id="largeModalresident" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" id="max-width98">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <h4 class="modal-title" id="myModalLabel">Guset Changes Information </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="updatedResident" style="overflow-x: auto;">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    var category_filter_html = '<table id="tablet" class="table table-striped table-bordered" style="width:100%; text-align: center;display:none"><thead> <tr><th>Id</th><th>Name</th><th>Type</th><th>Category</th><th>Contact</th><th>Address</th><th>Profession</th><th>Document</th><th>Check In</th><th>Check Out</th><th>status</th><th>Created At</th><th>Updated At</th></tr></thead><tbody id="show"></tbody></table>';

    function modal(id) {

        $.ajax({

            url: 'guest-backup-data',
            type: 'post',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {

                var len = response['backup'].length;

                $('#show').empty();
                for (var i = 0; i < len; i++) {
                    $('#updatedResident').append(category_filter_html);
                    $("#show").append('<tr id="rem"><td><center>' + (i + 1) + '</center></td><td>' + response['backup'][i]['name'] + '<center></td></center><td>' + response['backup'][i]['guest_type'] + '</td><td>' + response['backup'][i]['guest_category'] + '</td><td>' + response['backup'][i]['contact_no'] + '</td><td><center>' + response['backup'][i]['address'] + '</center></td><td><center>' + response['backup'][i]['profession'] + '</center></td><td><center>' + response['backup'][i]['document_no'] + '</center></td><td><center>' + moment(response['backup'][i]['check_in']).format("MMMM D, YYYY h:mm:ss A") + '</center></td><td><center>' + moment(response['backup'][i]['check_out']).format("MMMM D, YYYY h:mm:ss A") + '</center></td><td><div class="badge badge-pill badge-danger">Past</div></td><td><center>' + moment(response['backup'][i]['created_at']).format("MMMM D, YYYY h:mm:ss A") + '</center></td><td><center>' + moment(response['backup'][i]['updated_at']).format("MMMM D, YYYY h:mm:ss A") + '</center></td></tr>');

                }

                $("#show").append('<tr id="rem"><td><center>' + (i + 1) + '</center></td><td>' + response['current'][0]['name'] + '<center></td></center><td>' + response['current'][0]['guest_type'] + '</td><td>' + response['current'][0]['guest_category'] + '</td><td>' + response['current'][0]['contact_no'] + '</td><td><center>' + response['current'][0]['address'] + '</center></td><td><center>' + response['current'][0]['profession'] + '</center></td><td><center>' + response['current'][0]['document_no'] + '</center></td><td><center>' + moment(response['current'][0]['check_in']).format("MMMM D, YYYY h:mm:ss A") + '</center></td><td><center>' + moment(response['current'][0]['check_out']).format("MMMM D, YYYY h:mm:ss A") + '</center></td><td><div class="badge badge-pill badge-success">Present</div></td><td><center>' + moment(response['current'][0]['created_at']).format("MMMM D, YYYY h:mm:ss A") + '</center></td><td><center>' + moment(response['current'][0]['updated_at']).format("MMMM D, YYYY h:mm:ss A") + '</center></td></tr>');

                $('#tablet').show();

                $('#max-width98').css('max-width','98%');
            }
        });
    }


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
                message: message
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