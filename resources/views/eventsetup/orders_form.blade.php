<script>
    function toggle_btn(id,the) {
        var res=   $(the).prop('checked');
        $.ajax({

        url: '/ticket-toggle',
        type: 'post',
        data: {
            id: id,
            flag: res,
            '_token': $('meta[name="csrf-token"]').attr('content'),
        },
        dataType: 'json',
        success: function(response) {
            alert(res);
        }
    });
}

function loadjscssfile(filename, filetype){
        if (filetype=="js"){ //if filename is a external JavaScript file
            var fileref=document.createElement('script')
            fileref.setAttribute("type","text/javascript")
            fileref.setAttribute("src", filename)
        }
        else if (filetype=="css"){ //if filename is an external CSS file
            var fileref=document.createElement("link")
            fileref.setAttribute("rel", "stylesheet")
            fileref.setAttribute("type", "text/css")
            fileref.setAttribute("href", filename)
        }
        if (typeof fileref!="undefined")
            document.getElementById("cus-order-table").appendChild(fileref)
    }


</script>

    <link href="{!! asset('master/css/bootstrap4-toggle.min.css') !!}" rel="stylesheet">
    <script src="{!! asset('master/js/bootstrap4-toggle.min.js') !!}"></script>
    <div class="setting-form">
        <div class="user-data full-width">
            <div class="about-left-heading">
                <h3> <i class="fas fa-info mr-2"></i> Ticket Order Form</h3>
                @if(count($all_tickets) != 0)
                    <a href="javascript:void(0)" data-toggle='modal' data-target='#open_question_modal' ><button class="setting-save-btn" type="button" style="margin-top: 0;"><i class="fas fa-plus mr-2"></i>Add Question</button></a>
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
                    @if(Session::has('TicketQuestionUpdateDanger'))
                        <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                            {{ Session::get('TicketQuestionUpdateDanger') }}
                        </div>
                    @endif
                    @if(Session::has('TicketQuestionEditSuccess'))
                        <div class="alert alert-success alert-dismissible text-center display-10" role="alert">
                            {{ Session::get('TicketQuestionEditSuccess') }}
                        </div>
                    @endif
                    @if(Session::has('TicketQuestionEditDanger'))
                        <div class="alert alert-danger alert-dismissible text-center display-10" role="alert">
                            {{ Session::get('TicketQuestionEditDanger') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom: 0px !important;">
                            @foreach ($errors->all() as $error)
                                <li>* {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="row" id="custom-thead">
                    <div class="offset-md-6 col-md-6">
                        <div class="select-bg">									
                            <select id="select_ticket_id" class="nice-select add-inputs payment-input wide custom-list" style="margin-top: 0!important;" name="ticket_type_def">
                            @foreach($all_tickets as $single_ticket)
                            <option value="{{$single_ticket->id}}">{{$single_ticket->ticket_type}}</option>
                            @endforeach
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="dash-discussions mb20">
                    <div class="main-section">
                        <div class="all-search-events">								
                            <div class="row">
                                <!-- <table id="order_form_table" style="width:100%; text-align: center" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead class="custom-thead">
                                        <tr>
                                            <th style="text-align: center !important;">Information to collect</th>
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
                                            <input type="checkbox" name="one" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2' style='margin-top:-2px'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        <tr>
                                            <td>Email  *</td>
                                            <td>Text Input</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="two" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2' style='margin-top:-2px'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        <tr>
                                            <td>Phone   *</td>
                                            <td>Text Input</td>
                                            <td>Order</td>
                                            <td>
                                            <input type="checkbox" name="three" data-toggle="toggle" data-on="<i class='fa fa-check-circle mt--2' style='margin-top:-2px'></i>" data-off="" data-size="mini" checked disabled>
                                            </td>
                                            <td> --- </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>   -->
                            </div>								
                            <div class="row">
                                <table id="order_form_table" style="width:100%; text-align: center;" class="table table-hover table-striped table-bordered display nowrap">
                                    <thead id="custom-thead" class="custom-thead">
                                        <tr>
                                            <th style="text-align: center !important;">Information to collect</th>
                                            <th>Type</th>
                                            <th>Collect Per</th>
                                            <th>Require</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody" id="cus-order-table">
    
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
<script>
    function single_ticket_form(ticket_id){
        $.ajax({

            url: '/order_form_select',
            type: 'post',
            data: {
                ticket: ticket_id,
                event_id: {{Request::segment(2)}},
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            dataType: 'json',
            success: function(response) { 
                if (response.length == 0) {
                    $('#custom-thead').css('display', 'none');
                }   
                $('#cus-order-table').empty();
                var len = response.length;
                for (var i = 0; i < len; i++) {

                    if (i < 3) {
                        var disabled = "disabled";
                        var action = '---';
                        
                    }else{
                        var disabled = " ";
                        var action = '<a href="javascript:void(0)" data-toggle="modal" data-target="#largeModal2" onclick="edit_action_ques('+response[i]['id']+',{{$event_details->id}})" title="Edit" class="btn-hover-shine btn-shadow btn custom-action btn-sm"><i class="fas fa-edit"></i></a>|<a href="javascript:void(0)"  onclick="question_delete('+response[i]['id']+',this)" title="Delete" class="btn-hover-shine btn-shadow btn custom-action btn-sm" ><i class="fa fa-trash"></i></a>';
                    }
                    if ( response[i]['answer_required'] == 'on') {
                        var tick = "checked";
                    }else{
                        var tick = " ";
                    }
                    
                    $("#cus-order-table").append('<tr id="rem"><td nowrap>' + response[i]['question_title'] + '</td><td nowrap>' + response[i]['question_type'] + '</td><td nowrap> Order </center></td><td nowrap><center>' + '<input type="checkbox" id="toggle_switch" onchange="toggle_btn('+response[i]['id']+',this)" name="'+response[i]['id']+'" data-toggle="toggle" data-on="<i class='+"'fa fa-check-circle mt--2'"+' style='+"'margin-top: -2px;'"+'></i>" data-off="<span style='+"'position: relative;top: 2px;left:-5px;'"+'>Off</span>" data-size="mini" '+disabled+' '+tick+'>' + '</center></td><td nowrap>'+ action+'</td></tr>');
                }
        // loadjscssfile("/master/css/bootstrap4-toggle.min.css", "css");
            }

            
        });
    }

    $('#select_ticket_id').on('change', function (e) {


        single_ticket_form(this.value);
        loadjscssfile("/master/css/bootstrap4-toggle.min.css", "css");
        loadjscssfile("/master/js/bootstrap4-toggle.min.js", "js");

        });

        $('#select_ticket_id').change();

</script>
<!-- Modal -->
<div class="modal fade" id="open_question_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-width">
        <div class="modal-content" id="modalContent">
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
                                                    <option value="Text">Text</option>
                                                    <option value="Paragraph Text">Paragraph Text</option>
                                                    <option value="Number">Number</option>
                                                    <option value="Radio Buttons">Radio Buttons</option>
                                                    <option value="Dropdown">Dropdown</option>
                                                    <option value="Checkboxes">Checkboxes</option>
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
<!-- Modal -->
<div class="modal fade" id="largeModal2" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="color: #FF7555;font-weight: 600;">Add custom questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="ticket-update-modal">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<script>
    $("#modal1-open").on("click", function (ev) {
            $("#largeModal").modal({
                cache:false,
                keyboard: false
            }, "show");
        ev.preventDefault();
        return false;
    });    
    $("#largeModal").on('hidden.bs.modal', function () {
        $(this).data('bs.modal', null);
    });
</script>
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
        // console.debug(selected);

        if (selected == 'Radio Buttons' || selected == 'Dropdown' || selected == 'Checkboxes') {
            // console.debug('showing');
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
        title: "Ticket Addition Failed",
        text: {{ Session::get('TicketQuestionDanger') }},
        icon: "error",
        buttons: false,
    })
    $(".swal-text").css('color', '#B40000');
    $(".swal-text").css('font-weight', '600');
    $(".swal-title").css('font-size', '18px');
    @endif  

    @if(Session::has('TicketQuestionEditSuccess'))
        swal({
            title: "Ticket Action",
            text: "Ticket Question Updated Successfully",
            icon: "success",
            buttons: false,
        })
    @endif

    @if(Session::has('TicketQuestionUpdateDanger'))
        swal({
            title: "Ticket Action",
            text: "Ticket Question Update Unsuccessfull",
            icon: "error",
            buttons: false,
        })
    @endif
    
    @if(Session::has('TicketQuestionEditDanger'))
    swal({
        title: "Update Failed",
        text: "Ticket Question Added Error",
        icon: "error",
        buttons: false,
    })
    $(".swal-text").css('color', '#B40000');
    $(".swal-text").css('font-weight', '600');
    $(".swal-title").css('font-size', '18px');
    @endif 

   
</script>
<script>
function question_delete(id,the) {

$.ajax({

    url: '/question-delete',
    type: 'post',
    data: {
        id: id,
        '_token': $('meta[name="csrf-token"]').attr('content'),
    },
    dataType: 'json',
    success: function(response) {

        if (response==1) {

            $(the).closest("tr").fadeOut(200, function () {
                $(this).remove();
            });

            swal({
                title: "Question Delete Action",
                text: "Order Form Question Deleted Successfully",
                icon: "success",
                buttons: false,
            })

        }else{
            swal({
                title: "Falid",
                text: "Question Delete Action Error",
                icon: "error",
                buttons: false,
            })
        }
            $(".swal-text").css('color', '#F55F3D');
            $(".swal-text").css('font-weight', '600');
            $(".swal-title").css('font-size', '18px');

    }
});
}
function edit_action_ques(id,event_id){

$.ajax({

    url: '/ticket-question-update',
    type: 'post',
    data: {
        id: id,
        event_id: event_id,

        '_token': $('meta[name="csrf-token"]').attr('content'),
    },
    dataType: 'json',
    success: function(response) {    
    $('#ticket-update-modal').html(response.html);
    }
});
}
</script>

