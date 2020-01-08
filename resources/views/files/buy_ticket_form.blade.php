<div class="container">
    <div class="select-seats">
        <div class="vip-seats">
            <div class="text-seats-left">
                <h4>Book VIP Seats</h4>
                @if($single_event_tickets->show_sell_untill_date == 0)
                    <span>Sales end on {{date(('jS F, Y g:i:s A'), strtotime($single_event_tickets->untill_date))}}</span>
                @endif
                <div class="evnt-price">{{$single_event_tickets->ticket_price}} {{$single_event_tickets->selling_currency}}</div>
            </div>
            <div class="select-sts-right">
                <div class="select-bg" style="margin-bottom: 50px;">									
                    <select id="ticket-select" class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="question_select">
                    <?php for ($i=$single_event_tickets->min_ticket_per_order; $i <= $single_event_tickets->max_ticket_per_order ; $i++) { ?>
                            <option value="{{$i}}">{{$i}}</option>
                    <?php } ?>
                    </select>    
                </div>
            </div>
            @foreach($ticket_question as $one_ticket_question)
            <?php 
            $array2 = array();
            $array2 = explode("~", $one_ticket_question->select_specific_ticket);
            if($one_ticket_question->answer_required == 'on' && in_array($single_event_tickets->id,$array2) ){
                $array3 = array();
                $array3 = explode("~", $one_ticket_question->question_options);    
            ?>
                <?php
                if ($one_ticket_question->question_type == 'Checkboxes' || 'Radio Buttons') {
                for ($i=0; $i < count($one_ticket_question->question_options) ; $i++) { ?>

                    <input type="" value="" name="">

                <?php } }else{ ?>

                    <textarea name="" id="" cols="30" rows="10"></textarea>
                <?php } ?>

                <?php } ?>
            @endforeach
        </div>
    </div>
</div>
