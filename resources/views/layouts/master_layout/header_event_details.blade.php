<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Ticketgripe is online E-ticketing system to a event organize and ticket order.">
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
        <meta name="author" content="innovadeus">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ticket Gripe</title>
		
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="{!! asset('master/images/icon1.png') !!}">
        
        <!-- Stylesheets -->
        <link href="{!! asset('master/css/responsive.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/style.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/all.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/owl.carousel.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/owl.theme.default.min.css') !!}" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	
	
    </head>

    <body oncontextmenu="return false;">
        <!-- Header Start -->
        <header>
            <div class="container">				
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-dark1 justify-content-sm-start">
                            <a class="order-1 order-lg-0 ml-lg-0 ml-3 mr-auto" href="{{route('/')}}"><img src="{!! asset('master/images/logo.png') !!}" style="width: 125px;" alt=""></a>
                            <button class="navbar-toggler align-self-start" type="button">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
                                <ul class="navbar-nav align-self-stretch">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="discussions.html">How it works</a>
                                    </li>									
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle-no-caret" role="button" data-toggle="dropdown">
                                            Pages
                                        </a>
                                        <div class="dropdown-menu pages-dropdown">
                                            <a class="link-item" href="login.html">Login</a>
                                            <a class="link-item" href="register.html">Register</a>
                                            <a class="link-item" href="error_404.html">Error 404</a>
                                            <a class="link-item" href="categories.html">Categories</a>
                                            <a class="link-item" href="select_seats.html">Select Seats</a>
                                            <a class="link-item" href="find_friends.html">Find Friends</a>
                                            <a class="link-item" href="user_dashboard_activity.html">User Detail View</a>
                                            <a class="link-item" href="checkout.html">Checkout</a>
                                            <a class="link-item" href="confirmed_order.html">Confirmed Order</a>
                                            <a class="link-item" href="about.html">About</a>
                                            <a class="link-item" href="contact_us.html">Contact</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="our_blog.html">Blog</a>
                                    </li>
                                </ul>
                                <a href="{{route('AddEvent')}}" class="add-event">Add New Event</a>
                            </div>
                            <?php if ((Auth::user())) { ?>
                                <div class="account order-1 dropdown">
                                <a href="#" class="account-link dropdown-toggle-no-caret" role="button" data-toggle="dropdown"> 
                                    <div class="user-dp">
                                    <?php     

                                    Auth::user()->image==null ? $logo_path='master/images/event-view/unknown.png' : $logo_path=Auth::user()->image;
                                    ?>
                                    <img src="{!! asset($logo_path) !!}" alt=""></div>
                                    <span>{{ Auth::user()->username }}</span>
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu account-dropdown dropdown-menu-right">
                                    <!-- <a class="link-item" href="my_dashboard_activity.html">Profile</a> -->
                                    <a class="link-item" href="{{route('MyEvents')}}">Events</a>
                                    <a class="link-item" href="invite.html">Invite</a>
                                    <a class="link-item" href="{{route('UserSetting')}}">Setting</a>
                                    <a class="link-item" href="{{route('Withdraw')}}">Withdraw</a>
                                    <a class="link-item" href="javascript:void(0)" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>								
                                </div>
                            </div>
                        <?php }else{ ?>
                            <ul class="navbar-nav align-self-stretch">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('sign-up')}}">Sign Up </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Sign In </a>
                                </li>
                            </ul>
                        <?php } ?>
                            							
                        </nav>
                        <div class="overlay"></div>
                    </div>					
                </div>					
            </div>
        </header>
        <!-- Header End -->
<!-- Body Start -->
<main class="dashboard-mp">
    <div class="dash-todo-thumbnail-area1">
        <!-- <img class="todo-thumb1 dash-bg-image1 dash-bg-overlay" src="{!! asset($single_event->image_path)!!}"></img> -->
        <img class="todo-thumb1 dash-bg-image1 dash-bg-overlay custom-bg-event2" src="{!! asset('master/images/event_banner.png')!!}"></img>
        <img class="todo-thumb1 dash-bg-image1 dash-bg-overlay custom-bg-event" src="{!! asset($single_event->image_path)!!}"></img>
        <div class="dash-todo-header1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="my-profile-dash">
                            <div class="my-dp-dash">
                                <img src="{!! asset('master/images/event-logo.png') !!}" alt="prifile pic">
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
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="event-title">
                        <div class="my-dash-dt">
                            <h3>{{ $single_event->title }}</h3>
                            <span>Created at {{date("jS F Y", strtotime($single_event->created_at))}} &nbsp;
                            <?php 
                            if (Auth::user()->country != null) { ?>
                                <i class="fas fa-map-marker-alt"></i> <?php echo Auth::user()->country; ?>
                            <?php }else{ echo '';} ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <!-- <ul class="right-details"> -->
                        <!-- <div class="select-bg">									
                            <select class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="question_select">
                                @foreach($single_event_tickets as $alltickets)
                                    <option value="{{$alltickets->ticket_type}}">{{$alltickets->ticket_type}}</option>
                                @endforeach
                            </select>    
                        </div> -->
                        <!-- <li>
                            <div class="my-all-evnts">
                                <a href="{{route('EventDetails', ['event_id' => Request::segment(2)])}}">Event Details</a>
                            </div>
                        </li> -->
                        <!-- <li>
                            <div class="all-dis-evnt">
                                <div class="dscun-txt">Total ticket</div>
                                <div class="dscun-numbr">{{$single_event->seat_number}}</div>
                            </div>
                        </li> -->
                        <!-- <li>
                            <div class="all-dis-evnt">
                                <div class="dscun-txt">Sold out</div>
                                <div class="dscun-numbr">{{$single_event->seat_number}}</div>
                            </div>
                        </li>
                        <li>
                            <div class="all-dis-evnt">
                                <div class="dscun-txt">Revenue</div>
                                <div class="dscun-numbr">{{$single_event->seat_number}}</div>
                            </div>
                        </li> -->
                    <!-- </ul> -->
                    <ul class="event-buttons">
                        <li>
                            <button class="event-btn-1"><i class="fa fa-heart ml-2" > </i> 250+ </button>
                        </li>
                        <li>
                            <button class="event-btn-1">{{$single_event->seat_number}} Seats</button>
                        </li>
                        @if(Request::segment(1) == 'event-details' && count($single_event_tickets) )
                        <li>
                            <a href="{{route('Buyticket', ['event_id' =>$single_event->id])}}"><button class="event-btn-1">Buy Ticket</button></a> 
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>