@include('layouts.master_layout.header_event')

    <div class="dash-tab-links">
        <div class="container" style="max-width: 1368px !important;">
            <div class="setting-page mb-20">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="user-data full-width">
                            <div class="categories-left-heading">
                                <h3>Your Details</h3>
                            </div>
                            <div class="categories-items">
                                <a id="overview" onclick="openForm(0,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-sitemap mr-2" aria-hidden="true"></i>Event Overview</a>
                                <a id="edit-event" onclick="openForm(1,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-edit mr-2" aria-hidden="true"></i>Edit Events</a>
                                <a id="create-ticket" onclick="openForm(2,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-plus mr-2" aria-hidden="true"></i>Add Ticket</a>
                                <a id="tickets" onclick="openForm(3,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-paste mr-2" aria-hidden="true"></i>Tickets</a>
                                <a id="order-form" onclick="openForm(4,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-shopping-cart mr-2"></i>Order Form</a>
                                <a id="orders" onclick="openForm(5,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-shopping-cart mr-2"></i>Orders</a>
                                <a id="attende" onclick="openForm(6,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-list"></i>Attende List</a>
                                <a id="sponser" onclick="openForm(7,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-list"></i>Sponser</a>
                            </div>
                        </div>
                    </div>
                    <div id="0" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        @include('eventsetup.event_overview')
                    </div>
                    <div id="1" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        @include('eventsetup.edit_event')
                    </div>
                    <div id="2" class="col-lg-9 col-md-7 tab-pane" style="display: none;">
                        @include('eventsetup.create_ticket')
                    </div>
                    <div id="3" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                       @include('eventsetup.ticket_setup')					
                    </div>
                    <div id="4" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                    @include('eventsetup.orders_form') 					
                    </div>
                    <div id="5" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                       @include('eventsetup.orders') 					
                    </div>
                    <div id="6" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                       @include('eventsetup.attendee_list') 					
                    </div>
                    <div id="7" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                       @include('eventsetup.sponser') 					
                    </div>		
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Body End -->

@include('layouts.master_layout.footer_events')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

<script>
    function openForm(tabAction, the) {
        var i, tabopen, click;
        tabopen = document.getElementsByClassName("tab-pane");
        click = document.getElementsByClassName("tab-open");
        for (i = 0; i < tabopen.length; i++) {
            tabopen[i].style.display = "none";
            click[i].classList.remove("active");
            window.history.pushState("object or string", "Title", "/event-setup/{{Request::segment(2)}}/"+the.id);
        }
        // var curDivContent = document.getElementById(tabAction).innerHTML;
        // document.getElementById(tabAction).innerHTML = " ";
        // document.getElementById(tabAction).innerHTML = curDivContent;
        document.getElementById(tabAction).style.display = "block";
        if (the == 1) {
            document.getElementById("responsed").classList.add("active");
        } else {
            the.classList.add("active");
        }
    }
    <?php null !== Request::segment(3) ? $click=Request::segment(3):$click="overview" ?> 
    document.getElementById('{{$click}}').click();
    window.history.pushState("object or string", "Title", "/event-setup/{{Request::segment(2)}}/{{$click}}");
</script>