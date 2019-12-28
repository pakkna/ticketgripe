
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
                            <span class="d-inline-block">Manage Your Profile Information</span>
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
                                        Profile update
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
                        <h5 class="card-title">Update GYour Profile</h5>
                        <form method="post" action="{{route('save-modify-data')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include("layouts.includes.flash")
                            <div class="form-row">
                                <div class="offset-4 col-md-4 text-center">
                                    <label for="title" class="card-title">Change Profile Picture</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><i class="fa fa-edit fads"></i></label>

                                        </div>
                                        <div class="avatar-preview story">
                                            <div id="imagePreview" style="background-image: url('{!! asset('assets/images/avatars') !!}/{{ $data->image }}'); background-size: contain;">
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
                            </div>

                            <div class="form-row text-center">
                                <label for="twitter" class="">User Permission :</label>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div  class="custom-checkbox custom-control">
                                            <input  onchange="change(this);" <?php if($data->sitemap){echo 'checked="checked" value="1" ';} else {echo 'value="0"';}?>   type="checkbox" name="sitemap" id="exampleCustomCheckbox1" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox1">&nbsp;Site Map</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input onchange="change(this);" <?php if($data->media_center){echo 'checked="checked" value="1" ';} else {echo 'value="0"';}?>  type="checkbox" name="media_center" id="exampleCustomCheckbox2" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox2">&nbsp;Media Center</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input onchange="change(this);" <?php if($data->student_forum){echo 'checked="checked" value="1" ';} else {echo 'value="0"';}?>  type="checkbox" name="student_forum"  id="exampleCustomCheckbox3" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;Student Forum</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input onchange="change(this);" <?php if($data->nasa_app){echo 'checked="checked" value="1" ';} else {echo 'value="0"';}?> type="checkbox" name="nasa_app" id="exampleCustomCheckbox4" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox4">&nbsp;Nasa App</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input onchange="change(this);" <?php if($data->user_management){echo 'checked="checked" value="1" ';} else {echo 'value="0"';}?>  type="checkbox" name="user_management" id="exampleCustomCheckbox5" class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox5">&nbsp;User Management</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="name" class="">Name</label>
                                        <input name="name" id="email" placeholder="name" value="{{ $data->name }}" type="text" class="form-control" required></div>

                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="email" class="">Email</label>
                                        <input name="email" id="email" placeholder=" email" value="{{ $data->email }}" type="email" class="form-control" disabled></div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="twitter" class="">Mobile</label>
                                        <input name="mobile" id="mobile" placeholder="Mobile" value="{{ $data->mobile }}" type="text" class="form-control" required></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="password" class="">Password (If not to change leave it blank)</label>
                                        <input name="password" id="password" placeholder="Password" type=password value="" class="form-control" ></div>
                                </div>

                            </div>
                            <div class="form-row text-center">
                                <input name="id"  value="{{ $data->id }}" type="text"  hidden></div>
                            <div class="offset-5 col-md-2">
                                <div class="position-relative form-group"><input value="Update" id="date" class="btn-wide mb-2 mr-2 mt-3 btn btn-shadow btn-gradient-success btn-lg" type="submit"></div>
                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $('#exampleCustomCheckbox1').on('change', function(){
        $('#exampleCustomCheckbox1').val(this.checked ? 1 : 0);
    });

    $('#exampleCustomCheckbox2').on('change', function(){
        $('#exampleCustomCheckbox2').val(this.checked ? 1 : 0);
    });

    $('#exampleCustomCheckbox3').on('change', function(){
        $('#exampleCustomCheckbox3').val(this.checked ? 1 : 0);
    });

    $('#exampleCustomCheckbox4').on('change', function(){
        $('#exampleCustomCheckbox4').val(this.checked ? 1 : 0);
    });
    $('#exampleCustomCheckbox5').on('change', function(){
        $('#exampleCustomCheckbox5').val(this.checked ? 1 : 0);
    });



</script>

</div>

@include('layouts.footer')