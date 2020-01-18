<div class="">
    <div class="select-seats">
        <form action="{{route('ticket-generate')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="ticket_id" id="" value="{{$single_event_tickets->id}}">
        <div class="vip-seats">
            <div class="text-seats-left" style="width: 78%;">
            <?php
            $current_time = strtotime(date('Y-m-d H:i:s')); 
            $event_end = strtotime($single_event->end_date); 
            $event_start = strtotime($single_event->start_date); 
            $ticket_start = strtotime($single_event_tickets->selling_date); 
            $ticket_end = strtotime($single_event_tickets->untill_date); 
            if($current_time > $event_end){ ?>

            <div class="alert alert-danger alert-dismissible text-center display-15" style="float: right;padding-right: 20px;" role="alert">
                <h4 style="display: inline-block;"> Event has expired !</h4><br>
            </div>

            <?php } else if ($single_event->event_status == 'Cancel') {  ?>

                <div class="alert alert-danger alert-dismissible text-center display-15" style="float: right;padding-right: 20px;" role="alert">
                 <h4 style="display: inline-block;"> Event is on hold !</h4><br>
                </div>

            <?php } else if ($current_time < $ticket_start) {  ?>

                <div class="alert alert-danger alert-dismissible text-center display-15" style="float: right;padding-right: 20px;" role="alert">
                    <h4 style="display: inline-block;"> Event ticket will start selling soon !</h4><br>
                </div>

            <?php } else if ($current_time > $ticket_end) {  ?>

                <div class="alert alert-danger alert-dismissible text-center display-15" style="float: right;padding-right: 20px;" role="alert">
                    <h4 style="display: inline-block;"> Ticket has expired !</h4><br>
                </div>

            <?php } else if ($single_event->seat_number <= $total_ticket_sold_count) {  ?>

                <div class="alert alert-danger alert-dismissible text-center display-15" style="float: right;padding-right: 20px;" role="alert">
                    <h4 style="display: inline-block;"> Event Ticket sold out !</h4><br>
                </div>

            <?php } else if ($stock == true) {  ?>

                <div class="alert alert-danger alert-dismissible text-center display-15" style="float: right;padding-right: 20px;" role="alert">
                    <h4 style="display: inline-block;"> {{$single_event_tickets->ticket_type}} - Ticket stock out !</h4><br>
                </div>

            <?php }else{ ?>

                <div class="row">
                    <div class="col-md-7">
                        <h4 style="display: inline-block;">Book {{$single_event_tickets->ticket_type}} Seats</h4><br>
                        @if($single_event_tickets->show_sell_untill_date != 0)
                            <span>Sales end on {{date(('jS F, Y g:i:s A'), strtotime($single_event_tickets->untill_date))}}</span>
                        @endif
                    </div>
                    <div class="col-md-5">
                    <div class="evnt-price" style="display: inline-block;margin-top: 0px;">Price : {{$single_event_tickets->ticket_price}} {{$single_event_tickets->selling_currency}}</div>
                    </div>
                </div>
            </div>
            <div class="select-sts-right">
                <div class="select-bg">									
                    <select id="ticket-select" class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="ticket_count">
                    <?php 
                    
                    $total_single_ticket = $single_event_tickets->quantity; //10
                    $total_seat = $single_event->seat_number; //30
                    $total_single_ticket_left = $total_seat - $total_ticket_sold_count;//28
                    $single_ticket_seat_left = $total_single_ticket - $count;

                    if ($single_event_tickets->max_ticket_per_order < $total_single_ticket_left) {
                        if ($single_event_tickets->max_ticket_per_order > $single_ticket_seat_left) {
                            $limit = $single_ticket_seat_left;
                        }else{
                            $limit = $single_event_tickets->max_ticket_per_order;
                        }
                    }else{
                        $limit = $total_single_ticket_left;
                    }
                    for ($i=1; $i <= $limit ; $i++) { ?>
                            <option value="{{$i}}">{{$i}}</option>
                    <?php } ?>
                    </select>   
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%;">
            <div class="col-md-12">
                    <div class="custom-question-form mt-20">
                        <!-- <div class="form-group" style="margin-top: 5px;">
                            <label>#Your Full Name *</label>
                            <input type="text" class="payment-input" name="fullname" value="" required>
                        </div>
                        <div class="form-group" style="margin-top: 5px;">
                            <label>#Your Email *</label>
                            <input type="email" class="payment-input" name="email" value="" required>
                        </div>
                        <div class="form-group" style="margin-top: 5px; margin-bottom: 15px !important;">
                            <label>#Your Mobile Number *</label>
                            <input type="text" class="payment-input" name="mobile" value="" required>
                        </div> -->
                        <?php $question_id_array = array(); ?>
                        @foreach($ticket_question as $one_ticket_question)
                        <div class="group-element">
                            <?php 
                            $array2 = array();
                            $array2 = explode("~", $one_ticket_question->select_specific_ticket);
                            if($one_ticket_question->answer_required == 'on' && in_array($single_event_tickets->id,$array2) ){
                                array_push($question_id_array, $one_ticket_question->id);
                                $array3 = (object)array();
                                $array3 = explode("~", $one_ticket_question->question_options);    
                            ?>
                                <h5 class="header-buy-tickt">#{{$one_ticket_question->question_title}} *</h5>
                                <?php
                                if ($one_ticket_question->question_type == 'Checkboxes' || $one_ticket_question->question_type == 'Radio Buttons') {
                                for ($i=0; $i < count($array3) ; $i++) {
                                    if ($one_ticket_question->question_type == 'Checkboxes') { ?>
                                        <input type="checkbox" value="{{$array3[$i]}}" name="{{$one_ticket_question->question_title}}" checked>
                                   <?php }else{ ?>
                                        <input type="radio" value="{{$array3[$i]}}" name="{{$one_ticket_question->question_title}}" required>
                                   <?php }?>
                                        <span class="help-inline" style="font-size: 13px;">{{$array3[$i]}}</span><br>
                
                                <?php } }else if($one_ticket_question->question_type == 'Number'){ ?>
                
                                    <input type="number" class="payment-input" name="{{$one_ticket_question->question_title}}" required><br>
        
                                <?php }else if($one_ticket_question->question_type == 'Dropdown'){ 
                                    echo '<select class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="'.$one_ticket_question->question_title.'" id="" required>';
                                    for ($i=0; $i < count($array3) ; $i++){
                                    ?>
                                        <option value="{{$array3[$i]}}">{{$array3[$i]}}</option>
        
                                <?php } echo '</select>'; }else if($one_ticket_question->question_type == 'Text'){ ?>
                                    <input type="text" class="payment-input" name="{{$one_ticket_question->question_title}}" required><br>
                                <?php }else if($one_ticket_question->question_type == 'Email'){ ?>
                                    <input type="email" class="payment-input" name="{{$one_ticket_question->question_title}}" required><br>
                                <?php }else{ ?>
                                    <textarea class="replt-comnt" name="{{$one_ticket_question->question_title}}" id="" cols="30" rows="10" required></textarea><br>
                                <?php } ?>
        
                                <?php if(count($one_ticket_question->question_instruction)){ ?>
                                <p>*{{$one_ticket_question->question_instruction}}</p>
                                <?php } ?>
                      
                                <?php } ?>

                            
                        </div>
                        @endforeach
                        <label>#Billing Address *</label>
                       <input type="text" class="payment-input" name="address" required>
                        <div class="add-crdt-amnt">
                            <button class="setting-save-btn" type="submit">Submit</button>
                        </div>
                                <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
