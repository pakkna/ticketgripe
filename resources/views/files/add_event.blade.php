@include('layouts.master_layout.header')

<script src="{!! asset('master/js/moment-with-locales.min.js') !!}"></script>
<link href="{!! asset('master/css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
<script src="{!! asset('master/js/jquery3.3.1.js') !!}"></script>
<script src="{!! asset('master/js/bootstrap-datetimepicker.min.js') !!}"></script>


<!-- Title Bar Start -->
<div class="title-bar">			
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="title-bar-text">
                    <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>							
                    <li class="breadcrumb-item active" aria-current="page">Add New Event</li>
                </ol>
            </div>		
        </div>		
    </div>		
</div>		
<!-- Title Bar End -->
<!-- Body Start -->	
<main class="discussion-mp">	
    <div class="main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-12 col-md-8">
                    <div class="checkout-heading text-center">
                        <h2>Add New Event</h2>								
                    </div>
                    <div class="add-event-bg">
                        <form>
                            <div class="input-section-item">
                                <div class="add-input-title">								
                                    <i class="fas fa-pencil-alt"></i>
                                    <h6>Event Title*</h6>
                                </div>
                                <div class="add-input-items">
                                    <input class="add-inputs" name="event-title" type="text" placeholder="Event Title Here">
                                </div>
                            </div>
                            <div class="input-section-item">
                                <div class="add-input-title">								
                                    <i class="fas fa-image"></i>
                                    <h6>Event Flyer*</h6>
                                </div>
                                <div class="add-input-items">
                                    <div class="add-evnt-dt">											
                                        <div class="event-add-img1 event-feature-img" id="imagePreview" style="background-image: url(master/images/event-view/demo.jpg);">
                                            <!-- <img src="{!! asset('master/images/homepage/center/post-img-1.jpg') !!}" alt=""> -->
                                        </div>
                                        <div class="addpic" id="OpenImgUpload">
                                            <input type="file" id="file" name="event_flyer">
                                            <label for="file">Choose File</label>
                                            <p>Minimum image dimension : 1920 x 420</p>
                                        </div>
                                        <script>
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                                                        $('#imagePreview').hide();
                                                        $('#imagePreview').fadeIn(650);
                                                    }
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                            $("#file").change(function() {
                                                readURL(this);
                                            });
                                        </script>
                                    </div>
                                </div>									
                            </div>
                            <div class="input-section-item">
                                <div class="add-input-title">								
                                    <i class="fas fa-pencil-alt"></i>
                                    <h6>Event Description*</h6>
                                </div>
                                <div class="add-input-items">
                                    <textarea class="add-event-des" name="event_des" placeholder="Description here"></textarea>
                                </div>
                            </div>
                            <div class="input-section-item">
                                <div class="add-input-title">								
                                    <i class="fas fa-ticket-alt"></i>
                                    <h6>Ticket Price*</h6>
                                </div>
                                <div class="add-input-items">
                                    <input class="add-inputs" name="ticket_price" type="text" placeholder="Enter Ticket Price">
                                </div>
                            </div>
                            <div class="input-section-item">
                                <div class="add-input-title">								
                                    <i class="fas fa-info-circle"></i>
                                    <h6>Event Details*</h6>
                                </div>
                                <div class="add-input-items">										
                                    <div class="add-evnt-dt">										
                                        <input class="add-inputs" type="text" name="country" placeholder="Country">
                                        <!-- <i class="fas fa-search ev-icon"></i> -->
                                    </div>
                                    <div class="add-evnt-dt">
                                        <input class="add-inputs" name="address" type="text" placeholder="Address">
                                    </div>
                                    <div class="add-evnt-dt">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input class="add-inputs" name="city" type="text" placeholder="City">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="add-inputs" name="state" type="text" placeholder="State/Province">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="add-inputs" name="zip" type="text" placeholder="Zip/Postal">
                                            </div>
                                        </div>
                                    </div>										
                                    <div class="add-evnt-dt date-custom">											
                                        <div class="row">											
                                            <div class="col-md-6">											
                                                <div class="select-bg">									
                                                <div class="input-group date" id="id_0">
                                                        <span class="date-span">Start Time :</span>
                                                        <input id="out_datetime" name="start-time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                                        <div class="input-group-addon input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">											
                                                <div class="select-bg">									
                                                <div class="input-group date" id="id_1">
                                                        <span class="date-span">End Time :</span>
                                                        <input id="out_datetime" name="end_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                                        <div class="input-group-addon input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>									
                            </div>
                            <div class="input-section-item">
                                <div class="add-input-title">								
                                    <i class="fas fa-check-square"></i>
                                    <h6>Event Venue and Seats*</h6>
                                </div>
                                <div class="add-input-items">
                                    <div class="add-evnt-dt">											
                                        <div class="row">											
                                            <div class="col-md-6">
                                            <div class="select-bg">									
                                                    <input class="add-inputs" type="number" placeholder="seat number" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">											
                                            <div class="input-section-item" style="border: 0px solid red;">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="checkbox">
                                                        <label class="custom-control-label" for="customCheck" style="font-size: 15px;">Hide end date on Event page </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>									
                            </div>
                            <div class="upload-mp">
                                <button class="upload-btn" type="submit">Upload Event</button>
                            </div>
                        </form>
                    </div>															
                </div>											
            </div>					
        </div>
    </div>
</main>
<!-- Body End -->	
@include('layouts.master_layout.footer')

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>\
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
        
<script>
    $(document).ready(function() {
    $('#id_0').datetimepicker({
        "allowInputToggle": true,
        "showClose": true,
        "showClear": true,
        "showTodayButton": true,
        "format": "MM/DD/YYYY hh:mm:ss A",
    });
    $('#id_1').datetimepicker({
        "allowInputToggle": true,
        "showClose": true,
        "showClear": true,
        "showTodayButton": true,
        "format": "MM/DD/YYYY hh:mm:ss A",
    });
});
</script>
