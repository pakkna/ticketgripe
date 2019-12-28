@section('guest-entry', 'mm-active')
@include('layouts.header')

@include('layouts.sidebar')

<!-- Dashboard Header  section -->
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    });

    function otp_send1() {


        var contact = $("#leader_contact").val();

        swal({
                title: "Are You Sure To Send OTP ?",
                text: contact + " Received A OTP Code ",
                icon: "warning",
                buttons: ["Cancel", "Yes"],
                SuccessMode: true,
            })
            .then((willSuccess) => {

                if (willSuccess) {


                    if (contact.match(/^-{0,1}\d+$/) && contact.length == 11) {

                        $.ajax({

                            url: 'send-otp',
                            type: 'post',
                            data: {
                                contact: contact

                            },
                            dataType: 'json',
                            success: function(response) {

                                if (response == true) {
                                    swal("Otp Send Successfully", {
                                        icon: "success",
                                    });

                                    var ele = document.getElementById('submit_button');

                                    ele.innerHTML = '<p class="input-label">Note: Please Enter Valid OTP And Submit Guest Entry.</p><input type="text" id="otp" name="otp" onkeyup="otp_verify(this)" class="form-control" value="" placeholder="6 Digit OTP / 125465" required><button onclick="resend_otp()" id="resend" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm"> <i class="fas fa-send"></i> Resend OTP</button><div id="result"><div>';

                                } else {
                                    swal("Otp Not Send ! Try Again", {
                                        icon: "error",
                                    });
                                }
                            }

                        });

                    } else {

                        swal("Please Check Your Mobile Number");
                    }

                } else {
                    swal("Before Send Insure the Mobile Number");
                }
            });
        $(".swal-text").css('color', '#B40000');
        $(".swal-text").css('font-weight', '600');
        $(".swal-title").css('font-size', '18px');
        $(".swal-button--confirm").css('background', '#298957');
        $(".swal-button--confirm").css('color', '#fff');
        $(".swal-button--cancel").css('background', '#D53C61');
        $(".swal-button--cancel").css('color', '#fff');


        /* background - image: linear - gradient(140 deg, #298957 -30%, # 3 ac47d 90 % ); */
    }

    function change(id, the) {
        var vv = document.getElementById(id);
        var aa = $(the).val();

        if (aa == "Foreigner") {
            vv.style.display = "flex";
        } else {
            vv.style.display = "none";
        }
    }

    function resend_otp() {

        var ele = document.getElementById('submit_button');

        ele.innerHTML = '<p class="input-label">(Leader-Contact-No To Send OTP To Verify Guest Identity)</p><input type="text" id="leader_contact" onkeyup="check_mobile_input()" class="form-control" value="" placeholder="Leader-Mobile-No / 01700000512" required><button id="otp_send" onclick="otp_send1()" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm" disabled> <i class="fas fa-send"></i> Send OTP</button><button onclick="submit_otp()" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm"> <i class="fa fa-envelope-o"></i> Submit OTP</button>';
    }

    function submit_otp() {

        var ele = document.getElementById('submit_button');

        ele.innerHTML = '<p class="input-label">Note: Please Enter Valid OTP And Submit Guest Entry.</p><input type="text" id="otp" name="otp" onkeyup="otp_verify(this)" class="form-control" value="" placeholder="6 Digit OTP / 125465" required><button onclick="resend_otp()" id="resend" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm"> <i class="fas fa-send"></i> Resend OTP</button><div id="result"><div>';
    }

    function skip_otp() {
        var ele = document.getElementById('submit_button');

        ele.innerHTML = '<button type="submit" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-lg"> <i class="fa fa-share-square-o"> </i> Guest Submit</button>';
    }

    function check_mobile_input() {

        var contact = $("#leader_contact").val();

        if (contact.match(/^-{0,1}\d+$/) && contact.length == 11) {
            $("#otp_send").attr("disabled", false);
        } else {
            $("#otp_send").attr("disabled", true);
        }
    }
