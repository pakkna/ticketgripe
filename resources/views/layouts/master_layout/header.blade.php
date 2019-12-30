<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Ticket Gripe</title>
		
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="{!! asset('master/images/fav.png') !!}">
        

        <!-- Stylesheets -->
        <link href="{!! asset('master/css/responsive.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/style.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/all.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/owl.carousel.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/owl.theme.default.min.css') !!}" rel="stylesheet">	
	
	
    </head>

    <body oncontextmenu="return false;">
        <!-- Header Start -->
        <header>
            <div class="container">				
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light bg-dark1 justify-content-sm-start">
                            <a class="order-1 order-lg-0 ml-lg-0 ml-3 mr-auto" href="{{route('/')}}"><img src="{!! asset('master/images/logo.svg') !!}" alt=""></a>
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
                                    <div class="user-dp"><img src="{{ Auth::user()->image==null ? 'master/images/dp.jpg' : 'master/images/'. Auth::user()->image }}" alt=""></div>
                                    <span>{{ Auth::user()->username }}</span>
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu account-dropdown dropdown-menu-right">
                                    <a class="link-item" href="my_dashboard_activity.html">Profile</a>
                                    <a class="link-item" href="/my-events">Events</a>
                                    <a class="link-item" href="invite.html">Invite</a>
                                    <a class="link-item" href="my_dashboard_setting_info.html">Setting</a>
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