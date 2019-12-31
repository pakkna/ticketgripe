@include('layouts.master_layout.header')
<!-- Body Start -->
<main class="dashboard-mp">
    <div class="dash-todo-thumbnail-area1">
        <div class="todo-thumb1 dash-bg-image1 dash-bg-overlay" style="background-image:url(master/images/event-view/my-bg.jpg);"></div>
        <div class="dash-todo-header1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="my-profile-dash">
                            <div class="my-dp-dash">
                                <img src="{{ Auth::user()->image==null ? 'master/images/event-view/unknown.png' : 'master/images/'. Auth::user()->image }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dash-dts">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="event-title">
                        <div class="my-dash-dt">
                            <h3>{{ Auth::user()->fullname }}</h3>
                            <span>Member since {{date("jS F Y", strtotime(Auth::user()->created_at))}}</span>
                            <span><i class="fas fa-map-marker-alt"></i>India</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <ul class="right-details">
                        <li>
                            <div class="my-all-evnts">
                                <a href="{{route('MyEvents')}}">View Events</a>
                            </div>
                        </li>
                        <li>
                            <div class="all-dis-evnt">
                                <div class="dscun-txt">Events</div>
                                <div class="dscun-numbr">22</div>
                            </div>
                        </li>
                        <li>
                            <div class="all-dis-evnt">
                                <div class="dscun-txt">Credit</div>
                                <div class="dscun-numbr">$ 100</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
                                <a class="tab-item-1 active" href="my_dashboard_setting_info.html">Personal Info</a>
                                <a class="tab-item-1" href="my_dashboard_setting_profile.html">Profile</a>
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
                    <div class="col-lg-9 col-md-7">
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
                                                    <label>Full Name*</label>
                                                    <input class="payment-input" type="text" placeholder="John Doe">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Date of Birth*</label>
                                                    <input class="payment-input datepicker-here" data-language="en" type="text" placeholder="08/29/1991">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Email Address*</label>
                                                    <input class="payment-input" type="email" placeholder="Email Address*">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Phone Number*</label>
                                                    <input class="payment-input" type="tel" placeholder="+91 123 456 7890">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Gender*</label>
                                                    <div class="select-bg">
                                                        <select class="wide" style="display: none;">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Status*</label>
                                                    <div class="select-bg">
                                                        <select class="wide" style="display: none;">
                                                            <option>Single</option>
                                                            <option>Married</option>
                                                            <option>In a relationship</option>
                                                            <option>Engaged</option>
                                                            <option>Divorced</option>
                                                            <option>It's complicated</option>
                                                            <option>Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>Country*</label>
                                                    <div class="select-bg">
                                                        <select class="wide" style="display: none;">
                                                            <option>India</option>
                                                            <option>Australia</option>
                                                            <option>Canada</option>
                                                            <option>Nepal</option>
                                                            <option>Pakistan</option>
                                                            <option>Bangladesh</option>
                                                            <option>England</option>
                                                            <option>United States</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>State*</label>
                                                    <div class="select-bg">
                                                        <select class="wide" style="display: none;">
                                                            <option>Punjab</option>
                                                            <option>Delhi</option>
                                                            <option>Rajasthan</option>
                                                            <option>Uttar Pardesh</option>
                                                            <option>Bihar</option>
                                                            <option>Gujrat</option>
                                                            <option>Ladakh</option>
                                                            <option>Maharastar</option>
                                                            <option>Karnatank</option>
                                                            <option>Channai</option>
                                                            <option>Jharkhand</option>
                                                            <option>Tamilnadu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label>City*</label>
                                                    <div class="select-bg">
                                                        <select class="wide" style="display: none;">
                                                            <option>Ludhiana</option>
                                                            <option>Amritsar</option>
                                                            <option>Moga</option>
                                                            <option>Rajpura</option>
                                                            <option>Mohali</option>
                                                            <option>Jalandhar</option>
                                                            <option>Beas</option>
                                                            <option>Kapurthala</option>
                                                            <option>Fagwara</option>
                                                            <option>Husharpur</option>
                                                            <option>Gurdaspur</option>
                                                            <option>Fatehgrah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-data full-width">
                                    <div class="about-left-heading">
                                        <h3>About Description</h3>
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Description Here*</label>
                                                    <textarea class="replt-comnt" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-data full-width">
                                    <div class="about-left-heading">
                                        <h3>Hobbies</h3>
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Music*</label>
                                                    <input class="payment-input" type="text" placeholder="Folk, Rap, Solo, Hiphop">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Books*</label>
                                                    <input class="payment-input" type="email" placeholder="Novel, Comics, Jokes, Love Stories, Secience, History">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Movies*</label>
                                                    <input class="payment-input" type="tel" placeholder="Dangle, Na Peru Suriya, Raja the Great, Bahubali 2">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Tv Shows*</label>
                                                    <input class="payment-input" type="tel" placeholder="The Kapil Sharma Show, Kulfi, CID, Big Boss">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Games*</label>
                                                    <input class="payment-input" type="tel" placeholder="Cricket, Football, Hockey, Kabaddi">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Brands*</label>
                                                    <input class="payment-input" type="tel" placeholder="Apple, Oppo, Nike, Addidas, Puma. Jack & Jone, Nokia">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Favourite Artists*</label>
                                                    <input class="payment-input" type="tel" placeholder="Babbu Maan, Salman Khan, Kapil Sharma, Priyanka Chopra">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Other Insterests*</label>
                                                    <input class="payment-input" type="tel" placeholder="Travel, Hiking, Web designing">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-data full-width">
                                    <div class="about-left-heading">
                                        <h3>Education</h3>
                                        <a href="#">Add New</a>
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Title*</label>
                                                    <input class="payment-input" type="text" placeholder="Master of Science in Information Technology">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <input class="payment-input" type="text" placeholder="From">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <input class="payment-input" type="text" placeholder="to">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <input class="payment-input" type="text" placeholder="www.college/institute.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-data full-width">
                                    <div class="about-left-heading">
                                        <h3>Employment</h3>
                                        <a href="#">Add New</a>
                                    </div>
                                    <div class="prsnl-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Title*</label>
                                                    <input class="payment-input" type="text" placeholder="Graphic Designer">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <input class="payment-input" type="text" placeholder="From">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <input class="payment-input" type="text" placeholder="to">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <input class="payment-input" type="text" placeholder="www.company.com">
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
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Body End -->
<script src="{!! asset('master/js/jquery.min.js') !!}"></script>
@include('layouts.master_layout.footer')