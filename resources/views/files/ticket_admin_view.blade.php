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
<style>
@media(max-width:1000px){
    .discussion-mp{
        width: 1000px !important;
    }
}
</style>
<!-- Body Start -->
<main class="discussion-mp" style="background: #8C8585D4;height: 800px;width: 100%;">	
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center cus-width">
                    <div class="checkout-heading text-center">
                        <h2>Ticket Confirmed</h2>								
                    </div>
                    <?php 
                    $format = ('F d, Y');
                    $format2 = ('g:i A');
                    $format3 = ('F d, Y g:i A');
                        $current_time = strtotime(date('Y-m-d H:i:s')); 
                        $end_event = strtotime($event_info->end_date); 
                        $start = date($format3, strtotime($event_info->start_date));
                        $endtime = date($format3, strtotime($event_info->end_date));
                        $time1 = date($format2, strtotime($event_info->start_date));
                        $time2 = date($format2, strtotime($event_info->end_date));

                        $end = date($format, strtotime($event_info->end_date));
                        ?>
                    <div id="DomPrint" class="confirm-order" style="height: 490px;width: 890px;">
                        <div style="height: 490px;width: 890px;">
                            <div class="checkout-dt1 cus-header" style="background:#EBEBEB;position: relative;border-top-left-radius: 25px;border-top-right-radius: 25px;padding: 8px 8px;width: 100%;display: flex;float: left;">
                                <div class="check-img" style="width: 300px;">
                                    @if($event_info->event_logo == null)
                                    <img src="{!! asset('master/images/TICKET-GRIPE-1st-logo.png') !!}" style="float: right;width: 100%;" alt="">
                                    @else
                                    <img src="{!! asset($event_info->event_logo) !!}" style="float: left;
                                    width: 100%;margin-left: 6px;" alt="">
                                    @endif
                                </div>
                                <div class="cus-title" style="text-align: center;width: 100%;">
                                    <h1 style="color:#223F69;font-weight: bold;margin-bottom: 0px !important;font-size: 27px;">{{$event_info->title}}</h1>
                                    <!-- <div class="ctgory1">Club</div> -->
                                    <div class="cus-date" style="color:#223F69;font-weight: 500;margin: 0;font-size: 14px;">     {{$start}} to {{$endtime}}</div>
                                    <!-- <div class="lctn-dt1"><i class="fas fa-map-marker-alt"></i> India</div> -->
                                </div>	
                                <div class="check-img check-img-right" style="width: 300px;">
                                    <img src="{!! asset('master/images/TICKET-GRIPE-1st-logo.png') !!}" style="float: right;width: 100%;" alt="">
                                </div>								
                            </div>
                        
                        <div class="congrats" style="text-align: center;float: left;width: 100%;text-align: center;padding: 30px;background:#fff;height: 300px;">
                            <div class="cus-background" style="background-image: url(/master/images/map.png);background-repeat: no-repeat;background-size: contain;background-position: center;">
                                <table class="" style="width: 63%;">
                                    <thead style="display: none;">
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody class="ticket-table" style="text-transform: uppercase;">
                                        @foreach($buyer_info as $user_info)
                                        <tr style="line-height: 39px;">
                                            <td class="names" style="color:#65808E;text-align: left;width: 27%;font-size: 17px;">{{$user_info->question_title}} &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names" style="color:#607D89;font-weight: bold;text-align:left;ont-size: 17px;">&nbsp; &nbsp; &nbsp; {{$user_info->question_ans}}</td>
                                        </tr>
                                        @endforeach
                                        <!-- <tr>
                                            <td class="names">Company &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; abc limited</td>
                                        </tr> -->
                                        <tr style="line-height: 39px;">
                                            <td class="names" style="color:#65808E;text-align: left;width: 27%;font-size: 17px;">Ticket Type &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names" style="color:#607D89;font-weight: bold;text-align:left;ont-size: 17px;">&nbsp; &nbsp; &nbsp; {{$ticket_type->ticket_type}}</td>
                                        </tr>
                                        <tr style="line-height: 39px;">
                                            <td class="names" style="color:#65808E;text-align: left;width: 27%;font-size: 17px;">ticket id &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names" style="color:#607D89;font-weight: bold;text-align:left;ont-size: 17px;">&nbsp; &nbsp; &nbsp; TG - {{$random_number}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="qr-code" style="width: 25%;float: right;margin-top: -195px;right: 0;">
                                    <img src="{!! asset('qr_codes/TG-') !!}{{$random_number}}.png" alt="" style="width: 100px;">
                                    <span class="ticket-code" style="float: right;margin-top: 12px;font-weight: 400;line-height: 24px;color:#3B3B3B !important;font-size: 14px !important;margin-left: 63px;margin-top: -3px !important;float: left !important;margin-bottom: 20px;">TG - {{$random_number}}</span>
                                    @if(count($sponsor_info))
                                    <span style="width: 175px;margin-top: -19px;float: right;background:#fff;color:#3A3A3A !important;font-weight: 600 !important;padding: 0;font-size: 16px !important;margin-right: 21px;" class="sponsor-logo-name">EVENT SPONSOR</span>
                                    @endif
                                    <div class="" style="width: 204px;">
                                        @foreach($sponsor_info as $sponsor_logo)
                                        <img src="{!! asset($sponsor_logo->sponser_logo) !!}" alt="" style="width: 100px;">
                                        @endforeach
                                    </div>
                                </div>
                                <!-- <p>Scan OR Code at the event place.</p> -->
                                <!-- <img src="images/event-view/qr.svg" alt=""> -->
                                <p class="sms" style="font-size: 14px;color:#fff;font-weight: 400;line-height: 24px;margin-top: 17px !important;background:#607D8B;border-radius: 11px;padding: 5px 10px;width: 77%;text-transform: uppercase;">event address : {{$event_info->address}}, {{$event_info->city}}, {{$event_info->state}} - {{$event_info->zip}}, {{$event_info->country}}</p>
                            </div>
                        </div>
                        <div class="checkout-dt1 cus-bottom" style="background-image: url(/master/images/bottom-part-design.png);background-repeat: no-repeat;background-size: cover;background-position: center;height: 47px;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;padding: 8px 8px;width: 100%;display: flex;float: left;">
                            <p style="color:#fff;font-size: 13px;padding: 0px 25px;font-weight: bold;">Note : You are required to show your ticket ( Printed or Digital ) to enter</p>	
                            <?php  $format = ('M d, Y h:i:s A');

                                $datea = date($format, strtotime($buyer_info[0]->created_at));
                            ?>
                            <span style="color:#fff;font-size: 13px;padding: 2px 25px;position: relative;left: 40px;top: 3px;font-weight: bold;">Booking Date : {{$datea}}</span>
                        </div>	
                        <p class="copyright-ticket" style="font-size: 12px;text-align: right;margin-top: 22px;margin-left: 495px;transform: rotate(270deg);color:#616161;width: 300px;position: relative;

top: 11px;"><strong>Ticketgripe.com</strong> a brand of Innovadeus Pvt. Ltd.</p>														
                    </div>
                    </div>	
                    <div class="row" style="width: 100%;">
                        <div class="offset-4 col-6">
                            <a href="" class="add-event" onclick="printDiv('DomPrint')" value="print a div!">Print Ticket</a>
                            <!-- <button onclick="printDiv('DomPrint')" value="print a div!" class="btn btn-submit_form invoice_print">Print Ticket</button> -->
                        </div>
                    </div>														
            </div>					
        </div>
    </div>
</main>
<!-- Footer Start -->

<!-- Footer End -->

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        w.print();
        w.close();
    }
</script>
<!-- Scripts js -->

<!-- <script src="{!! asset('master/js/timer.js') !!}"></script> -->
</body>

</html>