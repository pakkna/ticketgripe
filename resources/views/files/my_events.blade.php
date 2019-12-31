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
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="event-title">
                        <div class="my-dash-dt">
                            <h3>{{ Auth::user()->fullname }}</h3>
                            <span>Member since {{date("jS F Y", strtotime(Auth::user()->created_at))}}</span>
                            <span><i class="fas fa-map-marker-alt"></i>India</span>								
                        </div>								
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" name="search" class="search-input" placeholder="Type to search" />
                            <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
                        </div>
                        <span class="close" onclick="searchToggle(this, event);"></span>
                    </div>
                    <ul class="right-details">
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
            <div class="dash-discussions mb20">
                <div class="main-section">
                <div class="all-search-filters">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-filters">
                                        <div class="search-filters-left">	
                                            <div class="dropdown">										
                                                <a href="#" class="filter-d wt-mp dropdown-toggle-no-caret" role="button" data-toggle="dropdown" aria-expanded="false">Category<i class="fas fa-angle-down"></i></a>
                                                <div class="dropdown-menu cate-dropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                    <a class="link-item" href="#">Music</a>
                                                    <a class="link-item" href="#">Festival</a>											
                                                    <a class="link-item" href="#">Art</a>
                                                    <a class="link-item" href="#">Club</a>
                                                    <a class="link-item" href="#">Comedy</a>
                                                    <a class="link-item" href="#">Theatre</a>
                                                    <a class="link-item" href="#">Promotions</a>
                                                    <a class="link-item" href="#">Other</a>
                                                </div>	
                                            </div>	
                                        </div>
                                        <div class="search-filters-right dropdown">
                                            <a href="#" class="filter-d dropdown-toggle-no-caret" role="button" data-toggle="dropdown" aria-expanded="false">All Dates<i class="fas fa-angle-down"></i> </a>
                                            <div class="dropdown-menu date-dropdown dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(72px, 21px, 0px);">
                                                <a class="link-item" href="#">All Dates</a>
                                                <a class="link-item" href="#">Upcoming Events</a>		
                                                <a class="link-item" href="#">Past Events</a>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="all-search-events">								
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="event-main-post">
                                    <div class="event-top">
                                        <div class="event-top-left">
                                            <a href="single_discussion_view.html"><h4><span>Event Title Here</span></h4></a>
                                        </div>
                                        <div class="event-top-right">
                                            <div class="ticket-price">Ticket Price : <span>$15</span></div>
                                            <!-- <div class="post-dt-dropdown dropdown">
                                                <span class="dropdown-toggle-no-caret" role="button" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></span>
                                                <div class="dropdown-menu post-rt-dropdown dropdown-menu-right">
                                                    <a class="post-link-item" href="#">Hide</a>
                                                    <a class="post-link-item" href="#">Details</a>											
                                                    <a class="post-link-item" href="#">User Profile</a>
                                                    <a class="post-link-item" href="#">Report</a>																									
                                                </div>
                                            </div> -->
                                            <div class="right-comments">
                                                <a href="#!" class="like-item" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                    <!-- <span><ins>Share</ins> 21</span> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-main-image">
                                        <div class="main-photo">
                                            <div class="photo-overlay"></div>
                                            <img src="{!! asset('master/images/homepage/center/post-img-1.jpg') !!}" alt="">
                                            <!-- <div class="post-buttons">
                                                <div class="left-buttons">
                                                    <ul class="main-btns">
                                                        <li><button class="main-btn-link" onclick="window.location.href = '#';">Buy Ticket</button></li>
                                                        <li><button class="main-btn-link btn-hide" onclick="window.location.href = '#';">May Be</button></li>																		
                                                    </ul>
                                                </div>
                                                <div class="right-buttons">
                                                    <ul class="main-btns">
                                                        <li><button class="main-btn-link btn-hide" onclick="window.location.href = '#';">450 Seats</button></li>
                                                        <li><button class="main-btn-link btn-hide" onclick="window.location.href = '#';">Can't Go</button></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>														
                                    </div>
                                    <div class="event-city-dt">
                                        <ul class="city-dt-list">
                                            <!-- <li>
                                                <div class="it-items">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <div class="list-text-dt">
                                                        <span>City</span>
                                                        <ins>London</ins>
                                                    </div>
                                                </div>
                                            </li> -->
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    <div class="list-text-dt">
                                                        <span>Date</span>
                                                        <ins>21 Nov 2019</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-clock"></i>
                                                    <div class="list-text-dt">
                                                        <span>Time</span>
                                                        <ins>6 PM to 9 PM</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-chair"></i>
                                                    <div class="list-text-dt">
                                                        <span>Seat</span>
                                                        <ins>100</ins>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="event-go-dt">
                                        <ul class="go-dt-list">
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-map-marker-alt" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>City</span>
                                                        <ins>London</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-check" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>Sold Out</span>
                                                        <ins>20</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-money-bill-wave" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>Collection</span>
                                                        <ins>$ 70</ins>
                                                    </div>
                                                </div>
                                            </li>															
                                        </ul>
                                    </div>
                                    <div class="like-comments">
                                        <div class="left-comments">
                                            <a href="#" class="like-item" title="Manage Events">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span><ins>Manage Events</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="Attendee List">
                                                <i class="fas fa-users"></i>
                                                <span><ins>Attendee List</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="View">
                                                <i class="fas fa-eye"></i>
                                                <span><ins>View</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="Manage Ticket">
                                                <i class="fas fa-ticket-alt"></i>
                                                <span><ins>Manage Ticket</ins></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="event-main-post">
                                    <div class="event-top">
                                        <div class="event-top-left">
                                            <a href="single_discussion_view.html"><h4><span>Event Title Here</span></h4></a>
                                        </div>
                                        <div class="event-top-right">
                                            <div class="ticket-price">Ticket Price : <span>$15</span></div>
                                            <div class="right-comments">
                                                <a href="#!" class="like-item" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-main-image">
                                        <div class="main-photo">
                                            <div class="photo-overlay"></div>
                                            <img src="{!! asset('master/images/homepage/center/post-img-2.jpg') !!}" alt="">
                                        </div>														
                                    </div>
                                    <div class="event-city-dt">
                                        <ul class="city-dt-list">
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    <div class="list-text-dt">
                                                        <span>Date</span>
                                                        <ins>21 Nov 2019</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-clock"></i>
                                                    <div class="list-text-dt">
                                                        <span>Time</span>
                                                        <ins>6 PM to 9 PM</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-chair"></i>
                                                    <div class="list-text-dt">
                                                        <span>Seat</span>
                                                        <ins>100</ins>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="event-go-dt">
                                        <ul class="go-dt-list">
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-map-marker-alt" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>City</span>
                                                        <ins>London</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-check" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>Sold Out</span>
                                                        <ins>20</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-money-bill-wave" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>Collection</span>
                                                        <ins>$ 70</ins>
                                                    </div>
                                                </div>
                                            </li>															
                                        </ul>
                                    </div>
                                    <div class="like-comments">
                                        <div class="left-comments">
                                            <a href="#" class="like-item" title="Manage Events">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span><ins>Manage Events</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="Attendee List">
                                                <i class="fas fa-users"></i>
                                                <span><ins>Attendee List</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="View">
                                                <i class="fas fa-eye"></i>
                                                <span><ins>View</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="Manage Ticket">
                                                <i class="fas fa-ticket-alt"></i>
                                                <span><ins>Manage Ticket</ins></span>
                                            </a>
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
    function searchToggle(obj, evt){
        var container = $(obj).closest('.search-wrapper');
            if(!container.hasClass('active')){
                container.addClass('active');
                evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                container.removeClass('active');
                // clear input
                container.find('.search-input').val('');
            }
    }
</script>
