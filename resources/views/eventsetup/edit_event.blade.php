<div class="setting-form">
    <div class="user-data full-width">
    <form class="form-horizontal" method="post" action="{{ route('createEvent') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
                <div class="flash_msg">
                    @include("layouts.includes.flash")
                </div>
                <div class="input-section-item">
                    <div class="add-input-title">								
                        <i class="fas fa-pencil-alt"></i>
                        <h6>Event Title*</h6>
                    </div>
                    <div class="add-input-items">
                        <input class="add-inputs" name="event_title" type="text" value="{{ old('event_title') }}" placeholder="Event Title Here">
                        @if ($errors->has('event_title'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('event_title') }}</strong>
                        </span>
                        @endif
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
                                <p>Minimum image dimension : 1280 x 518</p>
                                @if ($errors->has('event_flyer'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('event_flyer') }}</strong>
                                </span>
                                @endif
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
                        <i class="fas fa-info-circle"></i>
                        <h6>Event Details*</h6>
                    </div>
                    <div class="add-input-items">										
                        <div class="add-evnt-dt">										
                            <input class="add-inputs" type="text"  value="{{ old('country') }}"  name="country" placeholder="Country" required>
                            @if ($errors->has('country'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                            @endif
                            <!-- <i class="fas fa-search ev-icon"></i> -->
                        </div>
                        <div class="add-evnt-dt">
                            <input class="add-inputs" value="{{ old('address') }}"  name="address" type="text" placeholder="Address" required>
                            @if ($errors->has('address'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="add-evnt-dt">
                            <div class="row">
                                <div class="col-md-4">
                                    <input class="add-inputs" value="{{ old('city') }}" name="city" type="text" placeholder="City" required>
                                    @if ($errors->has('city'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input class="add-inputs" value="{{ old('state') }}" name="state" type="text" placeholder="State/Province" required>
                                    @if ($errors->has('state'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input class="add-inputs" value="{{ old('zip') }}"  name="zip" type="text" placeholder="Zip/Postal" required>
                                    @if ($errors->has('zip'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>										
                        <div class="add-evnt-dt date-custom">											
                            <div class="row">											
                                <div class="col-md-6">											
                                    <div class="select-bg">									
                                    <div class="input-group date" id="id_0">
                                            <span class="date-span">Start Time :</span>
                                            <input value="{{ old('start_time') }}"  id="out_datetime" name="start_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            @if ($errors->has('start_time'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('start_time') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">											
                                    <div class="select-bg">									
                                    <div class="input-group date" id="id_1">
                                            <span class="date-span">End Time :</span>
                                            <input id="out_datetime" value="{{ old('end_time') }}"  name="end_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
                                            <div class="input-group-addon input-group-append">
                                                <div class="input-group-text">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            @if ($errors->has('end_time'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('end_time') }}</strong>
                                            </span>
                                            @endif
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
                        <h6>Event Seats & Category </h6>
                    </div>
                    <div class="add-input-items">
                        <div class="add-evnt-dt">											
                            <div class="row">											
                                <div class="col-md-4">
                                    <div class="select-bg">									
                                            <input class="add-inputs"  name="seat_number" type="number" placeholder="Seat number" value="{{ null !==old('seat_number') ? old('seat_number') : 0  }}" >
                                            @if ($errors->has('seat_number'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('seat_number') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                <div class="select-bg">									
                                        <select class=" add-inputs payment-input wide custom-list" name="category">
                                        <option value="Promotion">Promotion</option>
                                            <option value="Music">Music</option>
                                            <option value="Festival">Festival</option>
                                            <option value="Art">Art</option>
                                            <option value="Club">Club</option> 
                                            <option value="Others">Others</option>
                                        </select>    
                                    </div>
                                </div>
                                <div class="col-md-4">											
                                <div class="input-section-item" style="border: 0px solid red;">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="checkbox">
                                            <label class="custom-control-label" for="customCheck" style="font-size: 15px;">Hide Expire date on event page </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>									
                </div>
                <div class="input-section-item">
                    <div class="add-input-title">								
                        <i class="fas fa-pencil-alt"></i>
                        <h6>Event Description*</h6>
                    </div>
                    <div class="add-input-items">
                        <textarea class="add-event-des" name="event_des" placeholder="Description here">{{old('event_des') }}</textarea>
                        <script>
                            CKEDITOR.replace('event_des');
                        </script>
                    </div>
                </div>
                <div class="upload-mp">
                    <button class="upload-btn" type="submit">Create Event</button>
                </div>
            </form>
    </div>																																				
</div>	