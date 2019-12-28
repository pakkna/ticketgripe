<div class="scrollbar-sidebar ps ps--active-y">

    <div class="app-sidebar__inner">

        <ul class="vertical-nav-menu metismenu">

            @if(Auth::user()->user_type=='User' || Auth::user()->user_type=='Super Admin')

            @if(Auth::user()->status==1)
            <li class="app-sidebar__heading">Guest Information</li>
            <li>
                <a href="{{URL('guest-entry')}}" aria-expanded="true" class="@yield('guest-entry')">
                    <i class="metismenu-icon pe-7s-next-2"></i>
                    Guest Entry
                </a>
                <a href="{{route('user-register')}}" aria-expanded="true" class="@yield('user-register')">
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Register Book
                </a>
                <a href="{{url('Guest-import')}}" aria-expanded="true" class="@yield('excel-import')">
                    <i class="metismenu-icon pe-7s-cloud-upload"></i>
                    Import Excel Sheet
                </a>
            </li>
            @endif
            <li class="app-sidebar__heading">Payment/SMS Information </li>
            <li>
                <a href="{{url('user-payment-view')}}" aria-expanded="true" class="@yield('user-payment-view')">
                    <i class="metismenu-icon pe-7s-credit"></i>
                    Online Payment
                </a>
                <a href="{{url('user-payment-log')}}" aria-expanded="true" class="@yield('user-payment-log')">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Payment History
                </a>
                <form id="user-bill-info" action="{{url('user-bill-info')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input name="id" value="{{Auth::id()}}" type="number" hidden>
                </form>

                <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('user-bill-info').submit();" aria-expanded="true" class="@yield('user-bill-info')">
                    <i class="metismenu-icon pe-7s-news-paper"></i>
                    Bill Info
                </a>
                @if(Auth::user()->status==1)
                <a href="{{url('user-sms-info')}}" aria-expanded="true" class="@yield('user-sms-info')">
                    <i class="metismenu-icon pe-7s-info"></i>
                    SMS History
                </a>
            </li>
            <li class="app-sidebar__heading">Resident Information</li>
            <li>
                <a href="{{url('view-resident')}}" aria-expanded="true" class="@yield('view-resident')">
                    <i class="metismenu-icon pe-7s-id"></i>
                    Account Info
                </a>
                <a href="javascript:void(0)" aria-expanded="true" id="help" data-toggle="modal" data-target="#largeModalsidebar">
                    <i class="metismenu-icon pe-7s-headphones"></i>
                    Help
                </a>
            </li>
            @endif
            @endif
            @if(Auth::user()->user_type=='Admin' || Auth::user()->user_type=='Super Admin' )
            <li class="app-sidebar__heading">Manage Users</li>

            <li>
                <a href="{{URL('sign-up')}}" aria-expanded="true" class="@yield('sign-up')">

                    <i class="metismenu-icon pe-7s-add-user"></i>
                    Sign Up Resident
                </a>
                <a href="{{url('pending-resident-list')}}" aria-expanded="true" class="@yield('pending-resident-list')">
                    <i class="metismenu-icon pe-7s-next-2"></i>
                    Pending Application
                </a>
                <a href="{{URL('ResidentList')}}" aria-expanded="true" class="@yield('ResidentList')">
                    <i class="metismenu-icon pe-7s-culture"></i>
                    Resident List
                </a>
                <a href="{{url('all-guest-details')}}" aria-expanded="true" class="@yield('all-guest-details')">
                    <!-- <a href="javascript:void(0)" aria-expanded="true" id="coming_soon"> -->
                    <i class="metismenu-icon pe-7s-note2"></i>
                    Register Book
                </a>
            </li>
            <li class="app-sidebar__heading">Payment Information</li>
            <li>
                <!-- <a href="javascript:void(0)" aria-expanded="true" id="coming_soon3">
                    <i class="metismenu-icon pe-7s-bell"></i>
                    Pending Payment
                </a> -->
                <a href="{{url('residents_payment_log')}}" aria-expanded="true">
                    <i class="metismenu-icon pe-7s-cash"></i>
                    Payment History
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