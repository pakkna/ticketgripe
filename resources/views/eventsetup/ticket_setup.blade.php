<link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
    <div class="setting-form">
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-info mr-2"></i> Event Tickets</h3>
            </div>
            <div class="add-event-bg">
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="all-search-events">
                        @include("layouts.includes.flash")								
                            <div class="row">
                                <table id="example" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th>ID</th>
                                            <th>Ticket Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Visibility</th>
                                            <th>Ticket Sells End</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody">

                                    </tbody>
                                </table>  
                            </div>								
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Body End -->
<!-- <script src="{!! asset('master/js/jquery.min.js') !!}"></script> -->
<script src="{!! asset('master/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('master/js/dataTables.bootstrap4.min.js') !!}"></script>
<!-- <script src="{!! asset('master/js/jquery.nice-select.js') !!}"></script> -->

<script src="{!! asset('js/sweetalert.min.js') !!}"></script>

<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    function ticket_delete(id,the) {

        $.ajax({

            url: '/ticket-delete',
            type: 'post',
            data: {
                id: id,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) {

                if (response==1) {

                    $(the).closest("tr").fadeOut(200, function () {
                        $(this).remove();
                    });

                    swal({
                        title: "Ticket Delete Action",
                        text: "Event Ticket Deleted Successfully",
                        icon: "success",
                        buttons: false,
                    })

                }else{
                    swal({
                        title: "Falid",
                        text: "ticket Delete Action Error",
                        icon: "error",
                        buttons: false,
                    })
                }
                    $(".swal-text").css('color', '#B40000');
                    $(".swal-text").css('font-weight', '600');
                    $(".swal-title").css('font-size', '18px');

            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".dataTables_empty").css('width', '1000px');
        // $(".datatable_custom_wrap").css('overflow-x', 'hidden');

        var table =
            $('#example').DataTable({


                processing: false,

                serverSide: true,

                paging: true,

                pageLength: 10,

                lengthChange: true,

                searching: true,

                ordering: true,

                info: true,

                autoWidth: false,

                // dom: 'l<"#date-filter"><"#category-filter"><"#action-filter">fBrtip',

                dom: 'lfBrtip',

                ajax: {

                    url: '{{route("all_ticket_datatable")}}',

                    type: 'GET',

                    data: function(d) {

                        d._token = "{{ csrf_token() }}";
                        d.event_id = "{{  Request::segment(2) }}";

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

                        data: 'ticket_type',

                        name: 'ticket_type',

                        searchable: true

                    },
                    {

                        data: 'quantity',

                        name: 'quantity',

                        searchable: true,

                    },
                    {

                        data: 'ticket_price',

                        name: 'ticket_price',

                        currency: 'selling_currency',

                        searchable: true,

                        render: function(data, type, row) {

                            return row.ticket_price + " " + row.selling_currency ;

                        }

                    },
                    {

                        data: 'hide_ticket',

                        name: 'hide_ticket',

                        searchable: false,
                        render: function(data, type, row) {
                            if (row.hide_ticket == 1) {
                                return "Hide";
                            }else{
                                return "Display";
                            }
                        }

                    },
                    {

                        data: 'untill_date',

                        name: 'untill_date',

                        searchable: false,

                        render: function(data, type, row) {

                            return moment(row.untill_date).format("MMMM Do YYYY, h:mm:ss A");
                        }

                    }, 
                    {

                        data: 'id',

                        name: 'id',

                        searchable: false,

                        render: function(data, type, row) {

                            return "<a href='javascript:void(0)' onclick='edit_action("+row.id+")' title='Edit' class='btn-hover-shine btn-shadow btn custom-action btn-sm'><i class='fas fa-edit'></i></a>|<a href='#!' title='View' class='btn-hover-shine btn-shadow btn custom-action btn-sm'><i class='fa fa-eye'></i></a>|<a href='javascript:void(0)'  onclick='ticket_delete("+row.id+",this)' title='Delete' class='btn-hover-shine btn-shadow btn custom-action btn-sm' ><i class='fa fa-trash'></i></a>";

                        }

                    },
                ]
            });

        $("table").wrapAll("<div style='overflow-x:auto;width:100%' />");

        $('.dataTables_wrapper').addClass('row');

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#example_length').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#example_length').css('padding','5px 0px');
        $('#example_filter').css('padding','5px 0px');
        $('#example_filter').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#example_info').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#example_paginate').addClass('col-lg-6 col-md-6 col-sm-12');
        $("#example_wrapper").css('overflow-x', 'auto');


        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');



        $('#date-filter').addClass('col-lg-4 col-md-4 col-sm-4 adjust');

        $('#action-filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#category-filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter input').addClass('form-control form-control-sm');
        
        // $(".custom-select").wrapAll("<div class='nice-select' />");
        // $(".custom-select").addClass("nice-select");

    });

</script>

<script>
    function edit_action(id){

        $.ajax({

            url: '/modal-edit-ticket',
            type: 'post',
            data: {
                id: id,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) {

            $('#editmodal').html(response);

            }
        });
    }
</script>    