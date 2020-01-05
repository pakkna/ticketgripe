<link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
    <div class="dash-tab-links">
        <div class="container">
            <div class="dash-discussions mb20">
                <div class="main-section">
                <!-- <div class="all-search-filters">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-filters">
                                        <div class="search-filters-left">	
                                            <div class="dropdown">										
                                                <a href="#" class="filter-d wt-mp dropdown-toggle-no-caret" role="button" data-toggle="dropdown" aria-expanded="false">Category<i class="fas fa-angle-down"></i></a>
                                                <div class="dropdown-menu cate-dropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                    <a class="link-item" href="#">Music</a>
                                                    <a class="link-item" href="#">Festival</a>	
                                                    <a class="link-item" href="#">Art</a>
                                                    <a class="link-item" href="#">Club</a>
                                                    <a class="link-item" href="#">Comedy</a>
                                                    <a class="link-item" href="#">Theatre</a>
                                                    <a class="link-item" href="#">Promotions</a>
                                                    <a class="link-item" href="#">Other</a>
                                                </div>	
                                            </div>	
                                        </div>
                                        <div class="search-filters-right dropdown">
                                            <a href="#" class="filter-d dropdown-toggle-no-caret" role="button" data-toggle="dropdown" aria-expanded="false">All Dates<i class="fas fa-angle-down"></i> </a>
                                            <div class="dropdown-menu date-dropdown dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(72px, 21px, 0px);">
                                                <a class="link-item" href="#">All Dates</a>
                                                <a class="link-item" href="#">Upcoming Events</a>		
                                                <a class="link-item" href="#">Past Events</a>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="all-search-events">
                    @include("layouts.includes.flash")								
                        <div class="row">
                            <table id="example" style="width:100%; text-align: center">
                                <thead style="display: none;">
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
                            <tbody class="row">

                            </tbody>
                            </table>  
                        </div>								
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Body End -->
<!-- <script src="{!! asset('master/js/jquery.min.js') !!}"></script> -->
<script src="{!! asset('master/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('master/js/dataTables.bootstrap4.min.js') !!}"></script>
<script>
    $(document).ready(function() {
        
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".dataTables_empty").css('width', '1000px');
        $("#example_wrapper").css('width', '100%');
        $(".datatable_custom_wrap").css('overflow-x', 'hidden');

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

                dom: 'l<"#date-filter"><"#category-filter"><"#action-filter">fBrtip',

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

                        searchable: false,

                        render: function(data, type, row) {

                            return row.ticket_price row.selling_currency;

                        }

                    },
                    {

                        data: 'hide_ticket',

                        name: 'hide_ticket',

                        searchable: true

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

                            return "<a href='javascript:void(0)'data-toggle='modal' data-target='#sms_send' onclick='sms_pop_up(\"" + row.contact_no + "\",\"" + row.name + "\")' class='btn-hover-shine btn-shadow btn btn-alternate btn-sm'>Send sms</a>|<a href='guest-update/" + row.id + "' class='btn-hover-shine btn-shadow btn btn-warning btn-sm' target='_blank'>Detils</a>";

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

        $('#process_data_table_filter').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter input').addClass('form-control form-control-sm');
    });

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

</script>