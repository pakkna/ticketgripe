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
                                <a id="defaultOpen" onclick="openForm(1,this)" class="tab-item-1 tab-open" href="javascript:void(0)">Profile</a>
                                <a class="tab-item-1" href="my_dashboard_all_requests.html">All Friend Requests</a>
                                <a class="tab-item-1" href="my_dashboard_all_notifications.html">All Notifications</a>
                                <a class="tab-item-1" href="my_dashboard_setting_social.html">Social Networks</a>
                                <a class="tab-item-1" href="my_dashboard_setting_email.html">Email Setting</a>
                                <a class="tab-item-1" href="my_dashboard_setting_notification.html">Notification Setting</a>
                                <a class="tab-item-1" href="my_dashboard_setting_change_pass.html">Change Password</a>
                                <a class="tab-item-1" href="my_dashboard_setting_delete_account.html">Deactivate Account</a>
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
                                                    <input class="payment-input" type="text" name="username" value="{{ Auth::user()->username}}" placeholder="User Name" required>
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
                                                    <input class="payment-input" type="email" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}" required>
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
                                            <div class="form-group">
                                                <label class="avatar-label">Avatar*</label>
                                                <?php $def_logo = '<div class="setting-dp avatar-img" id="imagePreview" style="background-image: url('.'master/images/event-view/unknown.png'.')">';
                                                ?>
                                                <?php echo Auth::user()->image==null ? $def_logo : Auth::user()->image ?>
                                                 
                                                    <!-- <img src="{{ Auth::user()->image==null ? 'master/images/event-view/unknown.png' : 'master/images/'. Auth::user()->image }}" alt=""> -->
                                                </div>														
                                                <div class="setting-upload">
                                                    <span>Upload a new avatar.</span>
                                                    <div class="addpic" id="OpenImgUpload1">															
                                                        <input type="file" id="file1">
                                                        <label for="file1">Choose File</label>
                                                        <p>JPEG / PNG 150x150*</p>
                                                    </div>
                                                </div>
                                                <script>
                                                    function readURL(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                                                                $('#imagePreview').hide();
                                                                $('#imagePreview').fadeIn(650);
                                                            }
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                    $("#file1").change(function() {
                                                        readURL(this);
                                                    });
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label>Background*</label>
                                                <div class="setting-bg">
                                                    <img src="{{ Auth::user()->image==null ? 'master/images/event-view/demo.jpg' : 'master/images/'. Auth::user()->image }}" alt="">
                                                </div>														
                                                <div class="setting-upload">
                                                    <span>Upload a new background.</span>
                                                    <div class="addpic" id="OpenImgUpload">															
                                                        <input type="file" id="file">
                                                        <label for="file">Choose File</label>
                                                        <p>JPEG / PNG 150x150*</p>
                                                    </div>
                                                </div>	
                                                <script>
                                                    function readURL(input) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                                                                $('#imagePreview').hide();
                                                                $('#imagePreview').fadeIn(650);
                                                            }
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
                                                    $("#file").change(function() {
                                                        readURL(this);
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
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Body End -->
<script src="{!! asset('master/js/jquery.min.js') !!}"></script>
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