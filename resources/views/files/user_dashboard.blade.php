@include('layouts.master_layout.header')
    <div class="dash-tab-links">
        <div class="container" style="max-width: 1368px !important;">
            <div class="setting-page mb-20">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="user-data full-width">
                            <div class="categories-left-heading">
                                <h3>Your Details</h3>
                            </div>
                            <div class="categories-items">
                                <a id="personal-info" onclick="openForm(0,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-sitemap mr-2" aria-hidden="true"></i>Personal Info</a>
                                <a id="profile" onclick="openForm(1,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fa fa-user-alt"></i>Profile</a>
                                <a id="email" onclick="openForm(2,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fa fa-envelope-open"></i>Email Setting</a>
                                <a id="passsword" onclick="openForm(3,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fa fa-cogs"></i>Change Password</a>
                            </div>
                        </div>
                    </div>
                    <div id="0" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        <div class="setting-form">
                            <form class="form-horizontal" method="post" action="{{ route('BasicInfo') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="user-data full-width">
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
                                    <div class="about-left-heading">
                                        <h3>Personal Info</h3>
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>User Name*</label>
                                                    <input class="payment-input" type="text" name="username" value="{{ Auth::user()->username}}" placeholder="User Name" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Full Name*</label>
                                                    <input class="payment-input" data-language="en" type="text" name="fullname" placeholder="Full Name" value="{{ Auth::user()->fullname }}" required>
                                                    @if ($errors->has('fullname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('fullname') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Email Address*</label>
                                                    <input class="payment-input" type="email" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}" required disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Phone Number*</label>
                                                    <input class="payment-input" type="tel" name="mobile" placeholder="017xxxxxxxx" value="{{ Auth::user()->mobile }}">
                                                    @if ($errors->has('mobile'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('mobile') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                    <label>Country*</label>
                                                    <input class="payment-input" data-language="en" type="text" name="country" placeholder="Country" value="{{ Auth::user()->country }}">
                                                    @if ($errors->has('country'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('country') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Organaization*</label>
                                                    <input class="payment-input" data-language="en" type="text" name="organaization" placeholder="Organaization" value="{{ Auth::user()->organization }}">
                                                    @if ($errors->has('organaization'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('organaization') }}</strong>
                                                    </span>
                                                    @endif
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
                    </div>
                    <div id="1" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        <div class="setting-form">
                            <form class="form-horizontal" method="post" action="{{route('UserAvatarCng')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="user-data full-width">
                                    @if(Session::has('UseravatarSuccess'))
                                            <div class="alert alert-success alert-dismissible text-center display-10" role="alert">
                                                {{ Session::get('UseravatarSuccess') }}
                                            </div>
                                        @endif
                                        @if(Session::has('UseravatarDanger'))
                                            <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                                                {{ Session::get('UseravatarDanger') }}
                                            </div>
                                        @endif                                    <div class="about-left-heading">
                                        <h3>Profile</h3>										
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">										
                                                <script src="{!! asset('master/js/jquery.min.js') !!}"></script>
                                                <div class="form-group">
                                                    <label class="avatar-label">Avatar*</label>
                                                    @if(Auth::user()->image == null)
                                                    <img class="setting-dp avatar-img" id="image0Preview" src="{!!asset('master/images/event-view/unknown.png')!!}">
                                                    @else
                                                    <img class="setting-dp avatar-img" id="image0Preview" src="{!!asset(Auth::user()->image)!!}">
                                                        </img>
                                                    @endif
                                                    </div>														
                                                    <div class="setting-upload">
                                                        <span>Upload a new avatar.</span>
                                                        <div class="addpic" id="OpenImgUpload">
                                                            <input type="file" id="avatar_img" name="avatar" accept=".png, .jpg, .jpeg">
                                                            <label for="avatar_img">Choose File</label>
                                                            <p>JPEG / PNG 150x150*</p>
                                                        </div>
                                                        @if ($errors->has('avatar'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('avatar') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <script>
                                                        function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function(e) {
                                                                    $('#image0Preview').attr('src', e.target.result);
                                                                    $('#image0Preview').hide();
                                                                    $('#image0Preview').fadeIn(650);
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                        $("#avatar_img").change(function() {
                                                            readURL(this);
                                                        });
                                                    </script>
                                                </div>
                                                <div class="form-group">
                                                    <label>Background*</label>
                                                    @if(Auth::user()->cover_pic == null)
                                                    <img class="event-add-img1 event-feature-img" id="imagePreview1" src="{!!asset('master/images/event-view/my-bg.jpg')!!}">
                                                    @else
                                                    <img class="event-add-img1 event-feature-img" id="imagePreview1" src="{!!asset(Auth::user()->cover_pic)!!}">
                                                        </img>
                                                        @endif
                                                    </div>
                                                    <div class="setting-upload">
                                                        <span>Upload a new background.</span>
                                                        <div class="addpic" id="OpenImgUpload1">
                                                            <input type="file" id="avatar_bg" name="avatar_bg" accept=".png, .jpg, .jpeg">
                                                            <label for="avatar_bg">Choose File</label>
                                                            <p>JPEG / PNG 1280x518*</p>
                                                        </div>
                                                        @if ($errors->has('avatar_bg'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('avatar_bg') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>	
                                                    <script>
                                                        function readURL2(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();
                                                                reader.onload = function(e) {
                                                                    $('#imagePreview1').attr('src', e.target.result);
                                                                    $('#imagePreview1').hide();
                                                                    $('#imagePreview1').fadeIn(650);
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                        $("#avatar_bg").change(function() {
                                                            readURL2(this);
                                                        });
                                                    </script>											
                                                </div>
                                                <div class="add-profile-btn">
                                                    <button class="setting-save-btn" type="submit">Save Changes</button>
                                                </div>
                                            </div>												
                                        </div>
                            </form>
                        </div>	
                    </div>
                    <div id="2" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                        <div class="setting-form">
                            <form class="form-horizontal" method="post" action="{{ route('UserEmailCng') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="user-data full-width">
                                        @if(Session::has('UseremailSuccess'))
                                            <div class="alert alert-success alert-dismissible text-center display-10" role="alert">
                                                {{ Session::get('UseremailSuccess') }}
                                            </div>
                                        @endif
                                        @if(Session::has('UseremailDanger'))
                                            <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                                                {{ Session::get('UseremailDanger') }}
                                            </div>
                                        @endif                                     
                                    <div class="about-left-heading">
                                        <h3>Email Setting</h3>										
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Old Email Address*</label>
                                                    <input class="payment-input" type="text" name="old_email" placeholder="Enter Old Email Address" required>
                                                </div>	
                                                @if ($errors->has('old_email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old_email') }}</strong>
                                                </span>
                                                @endif
                                                <div class="form-group">
                                                    <label>New Email Address*</label>
                                                    <input class="payment-input" type="text" name="email" placeholder="Enter New Email Address" required>
                                                </div>
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                                <div class="add-profile-btn">
                                                    <button class="setting-save-btn" type="submit">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>																					
                            </form>
                        </div>					
                    </div>
                    <div id="3" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                        <div class="setting-form">
                            <form class="form-horizontal" method="post" action="{{ route('UserpassCng') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="user-data full-width">
                                    @if(Session::has('UserpassSuccess'))
                                            <div class="alert alert-success alert-dismissible text-center display-10" role="alert">
                                                {{ Session::get('UserpassSuccess') }}
                                            </div>
                                        @endif
                                        @if(Session::has('UserpassDanger'))
                                            <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                                                {{ Session::get('UserpassDanger') }}
                                            </div>
                                        @endif                                    
                                    <div class="about-left-heading">
                                        <h3>Change Password</h3>										
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Old Password*</label>
                                                    <input class="payment-input" type="Password" name="old_pass" placeholder="Enter Old Password" required>
                                                </div>	
                                                <div class="form-group">
                                                    <label>New Password*</label>
                                                    <input class="payment-input" type="Password" name="pass" placeholder="Enter New Password" required>
                                                </div>
                                                @if ($errors->has('pass'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pass') }}</strong>
                                                </span>
                                                @endif
                                                <div class="add-profile-btn">
                                                    <button class="setting-save-btn" type="submit">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>																					
                            </form>
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
    function openForm(tabAction, the) {
        var i, tabopen, click;
        tabopen = document.getElementsByClassName("tab-pane");
        click = document.getElementsByClassName("tab-open");
        for (i = 0; i < tabopen.length; i++) {
            tabopen[i].style.display = "none";
            click[i].classList.remove("active");
            window.history.pushState("object or string", "Title", "/user-setting/"+the.id);
        }
        document.getElementById(tabAction).style.display = "block";
        if (the == 1) {
            document.getElementById("responsed").classList.add("active");
        } else {
            the.classList.add("active");
        }
    }
    document.getElementById("personal-info").click();
    <?php null !== Request::segment(2) ? $click=Request::segment(2):$click="personal-info" ?> 
    document.getElementById('{{$click}}').click();
</script>