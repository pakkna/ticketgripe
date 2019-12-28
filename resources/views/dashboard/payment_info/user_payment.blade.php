@section('user-payment-view', 'mm-active')
@include('layouts.header')

@include('layouts.sidebar')



<!-- Dashboard Header  section -->

<div class="app-main__outer">

    <div class="app-main__inner">

        <div class="app-page-title app-page-title-simple">

            <div class="page-title-wrapper">

                <div class="page-title-heading">

                    <div>

                        <div class="page-title-head center-elem">

                            <span class="d-inline-block pr-2">

                                <i class="lnr-apartment opacity-6"></i>

                            </span>

                            <span class="d-inline-block">Resident Payment Log</span>

                        </div>

                        <div class="page-title-subheading opacity-10">

                            <nav class="" aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item">

                                        <a>

                                            <i aria-hidden="true" class="fa fa-home"></i>

                                        </a>

                                    </li>

                                    <li class="breadcrumb-item">

                                        <a>Dashboards</a>

                                    </li>

                                    <li class="active breadcrumb-item" aria-current="page">

                                        Monthly Bill Log

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        <!-- Dashboard Row section -->
        @include("layouts.includes.flash")
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                    Your Paymnet Details
                </div>
                <div class="btn-actions-pane-right text-capitalize">
                    <a href="{{url('user-payment-log')}}" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">View All</a>
                </div>
            </div>
            <div class="no-gutters row">
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 bg-success"></div>
                            <i class="metismenu-icon pe-7s-date text-white opacity-7"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Pending Payments</div>
                            <div class="widget-numbers"><?php
                                                        $time = strtotime(-$pending_month . 'months');

                                                        $interval = date_diff(date_create(date("Y-m-d")), date_create(date("Y-m-d", $time)));

                                                        if ($interval->y != 0 && $interval->m != 0) {

                                                            echo $interval->y . ' years ' . $interval->m . ' months';
                                                        } else if ($interval->y != 0 && $interval->m == 0) {

                                                            echo $interval->y . ' years';
                                                        } else {
                                                            echo $interval->m . ' months';
                                                        }


                                                        ?></div>
                            <div class="widget-description opacity-8 text-focus">
                                All Months Included
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-warning"></div>
                            <i class="metismenu-icon pe-7s-cash text-dark"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Bill Amount</div>
                            <div class="widget-numbers"><span>{{round($total_cost,2)}} TK</span></div>
                            <div class="widget-description opacity-8 text-focus">
                                All Months Included
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                            <i class="metismenu-icon pe-7s-cash text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Due Amount</div>
                            <div class="widget-numbers ">
                                <span>
                                    {{ ($total_cost-$total_paid)>0 ? round($total_cost-$total_paid,2) : 0  }} TK
                                </span>
                            </div>
                            <div class="widget-description text-focus">
                                All Months Included
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center d-block p-3 card-footer">
                <div class=" mbg-3 text-center alert alert-info alert-dismissible fade show" role="alert">
                    <span class="pr-2">
                        <i class="fa fa-question-circle"></i>
                    </span>
                    Bill will be generate 1st of Month and If you are not paid In time your due amount.your account wiil be disabled ! (Note: Every Month 5th)
                </div>

                <?php if(($total_cost-$total_paid)>0){ ?>
                      <a class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg" href="{{route('pay_now')}}">
                            <span class="mr-2 opacity-7">
                                <i class="metismenu-icon pe-7s-credit text-black"></i>
                            </span>
                            <span class="mr-1 btn-success">Pay Bill Now</span>
                     </a>
                        <?php } else{ echo '<span class="mr-1">No Due Available</span>'; } ?>            
                      
               
                <br><br>

                <img style="max-width: 100%;" src="{!! asset('assets/images/sslcmz.png')!!}">
            </div>

        </div>

    </div>

    @include('layouts.footer')
    <script>
        <?php

        if ($message == "failed") {
            echo  'swal("Payment Faild ! Try Again", {icon: "error",})';
        } elseif ($message == "canceled") {
            echo  'swal("Payment Canceled ! Try Again", {icon: "warning",})';
        }
        ?>
