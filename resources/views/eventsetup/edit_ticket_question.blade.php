<form action="{{route('ticket-question-add')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <input type="text" name="question_id" value="{{$ticket_question_details->id}}" hidden/>
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
                                <input type="text" class="form-control" name="question_title" value="" id="label" required/>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-group row mb-20 required">
                            <label for="fieldType" class="control-label col-sm-4 col-xs-12">
                                Question Type<span class="required-indicator">*</span>
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <select id="fieldTypeSelect" class="form-control" name="question_type" required="">
                                    <option value="SingleLineText">Text</option>
                                    <option value="MultiLineText">Paragraph Text</option>
                                    <option value="Number">Number</option>
                                    <option value="SingleChoiceRadio">Radio Buttons</option>
                                    <option value="SingleChoiceDropDown">Dropdown</option>
                                    <option value="MultipleChoice">Checkboxes</option>
                                </select>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div id="editFieldValuesBtnBox">
                            <div class="form-group mb-20 row">
                                <label for="fieldvaluesBtn" class="control-label col-sm-4 col-xs-12">
                                    Available Options
                                </label>
                                <div class="col-sm-8 col-xs-12" id="fieldValuesListBox">
                                    <table class="table table-striped table-hover" id="availableOptionTable" style="margin-bottom: 0;">
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <div class="col-sm-12 margin-bottom-20">
                                        <button onclick="addOption();" id="addOptionBtn" type="button" class="btn btn-xs btn-primary">
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
                                <textarea class="form-control" name="instructions" id="instructions"></textarea>
                                <span class="help-inline"></span>
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="required" class="control-label col-sm-4 col-xs-12">
                                Required
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="checkbox" name="required" id="required" />
                                <span class="help-inline">Attendee has to provide an answer</span>
                                <span class="help-inline"></span>
                            </div>
                        </div>
                        <div class="form-group row  " id="ticket-specific-wrapper">
                            <label for="ticketSpecific" class="control-label col-sm-4 col-xs-12">
                                Ticket Specific
                            </label>
                            <div class="col-sm-8 col-xs-12">
                                <input type="checkbox" name="ticketSpecific" id="ticketSpecific" required/>
                                <span class="help-inline">Ask This Question For Specific Ticket Types</span>
                                <span class="help-inline"></span>
                                <div class="col-sm-12" id="tickets-container" style="display: none">
                                    <div class="form-group row  ">
                                        <div class="col-sm-8 col-xs-12">
                                            @foreach($all_tickets as $tickets)
                                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox" name="tickets[]" value="{{$tickets->id}}" id="tickets[{{$tickets->id}}]" checked>
                                                    </span>
                                                    <span class="help-inline">{{$tickets->ticket_type}}</span><br>
                                                </div>
                                            @endforeach
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
                        <button class="setting-save-btn" type="submit" style="margin-top: 0;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>