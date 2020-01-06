<script>

</script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <div class="setting-form">
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-info mr-2"></i> Ticket Order Form</h3>
                @if(count($all_tickets) != 0)
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal"><button class="setting-save-btn" type="button" style="margin-top: 0;"><i class="fas fa-plus mr-2"></i>Add Question</button></a>
                @endif
            </div>
            <div class="add-event-bg">
                <div class="flash_msg">
                    @if(Session::has('TicketQuestionSuccess'))
                        <div class="alert alert-success alert-dismissible text-center display-10" role="alert">
                            {{ Session::get('TicketQuestionSuccess') }}
                        </div>
                    @endif
                    @if(Session::has('TicketQuestionDanger'))
                        <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                            {{ Session::get('TicketQuestionDanger') }}
                        </div>
                    @endif
                </div>
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="all-search-events">								
                            <div class="row">
                                <table id="order_form_table" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th style="text-align: center;">Information to collect</th>
                                            <th>Type</th>
                                            <th>Collect Per</th>
                                            <th>Require</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody" id="order_form">
                                        <tr>
                                            <td>Name *</td>
                                            <td>Text Input</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="one" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        <tr>
                                            <td>Email  *</td>
                                            <td>Text Input</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="two" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        <tr>
                                            <td>Phone   *</td>
                                            <td>Text Input</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="three" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        @foreach($ticket_question as $single_question)
                                            <tr>
                                                <td>{{$single_question->question_title}}</td>
                                                <td>{{$single_question->question_type}}</td>
                                                <td>Order</td>
                                                <td>
                                                    <input type="checkbox" name="three" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2'></i>" data-off="" data-size="mini" checked>
                                                </td>
                                                <td> <a href='javascript:void(0)' data-toggle='modal' data-target='#editmoadal' onclick='edit_action("+row.id+")' title='Edit' class='btn-hover-shine btn-shadow btn custom-action btn-sm'><i class='fas fa-edit'></i></a>|<a href='javascript:void(0)'  onclick='ticket_delete("+row.id+",this)' title='Delete' class='btn-hover-shine btn-shadow btn custom-action btn-sm' ><i class='fa fa-trash'></i></a> </td>
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
    </div>
<!-- Body End -->
<script type="text/javascript" src="{!! asset('master/js/form-fields.js') !!}"></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/uniform/jquery.uniform.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="color: #FF7555;font-weight: 600;">Add custom questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{route('ticket-question-add')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <input type="text" name="event_id" value="{{$event_details->id}}" hidden/>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<script type="text/javascript">
    $(function() {
        changeFieldType();

        $("#fieldTypeSelect").change(function() {
            changeFieldType();
        });

        $("#ticketSpecific").change(function() {
            if ($(this).is(':checked')) {
                $("#tickets-container").show();
            } else {
                $("#tickets-container").hide();
            }
        });

    });

    function changeFieldType() {
        var selected = $('#fieldTypeSelect').children("option:selected").val();
        console.debug(selected);

        if (selected == 'SingleChoiceRadio' || selected == 'SingleChoiceDropDown' || selected == 'MultipleChoice') {
            console.debug('showing');
            $('#editFieldValuesBtnBox').show();
        } else {
            $('#editFieldValuesBtnBox').hide();
        }
    }

    @if(Session::has('TicketQuestionSuccess'))
        swal({
            title: "Ticket Action",
            text: "Ticket Question Added Successfully",
            icon: "success",
            buttons: false,
        })
    @endif
    
    @if(Session::has('TicketQuestionDanger'))
    swal({
        title: "Update Falid",
        text: "Ticket Question Added Error",
        icon: "error",
        buttons: false,
    })
    $(".swal-text").css('color', '#B40000');
    $(".swal-text").css('font-weight', '600');
    $(".swal-title").css('font-size', '18px');
    @endif   
</script>

