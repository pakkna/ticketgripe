<script>
    function order_details_user() {

        $.ajax({
            url: '{{route("order_datatable_form")}}',
            type: 'post',
            cache: false,
            data: {

                _token: "{{ csrf_token() }}",
                event_id: "{{  Request::segment(2) }}"

            },
            dataType: 'json',
            success: function(response) {

                var len = response.length;
                    
                $('#order-form-user-all').empty();
                $('#order_table_form').DataTable().clear().destroy();
                for (var i = 0; i < len; i++) {

                    if (response[i]['attende_confirm'] == null || response[i]['attende_confirm'] == 0) {
                        var tick = "<a href='javascript:void(0)' class='btn-hover-shine btn-shadow btn custom-action btn-sm' title='Confirm' onclick='confirm_single_customer(\"" + response[i]['transaction_id']+"\",1,this)'> <i class='fa fa-check-square-o' style='color:red;' aria-hidden='true'></i></a>";
                    }else{
                        var tick = "<a href='javascript:void(0)' class='btn-hover-shine btn-shadow btn custom-action btn-sm' title='Cancel' onclick='confirm_single_customer(\"" + response[i]['transaction_id']+"\",0,this)'> <i class='fa fa-check-square' style='color:green;' aria-hidden='true'></i></a>";
                    }

                    var action = "<td><a href='javascript:void(0)' class='btn-hover-shine btn-shadow btn custom-action btn-sm' title='View' onclick='view_single_customer(\"" + response[i]['transaction_id']+"\")' data-toggle='modal' data-target='#view_order_single'> <i class='fa fa-eye'></i></a> | "+tick+" </td>";
  
                    $("#order-form-user-all").append('<tr id="rem"><td><center>' + response[i]['order_confirm_id'] + '</center></td><td>' + response[i]['Name'] + '</td><td>' + response[i]['Email'] + '</td><td>' + response[i]['Mobile'] + '</td><td>'+ response[i]['sold_tickets'] +'</td>'+ action + '</tr>');
                
                }
                $('#order_table_form').DataTable();
                $('.datatable_custom_wrap').css('overflow-x', 'auto');

            }
        });
    }

    function view_single_customer(tran_id){

        $.ajax({

            url: '/modal-view-order',
            type: 'post',
            data: {
                tran_id: tran_id,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) { 

                $('#response_show_order').empty();
                $.each(response,function(key,value){

                    //console.log(key+":"+value);
  
                    $("#response_show_order").append('<tr id="rem"><td><center>' + key + '</center></td><td>' + value + '</td></tr>');
                })
            }
        });
    }

    function confirm_single_customer(tran_id,flag,the){

        $.ajax({

            url: '/confirm-order-user',
            type: 'post',
            data: {
                tran_id: tran_id,
                flag: flag,
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) { 
                if (response == true) {
                    if (flag == 1) {
                        $(the).attr({
                                
                            "title" : "Cancel",
                            "onClick" : "confirm_single_customer(\"" + tran_id +"\",0,this)",
                        });
                        $(the).html("<i class='fa fa-check-square' style='color:green;' aria-hidden='true'></i>");

                        // $(the).remove();
                        // the.innerHTML = "<a href='javascript:void(0)' class='btn-hover-shine btn-shadow btn custom-action btn-sm' title='Confirm' onclick='confirm_single_customer(\"" + tran_id +"\",1,this)'> <i class='fa fa-check-square-o' style='color:green;' aria-hidden='true'></i></a>";
                    }else{
                        $(the).attr({
                                
                            "title" : "Confirm",
                            "onClick" : "confirm_single_customer(\"" + tran_id +"\",1,this)",
                        });
                        $(the).html("<i class='fa fa-check-square-o' style='color:red;' aria-hidden='true'></i>");
                        // $(the).append("<a href='javascript:void(0)' class='btn-hover-shine btn-shadow btn custom-action btn-sm' title='Confirm' onclick='confirm_single_customer(\"" + tran_id +"\",1,this)'> <i class='fa fa-check-square-o' style='color:red;' aria-hidden='true'></i></a>");
                    }
                    // order_details_user();
                }
            }
        });
    }
</script>

<link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
    <div class="setting-form">
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-info mr-2"></i> Ticket Orders</h3>
            </div>
            <div class="add-event-bg">
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="all-search-events">
                        @include("layouts.includes.flash")								
                            <div class="row">
                                <table id="order_table_form" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Tickets</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody" id="order-form-user-all">

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
<!-- Modal -->
<div class="modal fade" id="view_order_single" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="color: #FF7555;font-weight: 600;"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table style="width:100%; text-align: center;overflow-x: auto;" class="table table-hover table-striped table-bordered display nowrap">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="text-align: center !important;">Question Title</th>
                            <th>Question Answere</th>
                        </tr>
                        
                    </thead>
                    <tbody id="response_show_order">

                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="{!! asset('master/js/jquery.min.js') !!}"></script> -->
<script src="{!! asset('master/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('master/js/dataTables.bootstrap4.min.js') !!}"></script>
<!-- <script src="{!! asset('master/js/jquery.nice-select.js') !!}"></script> -->
<script type="text/javascript">

        

        $('#orders').click(function() {

        // $(".dataTables_empty").css('width', '1000px');
        // $(".datatable_custom_wrap").css('overflow-x', 'hidden');
        
        order_details_user();

        $('.dataTables_wrapper').addClass('row');
        $("#order_table_form").wrapAll("<div style='overflow-x:auto;width:100%' />");

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#order_table_form_length').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#order_table_form_length').css('padding','5px 0px');
        $('#order_table_form_filter').css('padding','5px 0px');
        $('#order_table_form_filter').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#order_table_form_info').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#order_table_form_paginate').addClass('col-lg-6 col-md-6 col-sm-12');
        $("#order_table_form_wrapper").css('overflow-x', 'auto');


        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');



        $('#date-filter').addClass('col-lg-4 col-md-4 col-sm-4 adjust');

        $('#action-filter').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#category-filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter input').addClass('form-control form-control-sm');
        
        // $(".custom-select").wrapAll("<div class='nice-select' />");
        // $(".custom-select").addClass("nice-select");

    });

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

</script>


