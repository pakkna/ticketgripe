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
                            <span class="d-inline-block">Manage Your User Profile</span>
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
                                        Add User
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
            <div class="offset-1 col-md-10">
                <div class="main-card mb-3 card">

                    <div class="card-body ">
                        <form method="post" action="{{route('user-create')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include("layouts.includes.flash")
                            <div class="form-row">
                                <div class="offset-4 col-md-4 text-center ">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><i class="fa fa-edit fads"></i></label>

                                        </div>
                                        <div class="avatar-preview story">
                                            <div id="imagePreview" style="background-image: url('{!! asset('assets/images/avatars/user_image.jpg') !!}'); background-size: contain;">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                                                    $('#imagePreview').hide();
                                                    $('#imagePreview').fadeIn(650);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#imageUpload").change(function() {
                                            readURL(this);
                                        });
                                    </script>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                           {{-- <div class="form-row text-center">
                                <label for="twitter" class="">User Permission :</label>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="sitemap" value="1" id="exampleCustomCheckbox1" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;Site Map</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="media_center" value="1" id="exampleCustomCheckbox2" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;Media Center</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="student_forum" value="1" id="exampleCustomCheckbox3" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;Student Forum</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="nasa_app" value="1" id="exampleCustomCheckbox4" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox4">&nbsp;Nasa App</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="user_management" value="1" id="exampleCustomCheckbox5" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox5">&nbsp;User Management</label>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="name" class="">Name</label>
                                        <input name="name" id="name" placeholder="Enter Name" type="text" class="form-control" required></div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="email" class="">Email</label>
                                        <input name="email" id="email" placeholder=" Enter Email"  type="email" class="form-control" required></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="twitter" class="">Mobile</label>
                                        <input name="mobile" id="mobile" placeholder="Enter Mobile"  type="text" class="form-control" required></div>
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="password" class="">Password </label>
                                        <input name="password" id="password" placeholder="Enter Password" type=password value="" class="form-control" required></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-row text-center">
                            <div class="offset-5 col-md-2">
                                <div class="position-relative form-group"><input value="Add User" id="date" class="btn-wide mb-2 mr-2 mt-3 btn btn-shadow btn-gradient-success btn-lg" type="submit"></div>
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