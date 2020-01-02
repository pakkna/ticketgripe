<script src="{!! asset('master/js/moment-with-locales.min.js') !!}"></script>
<link href="{!! asset('master/css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
<script src="{!! asset('master/js/jquery3.3.1.js') !!}"></script>
<script src="{!! asset('master/js/bootstrap-datetimepicker.min.js') !!}"></script>
<div class="setting-form">
    <form class="form-horizontal" method="post" action="{{ route('/') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-plus mr-2"></i> Add Ticket</h3>
            </div>
            <div class="flash_msg">
            @if(Session::has('UserinfoSuccess'))
                    <div class="alert alert-success alert-dismissible text-center display-10" role="alert">
                        {{ Session::get('UserinfoSuccess') }}
                    </div>
                @endif
                @if(Session::has('userinfoDanger'))
                    <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                        {{ Session::get('userinfoDanger') }}
                    </div>
                @endif
            </div>
            <div class="prsnl-info">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Ticket Type*</label>
                            <input class="payment-input" type="text" name="ticket_type" placeholder="General Admission, VIP Admission" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Quantity*</label>
                            <input class="payment-input" type="number" name="quantity" placeholder="Ticket Quantity" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Ticket Price*</label>
                            <input class="payment-input" data-language="en" type="number" name="price" placeholder="Ticket Price" required>
                            @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Currency*</label>
                            <div class="select-bg">									
                                <select class="payment-input wide custom-list" name="currency">
                                <option value="BDT">BDT</option>
                                    <option value="USD">USD</option>
                                    <option value="CA">CA</option>
                                    <option value="Pound">Pound</option>
                                </select>    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="add-crdt-amnt" align="center">
                            <button id="display-toggle" class="more-option-btn" style="margin-top: 32px;" type="button"><i class="fa fa-cogs" style="margin-right: 11px;"></i>More Options</button>
                        </div>
                    </div>
                    <div class="more-option" style="display: none;">
                        <div class="row">											
                            <div class="col-lg-6 col-md-12">											
                                <div class="select-bg">									
                                    <div class="input-group date" id="id_2">
                                        <span class="date-span">Start selling on  :</span>
                                        <input value="{{ old('start_time') }}"  id="out_datetime" name="start_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                        @if ($errors->has('start_time'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('start_time') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">											
                                <div class="select-bg">									
                                    <div class="input-group date" id="id_3">
                                        <span class="date-span">Sell until  :</span>
                                        <input id="out_datetime" value="{{ old('end_time') }}"  name="end_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                        @if ($errors->has('end_time'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('end_time') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="input-section-item" style="border: 0px solid red;">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="checkbox">
                                        <label class="custom-control-label custom-label" for="customCheck1" style="font-size: 14px;">Show the Sell Until date on the event page.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="input-section-item" style="border: 0px solid red;">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="checkbox">
                                        <label class="custom-control-label custom-label" for="customCheck2" style="font-size: 14px;">Will display with a "Sold out" message after ticket quantity runs out</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="input-section-item" style="border: 0px solid red;">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="checkbox">
                                        <label class="custom-control-label custom-label" for="customCheck3" style="font-size: 14px;">Check to hide this ticket on your Event page and make it available via a direct link only</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Fees</label>
                                    <div class="select-bg">									
                                        <select class="payment-input wide custom-list" name="currency">
                                        <option value="PASS_ALL">Pass all fees to the buyer</option>
                                            <option value="ABSORB_ALL">Absorb Credit Card and Service fees</option>
                                            <option value="ABSORB_MERCHANT">Absorb Credit Card fees only</option>
                                        </select>    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Max. Tickets per Order</label>
                                    <input class="payment-input" data-language="en" type="number" name="max_ticket" placeholder="Max. Tickets per Order">
                                    @if ($errors->has('max_ticket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_ticket') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Min. Tickets per Order</label>
                                    <input class="payment-input" data-language="en" type="number" name="max_ticket_per_order" placeholder="Min. Tickets per Order ">
                                    @if ($errors->has('max_ticket_per_order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_ticket_per_order') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="main-reply-comment" style="padding: 30px 0px;">
                                    <h6 style="font-size: 14px;">Short description</h6>
                                    <textarea class="replt-comnt" name="short_des" placeholder="Short Description"></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12 col-md-12">
                                <div class="main-reply-comment" style="padding: 0px 0px;">
                                    <h6 style="font-size: 14px;">Message After Purchase</h6>
                                    <textarea class="replt-comnt" name="message" placeholder="Additional message to include on the purchased ticket"></textarea>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="add-crdt-amnt">
                    <button class="setting-save-btn" type="submit">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
    $('#id_2').datetimepicker({
        "allowInputToggle": true,
        "showClose": true,
        "showClear": true,
        "showTodayButton": true,
        "format": "MM/DD/YYYY hh:mm:ss A",
    });
    $('#id_3').datetimepicker({
        "allowInputToggle": true,
        "showClose": true,
        "showClear": true,
        "showTodayButton": true,
        "format": "MM/DD/YYYY hh:mm:ss A",
    });
    $("#display-toggle").click(function(){
        $(".more-option").toggle();
    });
});

</script>