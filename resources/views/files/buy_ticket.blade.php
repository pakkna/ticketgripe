@include('layouts.master_layout.header_event_details')
    <div class="container">
        <div class="dash-tab-links">
            <div class="setting-form">
                <div class="user-data full-width">
                    <div class="event-sections">
                        <div class="container">
                            <div class="custom-padd-ticket">
                                <div class="custom-border-ticket">
                                    <div class="row" style="width: 100%;">
                                        <div class="col-md-4">
                                            <div class="text-seats-left">
                                                <h4 style="margin-top: 10px;">Select Ticket Type</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select-bg" style="margin-bottom: 50px;">							
                                                <select id="ticket-select" class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="question_select">
                                                    @foreach($single_event_tickets as $alltickets)
                                                        <option value="{{$alltickets->ticket_type}}">{{$alltickets->ticket_type}}</option>
                                                    @endforeach
                                                </select>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div id="append-html" class="col-md-10">
                        
                                        </div>
                                    </div>
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
<script src="{!! asset('js/sweetalert.min.js') !!}"></script>

<script>
    @if(Session::has('BuyTicketMessageDanger'))
        swal({
            title: "Ticket Action",
            text: "Email address already taken ! please try again with another mail address",
            icon: "error",
            buttons: false,
        })
        $(".swal-text").css('text-align', 'center');
    @endif
</script>
<script>
function ticket_form(ticket_id){
    $.ajax({
        url: '/buy-ticket-option',
        type: 'post',
        data: {
            ticket: ticket_id,
            event_id: "{{Request::segment(3)}}",
            '_token': "{{csrf_token()}}",
        },
        dataType: 'json',
        success: function(response) {    
        $('#append-html').html(response.html);
        }
    });
}

$('#ticket-select').on('change', function (e) {

        ticket_form(this.value);

    });

    $('#ticket-select').change();
</script>
    