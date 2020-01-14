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
                                <table id="order_table" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
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

<script type="text/javascript">
        $('#orders').click(function() {

        // $(".dataTables_empty").css('width', '1000px');
        // $(".datatable_custom_wrap").css('overflow-x', 'hidden');
        $('#order_table').DataTable().clear().destroy();

        var table2 =


        $('.dataTables_wrapper').addClass('row');
        $("#order_table").wrapAll("<div style='overflow-x:auto;width:100%' />");

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#order_table_length').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#order_table_length').css('padding','5px 0px');
        $('#order_table_filter').css('padding','5px 0px');
        $('#order_table_filter').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#order_table_info').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#order_table_paginate').addClass('col-lg-6 col-md-6 col-sm-12');
        $("#order_table_wrapper").css('overflow-x', 'auto');


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
