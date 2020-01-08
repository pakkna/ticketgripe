@include('layouts.master_layout.header_event_details')
            <!-- <div class="event-dts">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="event-title">
                                <h2>Lights Out at the Observatory</!
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            
                            
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="event-sections">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="event-itm1 full-width">
                                <div class="event-item-heading">
                                    <i class="fas fa-bars"></i>
                                    Description
                                </div>
                                <div class="event-item-description">
                                    <p>{{strip_tags($single_event->description)}}</p>
                                </div>
                            </div>
                            <div class="event-itm1 full-width">
                                <div class="event-item-heading">
                                    <i class="fas fa-user"></i>
                                    Organizer Team
                                </div>
                                <div class="event-item-description">									
                                    <div class="owl-carousel organizer-owl owl-theme">
                                        <div class="item">
                                            <div class="ogr-bg">
                                                <div class="org-img">
                                                    <img src="images/event-view/org-1.jpg" alt="">																										
                                                </div>
                                                <a href="user_dashboard_activity.html"><h4>Rock Smith</h4></a>
                                                <span>Singer</span>
                                                <div class="organizer-butn">
                                                    <a href="#" class="org-btn">Follow</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ogr-bg">
                                                <div class="org-img">
                                                    <img src="images/event-view/org-2.jpg" alt="">																										
                                                </div>
                                                <a href="user_dashboard_activity.html"><h4>Jassica William</h4></a>
                                                <span>Musician</span>
                                                <div class="organizer-butn">
                                                    <a href="#" class="org-btn1">Following</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ogr-bg">
                                                <div class="org-img">
                                                    <img src="images/event-view/org-3.jpg" alt="">																										
                                                </div>
                                                <a href="user_dashboard_activity.html"><h4>Johnson Doe</h4></a>
                                                <span>Musician</span>
                                                <div class="organizer-butn">
                                                    <a href="#" class="org-btn">Follow</a>
                                                </div>
                                            </div>
                                        </div>													
                                    </div>																						
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="event-itm2 full-width">
                                <div class="event-city-dt">
                                    <ul class="city-dt-list" style="padding: 0px 12px;">
                                        <li style="width: 100%;text-align: left;">
                                            <div class="it-items">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <div class="list-text-dt">
                                                    <span>Address</span>

                                                    <ins>{{$single_event->address}}, {{$single_event->city}}, {{$single_event->state}} - {{$single_event->zip}}, {{$single_event->country}}</ins>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>							
                            <div class="event-itm4 full-width">
                                <div class="event-go-dt border-tb">
                                    <ul class="go-dt-list">
                                        <li>
                                            <div class="it-items">
                                                <i class="fas fa-check" style="color:#a7a8aa;"></i>
                                                <div class="list-text-dt">
                                                    <span>Going</span>
                                                    <ins>45</ins>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="it-items">
                                                <i class="fas fa-question-circle" style="color:#a7a8aa;"></i>
                                                <div class="list-text-dt">
                                                    <span>MayBe</span>
                                                    <ins>120</ins>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="it-items">
                                                <i class="fas fa-times" style="color:#a7a8aa;"></i>
                                                <div class="list-text-dt">
                                                    <span>Can't Go</span>
                                                    <ins>70</ins>
                                                </div>
                                            </div>
                                        </li>															
                                    </ul>
                                </div>
                            </div>
                            <div class="event-itm1 full-width">
                                <div class="event-item-heading">
                                    <i class="fas fa-clock"></i>
                                    Left Time
                                </div>
                                <div class="event-item-description">
                                    <ul class="timer-dt">
                                        <li>
                                            <div class="it-items"> 												
                                                <div class="list-text-dt text-center">
                                                    <span id="days">00</span>
                                                    <ins>Days</ins>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="it-items">												
                                                <div class="list-text-dt text-center">
                                                    <span id="hours">00</span>
                                                    <ins>Hours</ins>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="it-items">												
                                                <div class="list-text-dt text-center">
                                                    <span id="minutes">00</span>
                                                    <ins>Minutes</ins>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="it-items">												
                                                <div class="list-text-dt text-center">
                                                    <span id="seconds">00</span>
                                                    <ins>Seconds</ins>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="event-itm1 full-width">
                                <div class="event-item-heading">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Location
                                </div>
                                <div class="event-item-description">
                                    <div>
                                        <div id="googleMaps" class="google-map-container">
                                            <iframe src="https://www.google.com/maps?q={{$single_event->address}} {{$single_event->city}} {{$single_event->state}} {{$single_event->zip}} {{$single_event->country}}&output=embed" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>							
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Body End -->	
        <script src="{!! asset('master/js/jquery.min.js') !!}"></script>
        @include('layouts.master_layout.footer_events')					
        
        <script>
            <?php  $format = ('M d,Y g:i:s');

                $datea = date($format, strtotime($single_event->end_date));
            ?>
            // Timer Script
            var count = new Date('{{$datea}}').getTime();
            var now =  new Date().getTime();

            if (count>now) {
            
            var x = setInterval(function() {
                var now =  new Date().getTime();
                var d = count - now;	
                var days = Math.floor(d/(1000*60*60*24));
                var hours = Math.floor((d%(1000*60*60*24))/(1000*60*60));
                var minutes = Math.floor((d%(1000*60*60))/(1000*60));
                var seconds = Math.floor((d%(1000*60))/1000);	
                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
	
                if(d <=0){
                    clearInterval(x);
                }
            },1000);
        }
        </script>