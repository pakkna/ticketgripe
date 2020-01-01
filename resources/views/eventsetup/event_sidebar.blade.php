@include('layouts.master_layout.header_event')
    <div class="dash-tab-links">
        <div class="container">
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
                                <a id="tickets" onclick="openForm(2,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-paste mr-2" aria-hidden="true"></i>Tickets</a>
                                <a id="orders" onclick="openForm(3,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-shopping-cart mr-2"></i>Orders</a>
                                <a id="attende" onclick="openForm(4,this)" class="tab-item-1 tab-open" href="javascript:void(0)"><i class="fas fa-list"></i>Attende List</a>
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
                       @include('eventsetup.ticket_setup')					
                    </div>
                    <div id="3" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                       @include('eventsetup.orders') 					
                    </div>
                    <div id="4" class="col-lg-9 col-md-7 tab-pane" style="display: none;">	
                       @include('eventsetup.attendee_list') 					
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
    function openForm(tabAction, the) {
        var i, tabopen, click;
        tabopen = document.getElementsByClassName("tab-pane");
        click = document.getElementsByClassName("tab-open");
        for (i = 0; i < tabopen.length; i++) {
            tabopen[i].style.display = "none";
            click[i].classList.remove("active");
        }
        document.getElementById(tabAction).style.display = "block";
        if (the == 1) {
            document.getElementById("responsed").classList.add("active");
        } else {
            the.classList.add("active");
        }
    }
    <?php null !== Request::segment(3) ? $click=Request::segment(3):$click="overview" ?> 
    document.getElementById('{{$click}}').click();
</script>