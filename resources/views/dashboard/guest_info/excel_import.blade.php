@include('layouts.header')
@section('excel-import', 'mm-active')

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

                            <span class="d-inline-block">Manage Your Student Forum</span>

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

                                        Set University

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

                <div class="page-title-actions">

                    <div class="position-relative form-group text-white"><a href="{{URL('assets/Sample/Guest Entry Excel Sheet Format.xlsx')}}" class="btn-wide mb-2 mr-2 btn-icon btn-pill btn btn-shadow  btn-gradient-primary btn-sm"> <i class="lnr-enter btn-icon-wrapper"> </i>Download Sample Excel Sheet </a></div>

                </div>

            </div>

        </div>



        <!-- Form Section -->



        <div class="row">

            <div class="offset-1 col-md-10">

                <div class="main-card mb-3 card">



                    <div class="card-body">
                        <h5 class="card-title text-center">Add New Guests From Excel Sheet </h5>

                        <form method="post" action="{{route('import')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            @include("layouts.includes.flash")

                            <div class="form-row">


                                <div class="offset-1 col-md-6">
                                    <div class="position-relative form-group"><label for="title" class="">Upload New Guest Sheet</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="file-upload" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" id="file-upload-filename">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                    <script>
                                        var input = document.getElementById('file-upload');
                                        var infoArea = document.getElementById('file-upload-filename');

                                        input.addEventListener('change', showFileName);

                                        function showFileName(event) {

                                            // the change event gives us the input it occurred in
                                            var input = event.srcElement;

                                            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
                                            var fileName = input.files[0].name;

                                            // use fileName however fits your app best, i.e. add it into a div
                                            infoArea.textContent = fileName;
                                        }
                                    </script>

                                </div>

                                <div class="offset-1 col-md-2">

                                    <div class="position-relative form-group"><input value="Import Excel" id="button" class="btn-wide mb-2 mr-2 mt-4 btn btn-shadow btn-gradient-success btn-lg" type="submit"></div>

                                </div>

                            </div>



                        </form>

                    </div>



                </div>

            </div>

        </div>



        <!-- title section -->





        <!-- gallery Section -->



        <div class="container ">




            <div class="main-card mb-3 card">

                <div class="card-body">

                    <table style="width: 100%;" id="process_data_table" class="table table-hover table-striped table-bordered">

                        <thead>

                            <tr>

                                <th class="text-center">Id</th>

                                <th class="text-center">File Name</th>

                                <th> Excel File Link </th>

                                <th> Import Guests</th>

                                <th> Created At </th>



                            </tr>

                        </thead>

                        <tbody id="tbody">


                        </tbody>

                    </table>

                </div>

            </div>


        </div>





    </div>



</div>



@include('layouts.footer')

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

                dom: 'l<"#date-filter">frtip',

                ajax: {

                    url: 'get-import-files',

                    type: 'POST',

                    data: function(d) {

                        d._token = "{{  csrf_token() }}";

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

                        data: 'file_name',

                        name: 'file_name',

                        searchable: true

                    },
                    {

                        data: 'file_path',

                        name: 'file_path',

                        searchable: false,

                        render: function(data, type, row) {

                            return '<a href="' + row.file_path + '" class="" > Download Excel File </a>';

                        }


                    },
                    {

                        data: 'import_amount',

                        name: 'import_amount',

                        searchable: false

                    },

                    {

                        data: 'created_at',

                        name: 'created_at',

                        searchable: false,

                        render: function(data, type, row) {

                            return moment(row.created_at).format("MMMM Do YYYY, h:mm:ss A");
                        }

                    }


                ]

            });


        $("table").wrapAll("<div style='overflow-x:auto;width:100%' />");

        $('.dataTables_wrapper').addClass('row');

        // $('.dataTables_processing').addClass('m-loader m-loader--brand');

        $('#process_data_table_length').addClass('col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_length select').addClass('custom-select custom-select-sm form-control form-control-sm');


        $('#date-filter').addClass('offset-2 col-lg-4 col-md-4 col-sm-4');

        $('#process_data_table_filter').addClass('offset-1 col-lg-2 col-md-2 col-sm-2');

        $('#process_data_table_filter input').addClass('form-control form-control-sm');


        var date_picker_html = '<div id="date_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"> <i class="fa fa-calendar"> </i>&nbsp; <span> </span> <i class="fa fa-caret-down"></i></div>';

        $('#date-filter').append(date_picker_html);

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {

                $('#date_range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

                var range = start.format("YYYY-MM-DD") + "~" + end.format("YYYY-MM-DD");

                table.columns(4).search(range).draw();

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