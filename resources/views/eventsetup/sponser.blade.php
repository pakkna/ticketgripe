<div class="setting-form">
    <div class="user-data full-width">

        <div class="about-left-heading">
            <h3> <i class="fas fa-plus mr-2"></i> Add Sponser</h3>
        </div><hr>
        <form class="form-horizontal" method="post" action="{{ route('add-sponser') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="prsnl-info">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Sponser Name*</label>
                            <input class="payment-input" style="min-height:36px!important;" value="{{old('sponser_name')}}" type="text" name="sponser_name" placeholder="Sponser Name" required><br>
                            @if ($errors->has('sponser_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sponser_name') }}</strong>
                            </span>
                            @endif
                            <input  name="sponser_event_id" type="text" value="{{$event_details->id}}" hidden>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                        <label>Sponser Logo*</label>
                                <div class="input-group">   
                                        <input type="file" name="sponser_logo" class="custom-file-input" id="file-upload"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" id="file-upload-filename">Choose file</label>
                                </div>
                            @if ($errors->has('sponser_logo'))
                                           <span class="help-block">
                                            <strong>{{ $errors->first('sponser_logo') }}</strong>
                                            </span>
                            @endif
                            <script>
                                var input = document.getElementById( 'file-upload' );
                                var infoArea = document.getElementById( 'file-upload-filename' );

                                input.addEventListener( 'change', showFileName );

                                function showFileName( event ) {

                                    // the change event gives us the input it occurred in
                                    var input = event.srcElement;

                                    // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
                                    var fileName = input.files[0].name;

                                    // use fileName however fits your app best, i.e. add it into a div
                                    infoArea.textContent = fileName;
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                       <div class="form-group">
                            <button class="setting-save-btn" style="margin-top:29px!important;height:36px!important;" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
    <link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
    <div class="add-event-bg">
        <div class="dash-discussions mb20">
            <div class="main-section">
                <div class="all-search-events">
                @include("layouts.includes.flash")								
                    <div class="row">
                        <table id="sponser_table" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                            <thead class="custom-thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Sponser Logo</th>
                                    <th>Sponser Name</th>
                                    <th>Visibility</th>
                                    <th>Created_at</th>
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
<script src="{!! asset('master/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('master/js/dataTables.bootstrap4.min.js') !!}"></script>
<!-- <script src="{!! asset('master/js/jquery.nice-select.js') !!}"></script> -->

<script type="text/javascript">
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $('#sponser').click(function() {

        // $(".dataTables_empty").css('width', '1000px');
        // $(".datatable_custom_wrap").css('overflow-x', 'hidden');
        $('#sponser_table').DataTable().clear().destroy();

        var table2 =
            $('#sponser_table').DataTable({


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

                    url: '{{route("all-sponser")}}',

                    type: 'POST',
                    cache: false,

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

                        data: 'sponser_logo',

                        name: 'sponser_logo',

                        searchable: false,

                        render: function(data, type, row) {

                            return '<img src="{{url('/')}}/'+ row.sponser_logo +'" style="max-height:60px;max-width:65px" alt="sponser_logo">';

                        }

                    },
                    {

                        data: 'sponser_name',

                        name: 'sponser_name',

                        searchable: true,

                    },
                    {

                        data: 'event_id',

                        name: 'event_id',

                        searchable: false,

                        render: function(data, type, row) {

                            return "Display" ;

                        }

                    },
                    {

                        data: 'created_at',

                        name: 'created_at',

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

                            return "<a href='javascript:void(0)'onclick='sponser_delete("+row.id+",this)' title='Delete' class='btn-hover-shine btn-shadow btn custom-action btn-sm' ><i style='font-size: 22px;' class='fa fa-trash'></i></a>";

                        }

                    },
                ]
            });

        $('.dataTables_wrapper').addClass('row');

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');
        $("#sponser_table").wrapAll("<div style='overflow-x:auto;width:100%' />");
        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');
        $('#sponser_table_length').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#sponser_table_length').css('padding','5px 0px');
        $('#sponser_table_filter').css('padding','5px 0px');
        $('#sponser_table_filter').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#sponser_table_info').addClass('col-lg-6 col-md-6 col-sm-12');
        $('#sponser_table_paginate').addClass('col-lg-6 col-md-6 col-sm-12');
        $("#sponser_table_wrapper").css('overflow-x', 'auto');


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
    @if(Session::has('SponserAddSuccess'))
        swal({
            title: "Add Sponser",
            text: "Event Sponser Added Successfully",
            icon: "success",
            buttons: false,
        })
    @endif
    
    @if(Session::has('SponserAddDanger'))
    swal({
        title: "Add Falid",
        text: "Event Sponser Added Error",
        icon: "error",
        buttons: false,
    })
    $(".swal-text").css('color', '#B40000');
    $(".swal-text").css('font-weight', '600');
    $(".swal-title").css('font-size', '18px');
    @endif 


    function sponser_delete(id,the) {

$.ajax({

    url: '/sponser-delete',
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
                title: "Sponser Delete Action",
                text: "Event Sponser Deleted Successfully",
                icon: "success",
                buttons: false,
            })

        }else{
            swal({
                title: "Faild",
                text: "Sponser Delete Action Error",
                icon: "error",
                buttons: false,
            })
        }
            $(".swal-text").css('color', '#F55F3D');
            $(".swal-text").css('font-weight', '600');
            $(".swal-title").css('font-size', '18px');

    }
});
}
</script>    

