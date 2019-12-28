
@include('layouts.header')

@include('layouts.sidebar')

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
                            <span class="d-inline-block">Single Guest Details</span>
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
                                        Guest Informaion
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

                    <div class="card-body ">
                        <div id="section">
                            <div class="section">
                                <h5 class="card-title" style="margin-top: 7px;" id="tourist_no">Tourist Information</h5>

                                <div class=" form-row" style="margin-top: 15px;">
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Tourist Type <span class="important">*</span></label>
                                        <select class="form-control-sm form-control" name="guest_type" id="guest_type" data-select1-id="1" tabindex="1" aria-hidden="true" required>
                                            <?php echo '<option value="' . $guest_data->guest_type . '">' . $guest_data->guest_type . ' Entry</option>'; ?>

                                        </select>

                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="input-group date" id="id_0">
                                            <label class="input-label">Check In <span class="important">*</span></label>
                                            <div style="display: flex;width: 100%;">
                                                <input id="in_datetime" name="check_in" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($guest_data->check_in)}}" required>
                                                <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-left: 0;">
                                        <div class="input-group date" id="id_1">
                                            <label class="input-label">Check Out <span class="important">*</span></label>
                                            <div style="display: flex;width: 100%;">
                                                <input id="out_datetime" name="check_out" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($guest_data->check_out)}}" required>
                                                <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class=" form-row">
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Name <span class="important">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{$guest_data->name}}" placeholder="Guest's Full name" required>
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Guest Category <span class="important">*</span></label>
                                        <select class="form-control-sm form-control" id="guest_category" data-select2-id="2" tabindex="-1" aria-hidden="true" name="guest_cat" required>
                                            <?php echo '<option value="' . $guest_data->guest_category . '">' . $guest_data->guest_category . '</option>'; ?>

                                        </select>

                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Contact-No <span class="important">*</span></label>
                                        <input type="text" name="contact" class="form-control" value="{{$guest_data->contact_no}}" placeholder="Contact Number" required>
                                    </div>
                                </div>

                                <div class=" form-row">
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Profession <span class="important">*</span></label>
                                        <input type="text" name="profession" class="form-control" value="{{$guest_data->profession}}" placeholder="Guest's Profession" required>
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Address <span class="important">*</span></label>
                                        <input type="text" name="address" class="form-control" value="{{$guest_data->address}}" placeholder="Country & State/Distric & Thana" required>
                                    </div>

                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Document ID <span class="important">*</span></label>
                                        <input type="text" name="document" class="form-control" value="{{$guest_data->document_no}}" placeholder="Passport ID/National ID" required>
                                    </div>
                                </div>

                                <div class="form-row show" id="shove" style="display: none;">
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Type of Visa <span class="important">*</span></label>
                                        <input id="visa_type" type="text" name="visa_type" class="form-control" value="{{$guest_data->type_of_visa}}" placeholder="Type of Visa">
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Purpose of Visit <span class="important">*</span></label>
                                        <input id="visa_type" type="text" name="purpose_visit" class="form-control" value="{{$guest_data->purpose_of_visit}}" placeholder="Purpose of Visit">
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Guide name</label>
                                        <input id="visa_type" type="text" name="guide_name" class="form-control" value="{{$guest_data->guide_name}}" placeholder="Guide name">
                                    </div>
                                </div>
                                <?php if ($guest_data->guest_category == 'Foreigner') { ?>
                                    <script>
                                        document.getElementById("shove").style.display = "flex";
                                    </script>
                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="section">
                            <div class="section">
                                <h5 class="card-title" style="margin-top: 7px;" id="tourist_no">Rsident Information</h5>
                                <div class=" form-row" style="margin-top: 15px;">
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Resident Name <span class="important">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{$guest_data->resident_name}}" placeholder="Resident's Full name" required>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Zone <span class="important">*</span></label>
                                        <select class="form-control-sm form-control" data-select2-id="2" tabindex="-1" aria-hidden="true" name="zone" id="residentzone" required>
                                            <?php echo '<option value="' . $guest_data->zone . '">' . $guest_data->zone . '</option>'; ?>
                                        </select>
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Address <span class="important">*</span></label>
                                        <input type="text" name="address" class="form-control" value="{{$guest_data->resident_address}}" placeholder="Plot No, Block No, Road No, Holding No" required>
                                        @if ($errors->has('resident_address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('resident_address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class=" form-row">
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Contact No (T&T) <span class="important">*</span></label>
                                        <input type="text" name="tt" class="form-control" value="{{$guest_data->landphone}}" placeholder="T&T (Land) No" required>
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Contact No (Parmanent) <span class="important">*</span></label>
                                        <?php if (Auth::user()->user_type == 'User') { ?>
                                            <input type="text" name="parmanentcell" class="form-control" value="{{$guest_data->permanent_cell}}" placeholder="Parmanent Cell" required disabled>
                                        <?php } else { ?>
                                            <input type="text" name="parmanentcell" class="form-control" value="{{$guest_data->permanent_cell}}" placeholder="Parmanent Cell" required>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group form-line-height col-lg-4 col-md-12">
                                        <label class="input-label">Contact No (Manager) <span class="important">*</span></label>
                                        <input type="text" name="managercell" class="form-control" value="{{$guest_data->manager_cell}}" placeholder="Manager Cell " required>
                                        @if ($errors->has('managercell'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('managercell') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class=" form-row">
                                    <div class="form-group form-line-height col-lg-3 col-md-12">
                                        <label class="input-label">Email <span class="important">*</span></label>
                                        <?php if (Auth::user()->user_type == 'User') { ?>
                                            <input type="email" name="email" class="form-control" value="{{$guest_data->email}}" placeholder="Email Address" required disabled>
                                        <?php } else { ?>
                                            <input type="email" name="email" class="form-control" value="{{$guest_data->email}}" placeholder="Email Address" required>
                                        <?php } ?>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group form-line-height col-lg-3 col-md-12">
                                        <label class="input-label">Resident Catagorey <span class="important">*</span></label>
                                        <select class="form-control-sm form-control" data-select1-id="1" tabindex="1" aria-hidden="true" name="resident_cat" id="resident_cat" required>
                                            <?php echo '<option value="' . $guest_data->resident_category . '">' . $guest_data->resident_category . '</option>'; ?>
                                        </select>
                                    </div>
                                    <div class="form-group form-line-height col-lg-3 col-md-12">
                                        <label class="input-label">SMS Rate <span class="important">*</span></label>
                                        <input type="text" name="sms_rate" class="form-control" value="{{$guest_data->sms_rate}}" placeholder="SMS Rate" required>
                                    </div>
                                    <div class="form-group form-line-height col-lg-3 col-md-12">
                                        <label class="input-label">Monthly Fee <span class="important">*</span></label>
                                        <input type="text" name="monthly_rate" class="form-control" value="{{$guest_data->monthly_rate}}" placeholder="Monthly Fee" required>
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

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">