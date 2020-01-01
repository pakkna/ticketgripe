@include('layouts.master_layout.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <div id="bank" class="row payment_padding" style="display:none">
                    <form method="post" action="{{route('/')}}">
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
                                <label class="label_sell" for="pwd">Bank Name</label>
                                <input type="text" name="bank_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Branch Name</label>
                                <input type="text" name="branch_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Account's Name</label>
                                <input type="text" name="account_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Account Number</label>
                                <input type="number" name="account_no" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label_sell" for="pwd">Amount</label>
                                <input type="number" name="amount" class="payment-input" id="pwd" placeholder="Amount" required>
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
                    <form method="post" action="{{route('/')}}">
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
                                <label class="label_sell" for="pwd">Account's Name</label>
                                <input type="text" name="account_name" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Account Number</label>
                                <input type="number" name="account_no" class="payment-input" id="pwd" value="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="label_sell" for="pwd">Amount</label>
                                <input type="number" name="amount" class="payment-input" id="pwd" required>
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
                    <form method="post" action="{{route('/')}}">
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
                                <input type="number" name="amount" class="payment-input" id="pwd" required>
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