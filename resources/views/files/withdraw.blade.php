@include('layouts.master_layout.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

    <div class="dash-tab-links">
        <div class="container">
            <div id="payment" class="full-width">
                <div class="title-align">
                    <div class="about-left-heading custom-header2">
                        <h3>You can setup Your Withdraw Payment Details Here </h3>
                    </div> 
                    <hr> <br>
                    <div class="row">
                        <div class="form-group offset-md-1 col-md-3">
                            <div onclick="openForm('bkash', 'bkash_check')" class="pay_card"><img src="{!! asset('master/images/my-dashboard/bkash.png') !!}">
                                <i id="bkash_check" class="fa fa-check-circle block-icon"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div onclick="openForm('rocket', 'rocket_check')" class="pay_card"><img src="{!! asset('master/images/my-dashboard/roket.png') !!}">
                                <i id="rocket_check" class="fa fa-check-circle block-icon"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div id="defaultOpen" onclick="openForm('bank', 'bank_check')" class="pay_card" style="padding-top: 28px!important;">
                                <img src="{!! asset('master/images/my-dashboard/bank.svg') !!}"> <span>Bank</span>
                                <i id="bank_check" class="fa fa-check-circle block-icon"></i>
                            </div>
                        </div>
                    </div><br>
                </div>
                <hr>
                @include("layouts.includes.flash")
                <div id="bank" class="row payment_padding" style="display:none">
                    <form method="post" action="{{route('WithdrawCredit')}}" class="form-validator5">
                        <div class="row">
                            <div class="form-group col-md-4 ">
                                <div class="about-left-heading custom-header1">
                                    <h3>Bank Account Details</h3>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        {{csrf_field()}}
                               
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Bank Name*</label>
                                <input type="text" name="bank_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Branch Name*</label>
                                <input type="text" name="branch_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Account's Name*</label>
                                <input type="text" name="account_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Account Number*</label>
                                <input type="number" name="account_no" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Amount*</label>
                                <input type="number" name="amount" class="payment-input" id="pwd" min="500" placeholder="Amount" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Currency Type*</label>
                                <select class="payment-input wide custom-list" name="currency" required>
                                    <option value="0">BDT</option>
                                    <option value="1">USD</option>
                                </select>
                            </div>  
                            <input type="hidden" value="Bank" name="payment_type">
                        </div>
                        <div class="row">
                            <div class="offset-md-10 col-md-2">
                                <button type="submit" name="bank" class="btn btn_save add-event"> Send Request </button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <div id="rocket" class="row payment_padding" style="display:none">
                    <form method="post" action="{{route('WithdrawCredit')}}" class="form-validator5">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="about-left-heading custom-header1">
                                    <h3>Dutch Bangla Rocket</h3>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            {{csrf_field()}}
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Account's Name*</label>
                                <input type="text" name="account_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Account Number*</label>
                                <input type="number" name="account_no" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Amount*</label>
                                <input type="number" name="amount" class="payment-input" id="pwd" min="500" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Currency Type*</label>
                                <select class="payment-input wide custom-list" name="currency" required>
                                    <option value="0">BDT</option>
                                    <option value="1">USD</option>
                                </select>
                            </div>  
                            <input type="hidden" value="Rocket" name="payment_type">
                        </div>
                        <div class="row">
                            <div class="offset-md-10 col-md-2">
                                <button type="submit" name="rocket" class="btn btn_save add-event"> Send Request </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="bkash" class="row payment_padding" style="display:none">
                    <form method="post" action="{{route('WithdrawCredit')}}" class="form-validator5">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="about-left-heading custom-header1">
                                    <h3>Brack Bank Bkash</h3>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            {{csrf_field()}}
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Account's Name*</label>
                                <input type="text" name="account_name" class="payment-input" id="pwd" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Account Number*</label>
                                <input type="number" name="account_no" class="payment-input" id="pwd" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Amount*</label>
                                <input type="number" name="amount" class="payment-input" id="pwd" min="500" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Currency Type*</label>
                                <select class="payment-input wide custom-list" name="currency" required>
                                    <option value="0">BDT</option>
                                    <option value="1">USD</option>
                                </select>
                            </div>       
                            <input type="hidden" value="Bkash" name="payment_type">                             
                        </div>
                        <div class="row">
                            <div class="offset-md-10 col-md-2">
                                <button type="submit" name="bkash" class="btn btn_save add-event"> Send Request </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="title-align">
                    <p>**Note: you can withdraw cash only when your balance is minimum 500 Tk. </p>
                </div>
            </div>
            <link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
            <div class="add-event-bg">
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="about-left-heading custom-header2">
                            <h3 style="text-align: center;width: 100%;">Credit withdraw history </h3>
                        </div> 
                        <div class="all-search-events" style="margin-top: 10px;">
                        @include("layouts.includes.flash")								
                            <div class="row">
                                <table id="sponser_table" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th>SL</th>
                                            <th>Payment Type</th>
                                            <th>Bank Name</th>
                                            <th>Account No.</th>
                                            <th>Withdraw Amount</th>
                                            <th>Status</th>
                                            <th>Request Date</th>
                                            <th>Withdraw Date</th>
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
</main>
<!-- Body End -->
@include('layouts.master_layout.footer')
<script>
    function openForm(tabAction, check_icon) {
        var i, tabopen, card;
        tabopen = document.getElementsByClassName("row payment_padding");
        check = document.getElementsByClassName("fa fa-check-circle block-icon");
        for (i = 0; i < tabopen.length; i++) {
            tabopen[i].style.display = "none";
            check[i].style.display = "none";

        }
        card = document.getElementsByClassName("pay_card");
        for (i = 0; i < card.length; i++) {
            card[i].style.backgroundColor = "";
        }
        document.getElementById(tabAction).style.display = "block";

        document.getElementById(check_icon).style.display = 'block';
    }

    document.getElementById("defaultOpen").click();
</script>
<script src="{!! asset('master/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('master/js/dataTables.bootstrap4.min.js') !!}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


<script type="text/javascript">
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $( document ).ready(function() {

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

                    url: '{{route("withdraw-status")}}',

                    type: 'POST',
                    cache: false,

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

                        data: 'payment_type',

                        name: 'payment_type',

                        searchable: true,

                    },
                    {

                        data: 'bank_name',

                        name: 'bank_name',

                        searchable: true,
                        render: function(data, type, row) {
                            if (data == null) {
                                return '----';
                            }else{
                            return data ;
                            }
                        }

                    },
                    {

                        data: 'account_number',

                        name: 'account_number',

                        searchable: true

                    },
                    {

                        data: 'withdraw_amount',

                        name: 'withdraw_amount',

                        searchable: true

                    },
                    {

                        data: 'status',

                        name: 'status',

                        searchable: true,
                        render: function(data, type, row) {

                            if (row.status == 0) {
                                return '<div class="badge badge-pill badge-info"> Pending </div>';                                
                            }else if(row.status == 1){
                                return '<div class="badge badge-pill badge-success"> Success </div>';                           
                            }else{
                                return '<div class="badge badge-pill badge-danger"> Cancelled </div>';
                            }
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

                        data: 'withdraw_at',

                        name: 'withdraw_at',

                        searchable: false,

                        render: function(data, type, row) {
                            if (row.withdraw_at == null) {
                                return '----';                                
                            }else{
                            return moment(row.withdraw_at).format("MMMM Do YYYY, h:mm:ss A");
                            }
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
        $("#sponser_table_wrapper").css('padding', '10px');


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