</script>
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
                            <span class="d-inline-block">Add New Guest Entry</span>
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
                                        Guest Entry
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" data-placement="left" class="btn btn-dark" title="" data-original-title="Show a Toastr Notification!">
                        <i class="fa fa-battery-three-quarters"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Row section -->
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <form method="post" action="{{route('guest-store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include("layouts.includes.flash")

                        <div class="card-body ">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <h5 class="card-title" style="margin-top: 7px;margin-bottom: 30px;">Select Tourist Type :</h5>

                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <select class="form-control-sm form-control" name="guest_type" id="guest_type" data-select1-id="1" tabindex="1" aria-hidden="true" required>
                                        <option value="Single">Single Entry</option>
                                        <option value="Couple">Couple Entry</option>
                                        <option value="Group">Group Entry</option>
                                        <option value="Family">Family Entry</option>
                                        <option value="Corporate">Corporate Entry</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group date" id="id_0">
                                        <span style="margin-right:5px;margin-top: 4px;">Check In :</span>
                                        <input id="in_datetime" name="check_in" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-left: 0;">
                                    <div class="input-group date" id="id_1">
                                        <span style="margin-right:5px;margin-top: 4px;">Check Out :</span>
                                        <input id="out_datetime" name="check_out" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="section">
                                <div class="section">
                                    <h5 class="card-title" style="margin-top: 7px;" id="tourist_no">Tourist NO : #1</h5>
                                    <div class=" form-row" style="margin-top: 15px;">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Name <span class="important">*</span></label>
                                            <input type="text" name="name[]" class="form-control" value="" placeholder="Guest's Full name" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Guest Category <span class="important">*</span></label>
                                            <select class="form-control-sm form-control" id="guest_category" data-select2-id="2" tabindex="-1" aria-hidden="true" name="guest_cat[]" required>
                                                <option value="Domestic">Domestic</option>
                                                <option value="Foreigner">Foreigner</option>
                                                <option value="VIP">VIP</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Contact-No <span class="important">*</span></label>
                                            <input type="text" name="contact[]" class="form-control" value="" placeholder="Contact Number" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Guest Age <span class="important">*</span></label>
                                            <input type="text" name="age[]" class="form-control" value="" placeholder="Guest Age" required>
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Profession <span class="important">*</span></label>
                                            <input type="text" name="profession[]" class="form-control" value="" placeholder="Guest's Profession" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Address <span class="important">*</span></label>
                                            <input type="text" name="address[]" class="form-control" value="" placeholder="Guest Full Address" required>
                                        </div>

                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Document ID <span class="important">*</span></label>
                                            <input type="text" name="document[]" class="form-control" value="" placeholder="Passport ID/National ID" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Note <span class="important">*</span></label>
                                            <input type="text" name="note[]" class="form-control" value="" placeholder="Extra details (not mandatory)">
                                        </div>
                                    </div>

                                    <div class="form-row show" style="display: none;">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Type of Visa <span class="important">*</span></label>
                                            <input type="text" name="visa_type[]" class="form-control" value="" placeholder="Type of Visa">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Purpose of Visit <span class="important">*</span></label>
                                            <input type="text" name="purpose_visit[]" class="form-control" value="" placeholder="Purpose of Visit">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Guide name</label>
                                            <input type="text" name="guide_name[]" class="form-control" value="" placeholder="Guide name">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Country</label>
                                            <input type="text" name="country[]" class="form-control" value="" placeholder="Country Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group form-line-height">
                                        <label for="Description" class="card-header ">NOTE </label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Keep Note Here for Search Register Book"></textarea>
                                        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                        <script>
                                            CKEDITOR.replace('description');
                                        </script>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="position-relative form-group">
                            <button id="addForm" type="button" class="btn-wide mb-1 ml-5 mt-1 btn btn-shadow btn-gradient-success btn-sm"> <i class="fas fa-plus"></i> Add Guest</button>
                        </div>
                        <script src="{!! asset('js/sweetalert.min.js') !!}"></script>
                        <script>
                            function otp_verify(e) {

                                var otp = e.value;

                                $.ajax({

                                    url: 'verify-otp',
                                    type: 'post',
                                    data: {
                                        otp: otp
                                    },
                                    dataType: 'json',
                                    success: function(response) {

                                        var ele = document.getElementById('result');

                                        if (response == true) {

                                            $("#otp").hide();
                                            $("#resend").remove();

                                            ele.innerHTML = '<button type="submit" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-lg"> <i class="fa fa-share-square-o"> </i> Guest Submit</button>';

                                        } else {
                                            ele.innerHTML = '<p class="mt-2">OTP Do Not Matched ! </p>';
                                        }
                                    }

                                });

                            }
                        </script>

                        <div class="form-row text-center">
                            <div class="offset-4 col-md-4">
                                <div class="position-relative form-group" id="submit_button">

                                    <p class="input-label">(Leader-Contact-No To Send OTP To Verify Guest Identity)</p>
                                    <input type="text" id="leader_contact" onkeyup="check_mobile_input()" class="form-control" value="" placeholder="Leader-Mobile-No / 01700000512" required>
                                    <button id="otp_send" onclick="otp_send1()" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm" disabled> <i class="fas fa-send"></i> Send OTP</button>

                                    <button onclick="submit_otp()" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm"> <i class="fa fa-envelope-o"></i> Submit OTP</button>

                                    <button onclick="skip_otp()" type="button" class="btn-wide mb-1 ml-1 mt-2 btn btn-shadow btn-gradient-primary btn-sm"> <i class="fa fa-forward"></i> Skip OTP</button>



                                    <!--  <input value="Submit" id="date" class="btn-wide mb-2 mr-2 mt-3 btn btn-shadow btn-gradient-info btn-lg" type="submit"></div> -->
                                </div>
                            </div>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

</div>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#id_0').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "MM/DD/YYYY hh:mm:ss A",
        });
        $('#id_1').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "MM/DD/YYYY hh:mm:ss A",
        });

    })
</script>

<script>
    $(document).ready(function() {

        var guest_cat = document.querySelectorAll('[id="guest_category"]');
        var show = document.querySelectorAll('[class="form-row show"]');

        for (var i = 0; i < guest_cat.length; i++) {
            guest_cat[i].setAttribute("onchange", "change(" + i + ",this)");
            show[i].setAttribute("id", i);

        }

    });


    $("#addForm").click(function() {
        var section = document.getElementById("section").innerHTML;

        $("#section").after(section);

        var elements = document.querySelectorAll('[id="tourist_no"]');

        for (var i = 0; i < elements.length; i++) {
            elements[i].innerHTML = "Tourist NO : #" + (i + 1);
        }

        var guest_cat = document.querySelectorAll('[id="guest_category"]');
        var show = document.querySelectorAll('[class="form-row show"]');

        for (var i = 0; i < guest_cat.length; i++) {
            guest_cat[i].setAttribute("onchange", "change(" + i + ",this)");
            show[i].setAttribute("id", i);

        }

        var InnerButton = '<button id="remove" type="button" class="btn-wide mb-1 ml-3 mt-1 btn btn-shadow btn-gradient-danger btn-sm"> <i class="fas fa-close"></i> Romove Guest</button>';

        btn = document.getElementById('remove');
        if (btn == undefined) {
            $("#addForm").after(InnerButton);

            $("#remove").click(function() {

                if ($(".section").length != 1) {

                    $(".section").last().remove();

                    if ($(".section").length == 1) {
                        $("#remove").remove();
                    }
                    //
                }


            });
        }

    });
</script>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">