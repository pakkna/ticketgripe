<form action="{{route('ticket-question-edit')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <input type="text" name="question_id" value="{{$ticket_question_details->id}}" hidden/>
    <input type="text" name="event_id" value="{{$ticket_question_details->event_id}}" hidden/>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <!-- <div class="portlet-title">
                    <div class="caption ">Order Form &gt; Question</div>
                </div> -->
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="form-group row mb-20 ">
                            <label for="label" class="control-label col-sm-4 col-xs-12">
                                Question Title<span class="required-indicator">*</span>
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="text" class="form-control" name="question_title" value="{{$ticket_question_details->question_title}}" id="label" required/>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-group row mb-20 required">
                            <label for="fieldType" class="control-label col-sm-4 col-xs-12">
                                Question Type<span class="required-indicator">*</span>
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <select id="fieldTypeSelect2" class="form-control" name="question_type" required="">
                                    <option value="{{$ticket_question_details->question_type}}">{{$ticket_question_details->question_type}}</option>
                                    <option value="Text">Text</option>
                                    <option value="Paragraph Text">Paragraph Text</option>
                                    <option value="Number">Number</option>
                                    <option value="Radio Buttons">Radio Buttons</option>
                                    <option value="Dropdown">Dropdown</option>
                                    <option value="Checkboxes">Checkboxes</option>
                                </select>
                                <script>
                                    var x = document.getElementById("fieldTypeSelect2");
                                    for (i = 1; i < x.options.length; i++) {
                                        if (x.options[i].value == '{{$ticket_question_details->question_type}}') {
                                            x.options[i].remove();
                                        }
                                    }
                                </script>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div id="editFieldValuesBtnBox2">
                            <div class="form-group mb-20 row">
                                <label for="fieldvaluesBtn" class="control-label col-sm-4 col-xs-12">
                                    Available Options
                                </label>
                                <div class="col-sm-8 col-xs-12" id="fieldValuesListBox">
                                    <table class="table table-striped table-hover" id="availableOptionTable2" style="margin-bottom: 0;">
                                        <tbody>
                                            <?php 
                                            if ($ticket_question_details->question_type == 'Radio Buttons' || 'Dropdown' || 'Checkboxes') {
                                                $array = array();
                                                $array = explode("~", $ticket_question_details->question_options);
                                                for ($i=0; $i < count($array); $i++) { 
                                                    echo '<tr><td><input type="text" name="choices[].label" value="'.$array[$i].'" class="payment-input cus-input"></td><td><button class="btn btn-xs btn-default btn-bg-custom option-up"><i class="fas fa-arrow-up"></i></button>&nbsp;<button class="btn btn-xs btn-default btn-bg-custom option-down"><i class="fas fa-arrow-down"></i></button>&nbsp;<button class="btn btn-xs btn-danger option-delete"><i class="fas fa-trash"></i></button></td></tr>';
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <div class="col-sm-12 margin-bottom-20">
                                        <button onclick="addOption2();" id="addOptionBtn2" type="button" class="btn btn-xs btn-primary">
                                            <i class="fa fa-plus"></i> Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-20 ">
                            <label for="instructions" class="control-label col-sm-4 col-xs-12">
                                Instructions
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <textarea class="form-control" name="instructions" id="instructions">{{$ticket_question_details->question_instruction}}</textarea>
                                <span class="help-inline"></span>
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="required" class="control-label col-sm-4 col-xs-12">
                                Required
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="checkbox" name="required" id="required" {{$ticket_question_details->answer_required == 'on' ? 'checked' : ''}} />
                                <span class="help-inline">Attendee has to provide an answer</span>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-group row  " id="ticket-specific-wrapper">
                            <label for="ticketSpecific2" class="control-label col-sm-4 col-xs-12">
                                Ticket Specific
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="checkbox" name="ticketSpecific" id="ticketSpecific2" checked required/>
                                <span class="help-inline">Ask This Question For Specific Ticket Types</span>
                                <span class="help-inline"></span>
                                <div class="col-sm-12" id="tickets-container2">
                                    <div class="form-group row  ">
                                        <div class="col-sm-8 col-xs-12">
                                            <?php 
                                            $array2 = array();
                                            $array2 = explode("~", $ticket_question_details->select_specific_ticket);
                                            
                                            foreach($all_tickets as $tickets){
                                                if(in_array($tickets->id,$array2)){
                                            ?>
                                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox" name="tickets[]" value="{{$tickets->id}}" checked>
                                                    </span>
                                                    <span class="help-inline">{{$tickets->ticket_type}}</span><br>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="checker">
                                                <span>
                                                    <input type="checkbox" name="tickets[]" value="{{$tickets->id}}">
                                                </span>
                                                <span class="help-inline">{{$tickets->ticket_type}}</span><br>
                                            </div>
                                    
                                            <?php }} ?> 
                                            @if ($errors->has('tickets'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tickets') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions text-center">
                        <button class="setting-save-btn mt-2" type="submit" style="margin-top: 0;">update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="{!! asset('master/js/form-fields2.js') !!}"></script>
<script>
    $(function() {
        changeFieldType2();

        $("#fieldTypeSelect2").change(function() {
            changeFieldType2();
        });

        $("#ticketSpecific2").change(function() {
            if ($(this).is(':checked')) {
                $("#tickets-container2").show();
            } else {
                $("#tickets-container2").hide();
            }
        });

    });
    function changeFieldType2() {
        var selected2 = $('#fieldTypeSelect2').children("option:selected").val();
        // console.debug(selected);

        if (selected2 == 'Radio Buttons' || selected2 == 'Dropdown' || selected2 == 'Checkboxes') {
            // console.debug('showing');
            $('#editFieldValuesBtnBox2').show();
        } else {
            $('#editFieldValuesBtnBox2').hide();
        }
    }
</script>