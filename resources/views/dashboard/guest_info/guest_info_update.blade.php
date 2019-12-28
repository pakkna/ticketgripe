@include('layouts.header')

@include('layouts.sidebar')

<!-- Dashboard Header  section -->
<script>
    function change(id, the) {
        var vv = document.getElementById(id);
        var aa = $(the).val();

        if (aa == "Foreigner") {
            vv.style.display = "flex";
        } else {
            vv.style.display = "none";
            var show = document.querySelectorAll('[id="visa_type"]');

            for (var i = 0; i < show.length; i++) {
                show[i].value = "";
            }
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
                            <span class="d-inline-block">Update Guest Entry</span>
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
                                        Guest Informaion Update
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

                    <form method="post" action="{{route('guest-info-update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include("layouts.includes.flash")

                        <input type="text" name="id" value="{{$guest_data->id}}" hidden>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <h5 class="card-title" style="margin-top: 7px;margin-bottom: 30px;">Tourist Type :</h5>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <select class="form-control-sm form-control" name="guest_type" id="guest_type" data-select1-id="1" tabindex="1" aria-hidden="true" required>
                                        <?php echo '<option value="' . $guest_data->guest_type . '">' . $guest_data->guest_type . ' Entry</option>'; ?>
                                        <option value="Single">Single Entry</option>
                                        <option value="Couple">Couple Entry</option>
                                        <option value="Group">Group Entry</option>
                                        <option value="Family">Family Entry</option>
                                        <option value="Corporate">Corporate Entry</option>
                                    </select>

                                    <script>
                                        var x = document.getElementById("guest_type");

                                        for (i = 1; i < x.options.length; i++) {

                                            if (x.options[i].value == '<?php echo $guest_data->guest_type; ?>') {
                                                x.options[i].remove();

                                            }
                                        }
                                    </script>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group date" id="id_0">
                                        <span style="margin-right:5px;margin-top: 4px;">Check In :</span>
                                        <input id="in_datetime" name="check_in" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($guest_data->check_in)}}" required>
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
                                        <input id="out_datetime" name="check_out" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($guest_data->check_out)}}" required>
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
                                            <input type="text" name="name" class="form-control" value="{{$guest_data->name}}" placeholder="Guest's Full name" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Guest Category <span class="important">*</span></label>
                                            <select class="form-control-sm form-control" id="guest_category" data-select2-id="2" tabindex="-1" aria-hidden="true" name="guest_cat" required>
                                                <?php echo '<option value="' . $guest_data->guest_category . '">' . $guest_data->guest_category . '</option>'; ?>
                                                <option value="Domestic">Domestic</option>
                                                <option value="Foreigner">Foreigner</option>
                                                <option value="VIP">VIP</option>
                                            </select>

                                            <script>
                                                var x = document.getElementById("guest_category");

                                                for (i = 1; i < x.options.length; i++) {

                                                    if (x.options[i].value == '<?php echo $guest_data->guest_category; ?>') {
                                                        x.options[i].remove();
                                                    }
                                                }
                                            </script>

                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Contact-No <span class="important">*</span></label>
                                            <input type="text" name="contact" class="form-control" value="{{$guest_data->contact_no}}" placeholder="Contact Number" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Guest Age<span class="important">*</span></label>
                                            <input type="text" name="age" class="form-control" value="{{$guest_data->age}}" placeholder="Guest Age" required>
                                        </div>
                                    </div>

                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Profession <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$guest_data->profession}}" placeholder="Guest's Profession" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Address <span class="important">*</span></label>
                                            <input type="text" name="address" class="form-control" value="{{$guest_data->address}}" placeholder="Country & State/Distric & Thana" required>
                                        </div>

                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Document ID <span class="important">*</span></label>
                                            <input type="text" name="document" class="form-control" value="{{$guest_data->document_no}}" placeholder="Passport ID/National ID" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Note<span class="important">*</span></label>
                                            <input type="text" name="note" class="form-control" value="{{$guest_data->note}}" placeholder="Extra Details(not mandatory)" required>
                                        </div>
                                    </div>

                                    <div class="form-row show" id="shove" style="display: none;">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Type of Visa <span class="important">*</span></label>
                                            <input id="visa_type" type="text" name="visa_type" class="form-control" value="{{$guest_data->type_of_visa}}" placeholder="Type of Visa">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Purpose of Visit <span class="important">*</span></label>
                                            <input id="visa_type" type="text" name="purpose_visit" class="form-control" value="{{$guest_data->purpose_of_visit}}" placeholder="Purpose of Visit">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Guide name</label>
                                            <input id="visa_type" type="text" name="guide_name" class="form-control" value="{{$guest_data->guide_name}}" placeholder="Guide name">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Country<span class="important">*</span></label>
                                            <input type="text" name="country" class="form-control" value="{{$guest_data->country}}" placeholder="Guest Country">
                                        </div>
                                    </div>
                                    <?php if ($guest_data->guest_category == 'Foreigner') { ?>
                                        <script>
                                            document.getElementById("shove").style.display = "flex";
                                        </script>
                                    <?php } ?>

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

                        <div class="form-row text-center">
                            <div class="offset-4 col-md-4">
                                <div class="position-relative form-group" id="submit_button">
                                    <input value="Update" id="date" class="btn-wide mb-2 mr-2 mt-3 btn btn-shadow btn-gradient-success btn-lg" type="submit"></div>
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
</script>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">