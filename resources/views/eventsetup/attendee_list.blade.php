<link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
<style>
@media(max-width:576px){
    div.dt-buttons{
        top: 45px !important;
    }
}
</style>
<script>
    $( document ).ready(function() {
        loadjscssfile("https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js", "js");
        loadjscssfile("https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js.js", "js");
        loadjscssfile("https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js", "js");
        loadjscssfile("https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js", "js");
        loadjscssfile("https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js", "js");
        loadjscssfile("https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js", "js");
        loadjscssfile("https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js", "js");

        attendee_details_user();
    });
    function loadjscssfile(filename, filetype){
        if (filetype=="js"){ //if filename is a external JavaScript file
            var fileref=document.createElement('script')
            fileref.setAttribute("type","text/javascript")
            fileref.setAttribute("src", filename)
        }
        else if (filetype=="css"){ //if filename is an external CSS file
            var fileref=document.createElement("link")
            fileref.setAttribute("rel", "stylesheet")
            fileref.setAttribute("type", "text/css")
            fileref.setAttribute("href", filename)
        }
        if (typeof fileref!="undefined")
            document.getElementById("cus-order-table").appendChild(fileref)
    }
</script>
    <div class="setting-form">
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-info mr-2"></i> Attendee List</h3>
            </div>
            <div class="add-event-bg">
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="all-search-events">
                        @include("layouts.includes.flash")								
                            <div class="row">
                                <table id="attendee_table_form" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th>SN</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Tickets</th>
                                            <th>Action</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody" id="attendee-form-user-all">

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
<div class="modal fade" id="view_attendee_single" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
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
                    <tbody id="response_show_order2" >

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

        function attendee_details_user() {

            $.ajax({
                url: '{{route("attendee_datatable_form")}}',
                type: 'post',
                cache: false,
                data: {

                    _token: "{{ csrf_token() }}",
                    event_id: "{{  Request::segment(2) }}"

                },
                dataType: 'json',
                success: function(response) {

                    var len = response.length;
                    
                    $('#attendee-form-user-all').empty();
                    $('#attendee_table_form').DataTable().clear().destroy();
                    for (var i = 0; i < len; i++) {
                        var j = i+1;

                        var action = "<td>| <a href='javascript:void(0)' class='btn-hover-shine btn-shadow btn custom-action btn-sm' title='View' onclick='view_single_attendee(\"" + response[i]['transaction_id']+"\")' data-toggle='modal' data-target='#view_attendee_single'> <i class='fa fa-eye'></i></a> | </td>";
  
                        $("#attendee-form-user-all").append('<tr id="rem"><td>'+j+'</td><td><center>' + response[i]['order_confirm_id'] + '</center></td><td>' + response[i]['Name'] + '</td><td>' + response[i]['Email'] + '</td><td>' + response[i]['Mobile'] + '</td><td>'+ response[i]['sold_tickets'] +'</td>'+ action + '<td>_ _ _ _ _ _</td></tr>');
                
                    }

                    $('#attendee_table_form').DataTable({
                        dom: 'lfBrtip',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [ 0, ':visible' ]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 5 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'csv',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            'colvis'
                        ],
                        columnDefs: [
                            {
                                targets: -1,
                                visible: false
                            }
                        ]
                    });
                    $('.dataTables_wrapper').addClass('row');
                    $("#attendee_table_form").wrapAll("<div style='overflow-x:auto;width:100%' />");

                    // $('.dataTables_processing').addClass('m-loader m-loader--brand');

                    $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');
                    $('#attendee_table_form_length').addClass('col-lg-6 col-md-6 col-sm-12');
                    $('#attendee_table_form_length').css('padding','5px 0px');
                    $('#attendee_table_form_filter').css('padding','5px 0px');
                    $('#attendee_table_form_filter').addClass('col-lg-6 col-md-6 col-sm-12');
                    $('#attendee_table_form_info').addClass('col-lg-6 col-md-6 col-sm-12');
                    $('#attendee_table_form_paginate').addClass('col-lg-6 col-md-6 col-sm-12');
                    $("#attendee_table_form_wrapper").css('overflow-x', 'auto');
                    $('.datatable_custom_wrap').css('overflow-x', 'auto');
                    $('div.dt-buttons').css({
                        "position": "absolute",
                        "right": "19px",
                        "top": "12px"
                    });

                }
            });
        }

        function view_single_attendee(tran_id){

            $.ajax({

                url: '/modal-view-order',
                type: 'post',
                data: {
                    tran_id: tran_id,
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                dataType: 'json',
                success: function(response) { 

                    $('#response_show_order2').empty();
                    $.each(response,function(key,value){

                        //console.log(key+":"+value);
  
                        $("#response_show_order2").append('<tr id="rem"><td><center>' + key + '</center></td><td>' + value + '</td></tr>');
                    })
                }
            });
        }

        $('#attende').click(function() {

        // $(".dataTables_empty").css('width', '1000px');
        // $(".datatable_custom_wrap").css('overflow-x', 'hidden');
        
        attendee_details_user();
        
        // $(".custom-select").wrapAll("<div class='nice-select' />");
        // $(".custom-select").addClass("nice-select");

    });

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

</script>


