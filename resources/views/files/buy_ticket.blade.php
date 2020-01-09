@include('layouts.master_layout.header_event_details')
    <div class="container">
        <div class="dash-tab-links">
            <div class="setting-form">
                <div class="user-data full-width">
                    <div class="event-sections">
                        <div class="container">
                            <div class="row" style="width: 100%;">
                                <div class="offset-md-2 col-md-8">
                                    <div class="select-bg" style="margin-bottom: 50px;">							
                                        <select id="ticket-select" class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="question_select">
                                            <option value="none">Select Ticket</option>
                                            @foreach($single_event_tickets as $alltickets)
                                                <option value="{{$alltickets->ticket_type}}">{{$alltickets->ticket_type}}</option>
                                            @endforeach
                                        </select>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="append-html" class="offset-md-2 col-md-8">
                
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
$('#ticket-select').on('change', function (e) {

        var ticket = this.value;
        $.ajax({

            url: '/buy-ticket-option',
            type: 'post',
            data: {
                ticket: ticket,
                event_id: {{Request::segment(2)}},
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) {    
            $('#append-html').html(response.html);
            }
        });

    });


</script>
    