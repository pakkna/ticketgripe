@include('layouts.master_layout.header')
<link rel="stylesheet" href="{!!asset('master/css/dataTables.bootstrap4.min.css') !!}">
    <div class="dash-tab-links">
        <div class="container">
            <div class="dash-discussions mb20">
                <div class="main-section">
                    <div class="all-search-events">
                    @include("layouts.includes.flash")								
                        <div class="row">
                            <table id="example" style="width:100%; text-align: center">
                                <thead style="display: none;">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                            <tbody class="row">
                            @foreach($event_details as $single_event)
                                <tr class="col-lg-6 col-md-6">
                                    <td class="event-main-post">
                                        <div class="event-top">
                                            <div class="event-top-left">
                                                <a href="/event-setup/{{$single_event->id}}"><h4><i class="like-item fas fa-link mr-2"></i><span>{{$single_event->title}}</span></h4></a>
                                            </div>
                                            <div class="event-top-right">
                                                <!-- <div class="ticket-price">Ticket Price : <span>{{
                                                    
                                                    empty($single_event->ticket_price)? '0 BDT' :
                                                    $single_event->ticket_price.' '.$single_event->selling_currency}}</span>
                                                </div> -->
                                                
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
                                                @if($single_event->image_path == null)
                                                <img src="{!! asset('master/images/demo.jpg') !!}" alt="">
                                                @else
                                                <img src="{{$single_event->image_path}}" alt="">
                                                @endif
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
                                                <li style="width: 25%;">
                                                    <div class="it-items">
                                                        <i class="fas fa-chair"></i>
                                                        <div class="list-text-dt">
                                                            <span>Seat</span>
                                                            <ins>{{$single_event->seat_number}}</ins>
                                                        </div>
                                                    </div>
                                                </li>
                                           
                                                <li style="width: 0px;">
                                                   <div class="it-items">
                                                        <i class="fas fa-info"></i>
                                                        <div class="list-text-dt">
                                                            <span>Status</span>
                                                            <ins>{{$single_event->event_status}}</ins>
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
            <?php 
            $total_collection_my = 0;
            $total_sold_my = 0;

            $total_ticket_details_admin = DB::table('orders')->select('sold_amount','sold_tickets')->where('event_id', $single_event->id)->get();

            foreach ($total_ticket_details_admin as $group855) {
                $total_collection_my += $group855->sold_amount;
                $total_sold_my += $group855->sold_tickets;
            }
            ?>
                                                    <div class="it-items">
                                                        <i class="fas fa-check" style="color:#a7a8aa;"></i>
                                                        <div class="list-text-dt">
                                                            <span>Sold Out</span>
                                                            <ins>{{$total_sold_my}}</ins>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="it-items">
                                                        <i class="fas fa-money-bill-wave" style="color:#a7a8aa;"></i>
                                                        <div class="list-text-dt">
                                                            <span>Collection</span>
                                                            <ins>{{$total_collection_my}} BDT</ins>
                                                        </div>
                                                    </div>
                                                </li>															
                                           </ul>
                                    </div>
                                    <div class="like-comments">
                                        <div class="left-comments">
                                            <a href="/event-setup/{{$single_event->id}}" class="like-item" title="Manage Events">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span><ins>Manage Events</ins></span>
                                            </a>
                                            <a href="/event-setup/{{$single_event->id}}/tickets" class="like-item lc-left" title="Manage Ticket">
                                                <i class="fas fa-ticket-alt"></i>
                                                <span><ins>Manage Ticket</ins></span>
                                            </a>
                                            <a href="/event-setup/{{$single_event->id}}/attende" class="like-item lc-left" title="Attendee List">
                                                <i class="fas fa-users"></i>
                                                <span><ins>Attendee List</ins></span>
                                            </a>
                                            <a href="/delete-event/{{$single_event->id}}" class="like-item lc-left" title="Delete">
                                                <i class="fa fa-trash-alt"></i>
                                                <span><ins>Delete</ins></span>
                                            </a>
                                        </div>
                                    </div>    
                                    </td>
                                </tr>
                            @endforeach 
                            </tbody>
                            </table>  
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
<script src="{!! asset('master/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('master/js/dataTables.bootstrap4.min.js') !!}"></script>
<script>
    $(document).ready(function() {
        $(".dataTables_empty").css('width', '1000px');
        $('#example').DataTable();
        $("#example_wrapper").css('width', '100%');
        $(".datatable_custom_wrap").css('overflow-x', 'hidden');
    });
</script>