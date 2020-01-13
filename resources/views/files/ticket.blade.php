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
        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	
	
    </head>

<body oncontextmenu="return false;">
<!-- Body Start -->
<main class="discussion-mp" style="background: #8C8585D4;height: 800px;">	
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center cus-width">
                    <div class="checkout-heading text-center">
                        <h2>Order Confirmed</h2>								
                    </div>
                    <div id="DomPrint" class="confirm-order">
                        <div class="checkout-dt1 cus-header">
                            <div class="check-img">
                                <img src="{!! asset($event_info->event_logo) !!}" style="float: left;height: 67px;
                                width: 100%;" alt="">
                            </div>
                            <div class="cus-title">
                                <h1>{{$event_info->title}}</h1>
                                <!-- <div class="ctgory1">Club</div> -->
                                <?php 
                                 $format = ('F d, Y');
                                 $format2 = ('g:i A');

                                    $start = date($format, strtotime($event_info->start_date));
                                    $time1 = date($format2, strtotime($event_info->start_date));
                                    $time2 = date($format2, strtotime($event_info->end_date));

                                    
                                    $end = date($format, strtotime($event_info->end_date));
                                ?>
                                <div class="cus-date">{{$start}} (
                                    {{$time1}} to {{$time2}} ) </div>
                                <!-- <div class="lctn-dt1"><i class="fas fa-map-marker-alt"></i> India</div> -->
                            </div>	
                            <div class="check-img check-img-right">
                                <img src="{!! asset('master/images/TICKET-GRIPE-1st-logo.png') !!}" style="float: right;height: 67px;width: 100%;" alt="">
                            </div>								
                        </div>
                        <div class="congrats">
                            <div class="cus-background">
                                <table class="" style="width: 70%;">
                                    <thead style="display: none;">
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody class="ticket-table">
                                        @foreach($buyer_info as $user_info)
                                        <tr>
                                            <td class="names">{{$user_info->question_title}} &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; {{$user_info->question_ans}}</td>
                                        </tr>
                                        @endforeach
                                        <!-- <tr>
                                            <td class="names">Company &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; abc limited</td>
                                        </tr> -->
                                        <tr>
                                            <td class="names">order id &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; TGRIPE-{{$random_number}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="qr-code">
                                    <img src="{!! asset('master/images/qr_code_PNG6.png') !!}" alt="">
                                    <span class="ticket-code">TGRIPE-{{$random_number}}</span>
                                    <span style="width: 175px;margin-top: -19px;" class="sponsor-logo-name">EVENT SPONSOR</span>
                                    <div class="sponsor-logo">
                                        @foreach($sponsor_info as $sponsor_logo)
                                        <img src="{!! asset($sponsor_logo->sponser_logo) !!}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <!-- <p>Scan OR Code at the event place.</p> -->
                                <!-- <img src="images/event-view/qr.svg" alt=""> -->
                                <p class="sms">event address : {{$event_info->address}}, {{$event_info->city}}, {{$event_info->state}} - {{$event_info->zip}}, {{$event_info->country}}</p>
                            </div>
                        </div>
                        <div class="checkout-dt1 cus-bottom">
                            <p class="">Note : You are required to show your ticket ( Printed or Digital ) to enter</p>	
                            <?php  $format = ('M d, Y g:i A');

                                $datea = date($format, strtotime($buyer_info[0]->created_at));
                            ?>
                            <span>Booking : {{$datea}}</span>
                        </div>	
                        <p class="copyright-ticket">Ticketgripe.com a brand of Innovadeus Pvt Ltd</p>														
                    </div>	
                    <!-- <div class="row">
                        <div class="offset-md-1 col-md-4">
                            <button onclick="printDiv('DomPrint')" value="print a div!" class="btn btn-submit_form invoice_print">Print Ticket</button>
                        </div>
                    </div>														 -->
            </div>					
        </div>
    </div>
</main>
<!-- Footer Start -->

<!-- Footer End -->

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<!-- Scripts js -->

<!-- <script src="{!! asset('master/js/timer.js') !!}"></script> -->
</body>

</html>