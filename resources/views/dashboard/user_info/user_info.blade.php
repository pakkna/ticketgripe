@section('UserList', 'mm-active')
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
                            <span class="d-inline-block">All User Details</span>
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
                                        Filter User Information
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
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Event</th>
                            <th>Credit</th>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body2">
            </div>
            <div class="modal-footer" style="display: flex;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
<script type="text/javascript" src=https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
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
                dom: 'lfBrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: 'user_info_datatable',
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
                        data: 'username',
                        name: 'username',
                        id: 'id',
                        searchable: true,
                        render: function(data, type, row) {
                                return "<a href='event-list/"+row.id+"' target='_blank'>"+data+"</a>";
                            
                        }
                    },
                    {
                        data: 'fullname',
                        name: 'fullname',
                        searchable: true,
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable: true
                    },
                    {
                        data: 'mobile',
                        name: 'mobile',
                        mobile: 'mobile',
                        searchable: true,
                        render: function(data, type, row) {
                            if (row.mobile == null) {
                                return "---";
                            }else{
                                return data;
                            }
                        }
                    },
                    {
                        data: 'event_count',
                        name: 'event_count',
                        searchable: true,
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
                        data: 'created_at',
                        name: 'created_at',
                        searchable: false,
                        render: function(data, type, row) {
                            return moment(row.created_at).format("MMMM Do YYYY, h:mm:ss A");
                        }
                    },
                    {
                        data: 'id',
                        status: 'status',
                        searchable: false,
                        render: function(data, type, row) {
                            if (row.status == 1) {
                                return "<a href='javascript:void(0)'data-toggle='modal' data-target='#sms_send' onclick='user_details("+ data + ")' class='btn-hover-shine btn-shadow btn btn-alternate btn-sm'>Detils</a>|<a href='javascript:void(0)' onclick='suspend_user("+ data + ","+row.status+")' class='btn-hover-shine btn-shadow btn btn-danger btn-sm'>Suspend</a>";
                            }else{
                                return "<a href='javascript:void(0)'data-toggle='modal' data-target='#sms_send' onclick='user_details(" + data + ")' class='btn-hover-shine btn-shadow btn btn-alternate btn-sm'>Detils</a>|<a href='javascript:void(0)' onclick='suspend_user("+ data + ","+row.status+")' class='btn-hover-shine btn-shadow btn btn-warning btn-sm'>Unspend</a>";
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
        $('#category-filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#process_data_table_filter').addClass('offset-md-7 col-lg-2 col-md-2 col-sm-2');
        $('#process_data_table_filter input').addClass('form-control form-control-sm');
        $('div.dt-buttons').css({
            "position": "absolute",
            "right": "0",
            "top": "-44px"
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var category_filter_html = '<table id="tablet" class="table table-striped table-bordered" style="width:100%; text-align: center;"><thead> <tr><th>Address</th><th>Country</th><th>Organization</th><th>Events</th></tr></thead><tbody id="response_show_users"></tbody></table>'; 

    function user_details(id) {
        $.ajax({
            url: '/auth-user-info',
            type: 'post',
            data: {
                id: id,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) {

                $('#modal-body2').empty();
                $("#modal-body2").append(category_filter_html);
                $('#exampleModalLongTitle').empty();
                $("#exampleModalLongTitle").append(response['fullname']+' Details');

                var address = response['address'] == null ? "---" : response['address'];
                var country = response['country'] == null ? "---" : response['country'];
                var organization = response['organization'] == null ? "---" : response['organization'];

                $("#response_show_users").append('<tr id="rem"><td nowrap>' + address + '</td><td nowrap>' + country + '</td><td>' + organization + '</td><td>'+response['event_count']+'</td></tr>');
            }
        });
    }

    function suspend_user(id,status) {
        $.ajax({
            url: '/suspend-user',
            type: 'post',
            data: {
                id: id,
                status: status,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) {
                if (response == 1) {
                    swal("Action  successfully done", {
                        icon: "success",
                    });
                    window.setTimeout(function(){ 
                        location.reload();
                    } ,3000);
                } else {
                    swal("Error !", {
                        icon: "error",
                    });
                    window.setTimeout(function(){ 
                        location.reload();
                    } ,3000);
                }
            }
        });
    }
</script>