@include('layouts.master_layout.header')
    <div class="dash-tab-links">
        <div class="container">
            <div class="dash-discussions mb20">
                <div class="main-section">
                <div class="all-search-filters">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-filters">
                                        <div class="search-filters-left">	
                                            <div class="dropdown">										
                                                <a href="#" class="filter-d wt-mp dropdown-toggle-no-caret" role="button" data-toggle="dropdown" aria-expanded="false">Category<i class="fas fa-angle-down"></i></a>
                                                <div class="dropdown-menu cate-dropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                    <a class="link-item" href="#">Music</a>
                                                    <a class="link-item" href="#">Festival</a>											
                                                    <a class="link-item" href="#">Art</a>
                                                    <a class="link-item" href="#">Club</a>
                                                    <a class="link-item" href="#">Comedy</a>
                                                    <a class="link-item" href="#">Theatre</a>
                                                    <a class="link-item" href="#">Promotions</a>
                                                    <a class="link-item" href="#">Other</a>
                                                </div>	
                                            </div>	
                                        </div>
                                        <div class="search-filters-right dropdown">
                                            <a href="#" class="filter-d dropdown-toggle-no-caret" role="button" data-toggle="dropdown" aria-expanded="false">All Dates<i class="fas fa-angle-down"></i> </a>
                                            <div class="dropdown-menu date-dropdown dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(72px, 21px, 0px);">
                                                <a class="link-item" href="#">All Dates</a>
                                                <a class="link-item" href="#">Upcoming Events</a>		
                                                <a class="link-item" href="#">Past Events</a>
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="all-search-events">								
                        <div class="row">
                        @foreach($event_details as $single_event)
                            <div class="col-lg-6 col-md-6">
                                <div class="event-main-post">
                                    <div class="event-top">
                                        <div class="event-top-left">
                                            <a href="single_discussion_view.html"><h4><span>{{$single_event->title}}</span></h4></a>
                                        </div>
                                        <div class="event-top-right">
                                            <div class="ticket-price">Ticket Price : <span>{{
                                                
                                                empty($single_event->ticket_price)? '0 BDT' :
                                                $single_event->ticket_price.' '.$single_event->selling_currency}}</span></div>
                                            
                                            <div class="right-comments">
                                                <a href="#!" class="like-item" title="Share">
                                                    <i class="fas fa-share-alt"></i>
                                                    <!-- <span><ins>Share</ins> 21</span> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="event-main-image">
                                        <div class="main-photo">
                                            <div class="photo-overlay"></div>
                                            <img src="{{$single_event->image_path}}" alt="">
                                        </div>														
                                    </div>
                                    <div class="event-city-dt">
                                        <ul class="city-dt-list">
                                        
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    <div class="list-text-dt">
                                                        <span>Start Date</span>
                                                        <ins>{{ date("jS M Y g:i A", strtotime($single_event->start_date))}}</ins>
     
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-clock"></i>
                                                    <div class="list-text-dt">
                                                        <span>End Date</span>
                                                        <ins>{{ date("jS M Y g:i A", strtotime($single_event->end_date))}}</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-chair"></i>
                                                    <div class="list-text-dt">
                                                        <span>Seat</span>
                                                        <ins>{{$single_event->seat_number}}</ins>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="event-go-dt">
                                        <ul class="go-dt-list">
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-map-marker-alt" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>City</span>
                                                        <ins>{{$single_event->city}}</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-check" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>Sold Out</span>
                                                        <ins>0</ins>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="it-items">
                                                    <i class="fas fa-money-bill-wave" style="color:#a7a8aa;"></i>
                                                    <div class="list-text-dt">
                                                        <span>Collection</span>
                                                        <ins>0</ins>
                                                    </div>
                                                </div>
                                            </li>															
                                        </ul>
                                    </div>
                                    <div class="like-comments">
                                        <div class="left-comments">
                                            <a href="#" class="like-item" title="Manage Events">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span><ins>Manage Events</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="Attendee List">
                                                <i class="fas fa-users"></i>
                                                <span><ins>Attendee List</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="View">
                                                <i class="fas fa-eye"></i>
                                                <span><ins>View</ins></span>
                                            </a>
                                            <a href="#" class="like-item lc-left" title="Manage Ticket">
                                                <i class="fas fa-ticket-alt"></i>
                                                <span><ins>Manage Ticket</ins></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach   
                        </div>								
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Body End -->
<script src="{!! asset('master/js/jquery.min.js') !!}"></script>
@include('layouts.master_layout.footer')
<script>
    function searchToggle(obj, evt){
        var container = $(obj).closest('.search-wrapper');
            if(!container.hasClass('active')){
                container.addClass('active');
                evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                container.removeClass('active');
                // clear input
                container.find('.search-input').val('');
            }
    }
</script>
