@include('layouts.master_layout.header')
    <div class="dash-tab-links">
        <div class="container">
            <div class="setting-page mb-20">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="user-data full-width">
                            <div class="categories-left-heading">
                                <h3>Your Details</h3>
                            </div>
                            <div class="categories-items">
                                <a id="defaultOpen" onclick="openForm(0,this)" class="tab-item-1 tab-open" href="javascript:void(0)">Personal Info</a>
                                <a onclick="openForm(1,this)" class="tab-item-1 tab-open" href="javascript:void(0)">Profile</a>
                                <a onclick="openForm(2,this)" class="tab-item-1 tab-open" href="javascript:void(0)">Email Setting</a>
                                <a onclick="openForm(3,this)" class="tab-item-1 tab-open" href="javascript:void(0)">Change Password</a>
                            </div>
                        </div>
                    </div>
                    <div id="0" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        <div class="setting-form">
                            <form>
                                <div class="user-data full-width">
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
                                                    <input class="payment-input" type="tel" placeholder="017xxxxxxxx" value="{{ Auth::user()->mobile }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                    <label>Country*</label>
                                                    <input class="payment-input" data-language="en" type="text" name="country" placeholder="Country" value="{{ Auth::user()->country }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Organaization*</label>
                                                    <input class="payment-input" data-language="en" type="text" name="organaization" placeholder="Organaization" value="{{ Auth::user()->organization }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-crdt-amnt">
                                    <button class="setting-save-btn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="1" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        <div class="setting-form">
                            <div class="user-data full-width">
                                <div class="about-left-heading">
                                    <h3>Profile</h3>										
                                </div>
                                <div class="prsnl-info">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">										
                                            <script src="{!! asset('master/js/jquery.min.js') !!}"></script>
                                            <div class="form-group">
                                                <label class="avatar-label">Avatar*</label>
                                                <?php $def_logo = '<div class="setting-dp avatar-img" id="image0Preview" style="background-image: url('.'master/images/event-view/unknown.png'.')">';
                                                ?>
                                                <?php echo Auth::user()->image==null ? $def_logo : Auth::user()->image ?>
                                                </div>														
                                                <div class="setting-upload">
                                                    <span>Upload a new avatar.</span>
                                                    <div class="addpic" id="OpenImgUpload">
                                                        <input type="file" id="avatar_img" name="avatar" accept=".png, .jpg, .jpeg">
                                                        <label for="avatar_img">Choose File</label>
                                                        <p>JPEG / PNG 150x150*</p>
                                                    </div>
                                                </div>
                                                <script>
                                                    function readURL(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $('#image0Preview').css('background-image', 'url('+e.target.result +')');
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
                                                <?php $def_bg = '<div class="setting-bg avatar-bg" id="imagePreview1" style="background-image: url('.'master/images/event-view/demo.jpg'.')">';
                                                ?>
                                                <?php echo Auth::user()->image==null ? $def_bg : Auth::user()->image ?>	
                                                </div>
                                                <div class="setting-upload">
                                                    <span>Upload a new background.</span>
                                                    <div class="addpic" id="OpenImgUpload1">
                                                        <input type="file" id="avatar_bg" name="avatar_bg" accept=".png, .jpg, .jpeg">
                                                        <label for="avatar_bg">Choose File</label>
                                                        <p>JPEG / PNG 150x150*</p>
                                                    </div>
                                                </div>	
                                                <script>
                                                    function readURL2(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $('#imagePreview1').css('background-image', 'url('+e.target.result +')');
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
                                </div>
                            </div>																																				
                        </div>	
                    </div>
                    <div id="2" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                        <div class="setting-form">
                            <form>
                                <div class="user-data full-width">
                                    <div class="about-left-heading">
                                        <h3>Email Setting</h3>										
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Old Email Address*</label>
                                                    <input class="payment-input" type="text" name="old_email" placeholder="Enter Old Email Address">
                                                </div>	
                                                <div class="form-group">
                                                    <label>New Email Address*</label>
                                                    <input class="payment-input" type="text" name="email" placeholder="Enter New Email Address">
                                                </div>
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
                            <form>
                                <div class="user-data full-width">
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
        }
        document.getElementById(tabAction).style.display = "block";
        if (the == 1) {
            document.getElementById("responsed").classList.add("active");
        } else {
            the.classList.add("active");
        }
    }
    document.getElementById("defaultOpen").click();
</script>