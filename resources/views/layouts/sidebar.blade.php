<div class="scrollbar-sidebar ps ps--active-y">

    <div class="app-sidebar__inner">

        <ul class="vertical-nav-menu metismenu">
            @if(Auth::user()->user_type=='Admin' || Auth::user()->user_type=='Super Admin' )
            <li class="app-sidebar__heading">Event Information</li>

            <li>
                <a href="{{route('UserList')}}" aria-expanded="true" class="@yield('UserList')">
                    <i class="metismenu-icon pe-7s-culture"></i>
                    User List
                </a>
                <a href="{{route('EventList')}}" aria-expanded="true" class="@yield('EventList')">
                    <!-- <a href="javascript:void(0)" aria-expanded="true" id="coming_soon"> -->
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Event List
                </a>
            </li>
            <li class="app-sidebar__heading">Payment Information</li>
            <li>
                <!-- <a href="javascript:void(0)" aria-expanded="true" id="coming_soon3">
                    <i class="metismenu-icon pe-7s-bell"></i>
                    Pending Payment
                </a> -->
                <a href="{{url('withdraw-history')}}" aria-expanded="true">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Withdraw History
                </a>
                <a href="{{url('resident-bill-info')}}" aria-expanded="true" class="@yield('resident-bill-info')">
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Residents Bill Info
                </a>
                <a href="{{url('admin-sms')}}" aria-expanded="true" class="@yield('admin-sms')">
                    <i class="metismenu-icon pe-7s-mail"></i>
                    SMS Balance History
                </a>
            </li>

            @endif
        </ul>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>

    <div class="ps__rail-y" style="top: 0px; height: 196px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 35px;"></div>
    </div>

</div>



</div>