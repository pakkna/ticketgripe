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
<style>
.qr-code{
    width: 20%;
    float: right;
    position: relative;
    top: -195px;
    right: 0;
}
.ticket-code{
    color: #3B3B3B !important;
    position: relative;
    font-size: 14px !important;
    left: -47px;
    top: -21px;
}
@media(max-width:1000px){
        .discussion-mp{
            width: 1000px !important;
        }
    }
</style>
<body oncontextmenu="return false;">
<!-- Body Start -->
<main class="discussion-mp" style="background: #8C8585D4;height: 800px;">	
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center cus-width">
                    <div class="checkout-heading text-center">
                        <h2>Ticket Confirmed</h2>								
                    </div>
                    <div id="DomPrint" class="confirm-order">
                        <div class="checkout-dt1 cus-header">
                            <div class="check-img">
                                @if($event_info->event_logo == null)
                                <img src="{!! asset('master/images/TICKET-GRIPE-1st-logo.png') !!}" style="float: right;height: 67px;width: 100%;" alt="">
                                @else
                                <img src="{!! asset($event_info->event_logo) !!}" style="float: left;height: 67px;
                                width: 100%;margin-left: 6px;" alt="">
                                @endif
                            </div>
                            <div class="cus-title">
                                <h1>{{$event_info->title}}</h1>
                                <!-- <div class="ctgory1">Club</div> -->
                                <?php 
                                $format = ('F d, Y');
                                $format2 = ('g:i A');
                                $format3 = ('F d, Y g:i A');

                                    $start = date($format3, strtotime($event_info->start_date));
                                    $endtime = date($format3, strtotime($event_info->end_date));
                                    $time1 = date($format2, strtotime($event_info->start_date));
                                    $time2 = date($format2, strtotime($event_info->end_date));

                                    
                                    $end = date($format, strtotime($event_info->end_date));
                                ?>
                                <div class="cus-date">{{$start}} to {{$endtime}} </div>
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
                                        <tr>
                                            <td class="names">name &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; example name</td>
                                        </tr>
                                        <tr>
                                            <td class="names">email &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; info@example.com</td>
                                        </tr>
                                        <tr>
                                            <td class="names">mobile &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; 01XXXXXXXXX</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="names">Company &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; abc limited</td>
                                        </tr> -->
                                        <tr>
                                            <td class="names">Ticket Type &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; {{$ticket_type->ticket_type}}</td>
                                        </tr>
                                        <tr>
                                            <td class="names">ticket id &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; TG - 555555</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="qr-code">
                                    <img src="{!! asset('master/images/qr_code_PNG6.png') !!}" alt="">
                                    <span class="ticket-code">TG - 555555</span>
                                    @if(count($sponsor_info))
                                    <span style="width: 175px;margin-top: -19px;" class="sponsor-logo-name">EVENT SPONSOR</span>
                                    @endif
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
                            <span style="left: 60px;">Booking Date : Jan 15, 2020 12:04:55 PM</span>
                        </div>	
                        <p class="copyright-ticket" style="margin-top: 101px;margin-left: 513px;">Ticketgripe.com a brand of Innovadeus Pvt. Ltd.</p>														
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