<!doctype html>
<html lang="{{ app()->getLocale() }}">


<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/dashboards-minimal-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Aug 2019 06:48:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Examples of just how powerful ArchitectUI really is!">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/png" href="{!! asset('assets/images/favicon.png') !!}" sizes="16x16">
    <link rel="icon" type="image/png" href="{!! asset('assets/images/favicon.png') !!}" sizes="32x32">
    <script src="{!! asset('js/moment-with-locales.min.js') !!}"></script>
    <link href="{!! asset('main.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('css/gallery.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">

    <!--  <script src="https://cdn.ckeditor.com/4.12.1/basic/ckeditor.js"></script> -->
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/jquery3.3.1.js') !!}"></script>
    <script src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>

    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> -->
    <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo" style="padding-left: 18px !important;">
                <a href="{{ route('dashboard') }}">
                    <div class="logo-src"> </div>
                </a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">

                <div class="app-header-right">


                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img class="rounded-circle" src="{!! asset('assets/images/avatars') !!}/{{ Auth::user()->image }}" alt="" width="42">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-4" style="background-image: url('assets/images/dropdown-header/back_profile.jpg');"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img class="rounded-circle" src="{!! asset('assets/images/avatars') !!}/{{  Auth::user()->image}}" alt="" width="42">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{ Auth::user()->name }}
                                                                    </div>
                                                                    <div class="widget-subheading opacity-8">{{ Auth::user()->user_type }}
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <a class="btn-pill btn-shadow btn-shine btn btn-focus" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                        Logout
                                                                    </a>

                                                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                                        {{ csrf_field() }}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-area-xs" style="height: 140px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">MY Account
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="{{url('edit-profile')}}" class="nav-link"><i class="fa fa-edit" style="margin-right: 5px"></i> Edit Profile
                                                            </a>
                                                        </li>

                                                        <!--  @if(Auth::user()->user_type=='Admin' || Auth::user()->user_type=='Super Admin')
                                                        <li class="nav-item">
                                                            <a href="{{url('adduser')}}" class="nav-link"><i class="fa fa-user" style="margin-right: 5px"></i> Add Users
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="{{url('user-list')}}" class="nav-link"><i class="fa fa-cogs" style="margin-right: 5px"></i> User Management
                                                            </a>
                                                        </li>
                                                        @endif -->
                                                    </ul>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name}}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->user_type}}
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa fa-sign-out pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">