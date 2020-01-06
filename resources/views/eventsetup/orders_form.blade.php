<script>

</script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <div class="setting-form">
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-info mr-2"></i> Ticket Order Form</h3>
                <a href="#!" data-toggle="modal" data-target="#largeModal"><button class="setting-save-btn" type="button" style="margin-top: 0;"><i class="fas fa-plus mr-2"></i>Add Question</button></a>
            </div>
            <div class="add-event-bg">
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="all-search-events">
                        @include("layouts.includes.flash")								
                            <div class="row">
                                <table id="order_form_table" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th>Information to collect</th>
                                            <th>Collect Per</th>
                                            <th>Require</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody" id="order_form">
                                        <tr>
                                            <td>Name *</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="one" data-toggle="toggle" data-on="<i class='fa fa-check-circle'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        <tr>
                                            <td>Email  *</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="two" data-toggle="toggle" data-on="<i class='fa fa-check-circle'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>

                                        </tr>
                                        <tr>
                                            <td>Phone   *</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="three" data-toggle="toggle" data-on="<i class='fa fa-check-circle'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>

                                        </tr>
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

<!-- Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="color: #FF7555;font-weight: 600;">Add custom questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/admin/orderField/save" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="eventId" value="1023681" id="eventId" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption ">Order Form &gt; Question</div>
                                </div>
                                <div class="portlet-body">
                                    <div class="form-body">
                                        <div class="form-group row  ">
                                            <label for="label" class="control-label col-sm-4 col-xs-12">
                                                Question Prompt<span class="required-indicator">*</span>
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <input type="text" class="form-control" name="label" value="" id="label" />
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row  required">
                                            <label for="fieldType" class="control-label col-sm-4 col-xs-12">
                                                Question Type<span class="required-indicator">*</span>
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <select id="fieldTypeSelect" class="form-control" name="fieldType" required="">
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
                                            <div class="form-group row">
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
                                        <div class="form-group row  ">
                                            <label for="instructions" class="control-label col-sm-4 col-xs-12">
                                                Instructions
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <textarea class="form-control" name="instructions" id="instructions"></textarea>
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row  required">
                                            <label for="orderFormType" class="control-label col-sm-4 col-xs-12">
                                                Collect Per
                                                <span class="required-indicator">*</span>
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <select name="orderFormType" class="form-control" required="" id="orderFormType">
                                                    <option value="PER_ORDER">Order</option>
                                                    <option value="PER_ATTENDEE">Attendee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="required" class="control-label col-sm-4 col-xs-12">
                                                Display Answer
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <input type="hidden" name="_showAnswerOnTicket" /><input type="checkbox" name="showAnswerOnTicket" id="showAnswerOnTicket" />
                                                <span class="help-inline">Display attendee answer on the ticket</span>
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="required" class="control-label col-sm-4 col-xs-12">
                                                Required
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <input type="hidden" name="_required" /><input type="checkbox" name="required" id="required" />
                                                <span class="help-inline">Attendee has to provide an answer</span>
                                                <span class="help-inline"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row  " id="ticket-specific-wrapper">
                                            <label for="ticketSpecific" class="control-label col-sm-4 col-xs-12">
                                                Ticket Specific
                                            </label>
                                            <div class="col-sm-8 col-xs-12">
                                                <input type="hidden" name="_ticketSpecific" /><input type="checkbox" name="ticketSpecific" id="ticketSpecific" />
                                                <span class="help-inline">Ask This Question For Specific Ticket Types</span>
                                                <span class="help-inline"></span>
                                                <div class="col-sm-12" id="tickets-container" style="display: none">
                                                    <div class="form-group row  ">
                                                        <div class="col-sm-8 col-xs-12">

                                                            <input type="hidden" name="tickets[0]._id" /><input type="checkbox" name="tickets[0].id" value="12101" id="tickets[0].id" />
                                                            <span class="help-inline">General Admission</span><br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions text-center">
                                        <input type="submit" name="save" class="save btn green btn-lg" value="Save" id="save" />
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
</script>