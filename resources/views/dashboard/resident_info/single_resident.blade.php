@section('view-resident', 'mm-active')
@include('layouts.header')

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
                            <span class="d-inline-block">Update Resident Information</span>
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
                                        Resident Update
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

                    <form method="post" action="{{route('resident-update')}}" files="true" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include("layouts.includes.flash")

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-right: 0px;">
                                    <h5 class="card-title text-right" style="margin-top: 7px;margin-bottom: 30px;">Resident Catagorey :</h5>
                                </div>
                                <input name="id" value="{{$single_resident->id}}" type="text" hidden>

                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <select class="form-control-sm form-control" data-select1-id="1" tabindex="1" aria-hidden="true" name="resident_cat" id="resident_cat" required>
                                        <?php echo '<option value="' . $single_resident->resident_category . '">' . $single_resident->resident_category . '</option>'; ?>
                                        <option value="Hotel">Hotel</option>
                                        <option value="Motel">Motel</option>
                                        <option value="Resort">Resort</option>
                                        <option value="Guest House">Guest House</option>
                                        <option value="Cottage">Cottage</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <script>
                                        var x = document.getElementById("resident_cat");

                                        for (i = 1; i < x.options.length; i++) {

                                            if (x.options[i].value == '<?php echo $single_resident->resident_category; ?>') {
                                                x.options[i].remove();
                                            }
                                        }
                                    </script>
                                </div>

                                <div class="form-group form-line-height col-lg-3 col-md-12 text-right">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding-right: 0px;">
                                            <h5 class="card-title text-right" style="margin-top: 7px;margin-bottom: 30px;">SMS Rate :</h5>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <?php if (Auth::user()->user_type == 'User') { ?>
                                                <input type="text" name="sms_rate" class="form-control" value="{{$single_resident->sms_rate}}" placeholder="SMS Rate" required disabled>
                                            <?php } else { ?>
                                                <input type="text" name="sms_rate" class="form-control" value="{{$single_resident->sms_rate}}" placeholder="SMS Rate" required>
                                            <?php } ?>
                                        </div>*BDT
                                    </div>
                                </div>
                                <div class="form-group form-line-height col-lg-4 col-md-12 text-right">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 text-right">
                                            <h5 class="card-title text-right" style="margin-top: 7px;margin-bottom: 30px;">Monthly Fee :</h5>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                            <?php if (Auth::user()->user_type == 'User') { ?>
                                                <input type="text" name="monthly_rate" class="form-control" value="{{$single_resident->monthly_rate}}" placeholder="Monthly Fee" required disabled>
                                            <?php } else { ?>
                                                <input type="text" name="monthly_rate" class="form-control" value="{{$single_resident->monthly_rate}}" placeholder="Monthly Fee" required>
                                            <?php } ?>
                                        </div>*BDT
                                    </div>
                                </div>

                            </div>
                            <div id="section">
                                <div class="section">
                                    <h5 class="card-title" style="margin-top: 7px;" id="tourist_no">Enter valid informations</h5>
                                    <div class=" form-row" style="margin-top: 15px;">
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Resident Name <span class="important">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{$single_resident->resident_name}}" placeholder="Resident's Full name" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Zone <span class="important">*</span></label>
                                            <select class="form-control-sm form-control" data-select2-id="2" tabindex="-1" aria-hidden="true" name="zone" id="residentzone" required>
                                                <?php echo '<option value="' . $single_resident->zone . '">' . $single_resident->zone . '</option>'; ?>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                            <script>
                                                var x = document.getElementById("residentzone");

                                                for (i = 1; i < x.options.length; i++) {

                                                    if (x.options[i].value == '<?php echo $single_resident->zone; ?>') {
                                                        x.options[i].remove();
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Address <span class="important">*</span></label>
                                            <input type="text" name="address" class="form-control" value="{{$single_resident->address}}" placeholder="Plot No, Block No, Road No, Holding No" required>
                                            @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Contact No (T&T) <span class="important">*</span></label>
                                            <input type="text" name="tt" class="form-control" value="{{$single_resident->landphone}}" placeholder="T&T (Land) No" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Contact No (Parmanent) <span class="important">*</span></label>
                                            <?php if (Auth::user()->user_type == 'User') { ?>
                                                <input type="text" name="parmanentcell" class="form-control" value="{{$single_resident->permanent_cell}}" placeholder="Parmanent Cell" required disabled>
                                            <?php } else { ?>
                                                <input type="text" name="parmanentcell" class="form-control" value="{{$single_resident->permanent_cell}}" placeholder="Parmanent Cell" required>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Contact No (Manager) <span class="important">*</span></label>
                                            <input type="text" name="managercell" class="form-control" value="{{$single_resident->manager_cell}}" placeholder="Manager Cell " required>
                                            @if ($errors->has('managercell'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('managercell') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Email <span class="important">*</span></label>
                                            <?php if (Auth::user()->user_type == 'User') { ?>
                                                <input type="email" name="email" class="form-control" value="{{$single_resident->email}}" placeholder="Email Address" required>
                                            <?php } else { ?>
                                                <input type="email" name="email" class="form-control" value="{{$single_resident->email}}" placeholder="Email Address" required>
                                            <?php } ?>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">User Name <span class="important">*</span></label>
                                            <input type="text" name="username" class="form-control" value="{{$single_resident->name}}" placeholder="Username">
                                        </div>
                                        <div class="form-group form-line-height col-lg-4 col-md-12">
                                            <label class="input-label">Password <span class="important">*</span></label>
                                            <input type="password" name="password" class="form-control" value="" placeholder="Password">
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
                        <div class="form-row text-center">
                            <div class="offset-5 col-md-2">
                                <div class="position-relative form-group"><input value="Update" id="date" class="btn-wide mb-2 mr-2 mt-3 btn btn-shadow btn-gradient-info btn-lg" type="submit"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')