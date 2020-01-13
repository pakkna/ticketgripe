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
<main class="discussion-mp" style="background: #8C8585D4;">	
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center cus-width">
                    <div class="checkout-heading text-center">
                        <h2>Order Confirmed</h2>								
                    </div>
                    <div id="DomPrint" class="confirm-order">
                        <div class="checkout-dt1 cus-header">
                            <div class="check-img">
                                <img src="{!! asset('master/images/TICKET-GRIPE-1st-logo.png') !!}" style="float: left;" alt="">
                            </div>
                            <div class="cus-title">
                                <h1>EVENT NAME HERE</h1>
                                <!-- <div class="ctgory1">Club</div> -->
                                <div class="cus-date">JANARY 11, 2020 ( 2.00 PM to 9.00 PM ) </div>
                                <!-- <div class="lctn-dt1"><i class="fas fa-map-marker-alt"></i> India</div> -->
                            </div>	
                            <div class="check-img check-img-right">
                                <img src="{!! asset('master/images/TICKET-GRIPE-1st-logo.png') !!}" style="float: right;" alt="">
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
                                            <td class="names">NAME &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; ABDUL MUHIT</td>
                                        </tr>
                                        <tr>
                                            <td class="names">Company &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; abc limited</td>
                                        </tr>
                                        <tr>
                                            <td class="names">mobile no. &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; 01990523166</td>
                                        </tr>
                                        <tr>
                                            <td class="names">email &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; info@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <td class="names">order id &nbsp;<span style="text-align: right;">:</span></td>
                                            <td class="names-names">&nbsp; &nbsp; &nbsp; 0099</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="qr-code">
                                    <img src="{!! asset('master/images/qr_code_PNG6.png') !!}" alt="">
                                    <span class="ticket-code">TG - 151201</span>
                                    <span class="sponsor-logo-name">TICKETING SPONSOR</span>
                                </div>
                                <!-- <p>Scan OR Code at the event place.</p> -->
                                <!-- <img src="images/event-view/qr.svg" alt=""> -->
                                <p class="sms">event address : 15 floor, bdbl bhaban kawran bazar, dhaka - 1205</p>
                            </div>
                        </div>
                        <div class="checkout-dt1 cus-bottom">
                            <p class="">Note : You are required to show your ticket ( Printed or Digital ) to enter</p>	
                            <span>Booking : 06 - jan 2020 , 05:01 pm</span>
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