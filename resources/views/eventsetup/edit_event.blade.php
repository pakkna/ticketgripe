
<div class="setting-form">
    <div class="user-data full-width">
        <div class="about-left-heading">
            <h3> <i class="fas fa-edit mr-2"></i> Edit Event</h3>
        </div>
        <div class="add-event-bg"><br>
        <form class="form-horizontal" method="post" action="{{ route('edit-event') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                    <div class="flash_msg">
                       @if(Session::has('EventSuccess'))
                            <div class="alert alert-success alert-dismissible text-center display-15" role="alert">
                                {{ Session::get('EventSuccess') }}
                            </div>
                        @endif
                        @if(Session::has('EventDanger'))
                            <div class="alert alert-danger alert-dismissible text-center display-15" role="alert">
                                {{ Session::get('EventDanger') }}
                            </div>
                        @endif
                    </div>
                    <div class="input-section-item">
                        <div class="add-input-title">								
                            <i class="fas fa-pencil-alt"></i>
                            <h6>Event Title & Status*</h6>
                        </div>
                        <div class="add-input-items">
                            <div class="row">
                                <div class="col-md-8">
                                    <input class="add-inputs" name="event_title" type="text" value="{{$event_details->title}}" placeholder="Event Title Here">
                                    @if ($errors->has('event_title'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('event_title') }}</strong>
                                    </span>
                                    @endif
                                    <input  name="id" type="text" value="{{$event_details->id}}" hidden>
                                </div>
                                <div class="col-md-4">
                                    <div class="select-bg">									
                                            <select class="add-inputs payment-input wide custom-list" name="status">
                                                <?php if($event_details->event_status=='Active'){ ?>
                                                    <option value="Active">Active</option>
                                                    <option value="Cancel">Cancel</option>
                                                <?php }else{?>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Active">Active</option>
                                                <?php }?>   
                                            </select>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-section-item">
                        <div class="add-input-title">								
                            <i class="fas fa-pencil-alt"></i>
                            <h6>Customize Your Event Link</h6>
                        </div>
                        <div class="add-input-items">
                                <br>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text display-10" id="basic-addon4">http://ticketgripe.com/event/</span>
                                </div>
                                <input type="text" value="{{ !empty($event_details->custom_link)? $event_details->custom_link : ''}}" name="custom_link" class="form-control display-10" id="basic-url" aria-describedby="basic-addon4">
                                @if ($errors->has('custom_link'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('custom_link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                        </div>
                    </div>
                    <div class="input-section-item">
                        <div class="add-input-title">								
                            <i class="fas fa-image"></i>
                            <h6>Event Flyer*</h6>
                        </div>
                        <div class="add-input-items">
                            <div class="add-evnt-dt">											
                                <img class="event-add-img1 event-feature-img" id="imagePreview" src="{!!asset($event_details->image_path)!!}">
                                </img>
                                <script src="{!! asset('master/js/jquery3.3.1.js') !!}"></script>

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
                                               
                                               $('#imagePreview').attr('src', e.target.result);
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
                                <input class="add-inputs" type="text"  value="{{$event_details->country}}"  name="country" placeholder="Country" required>
                                @if ($errors->has('country'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                                <!-- <i class="fas fa-search ev-icon"></i> -->
                            </div>
                            <div class="add-evnt-dt">
                                <input class="add-inputs" value="{{ $event_details->address}}"  name="address" type="text" placeholder="Address" required>
                                @if ($errors->has('address'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="add-evnt-dt">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="add-inputs" value="{{ $event_details->city }}" name="city" type="text" placeholder="City" required>
                                        @if ($errors->has('city'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input class="add-inputs" value="{{$event_details->state }}" name="state" type="text" placeholder="State/Province" required>
                                        @if ($errors->has('state'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input class="add-inputs" value="{{ $event_details->zip }}"  name="zip" type="text" placeholder="Zip/Postal" required>
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
                                                <input value="{{ $event_details->start_date }}"  id="out_datetime" name="start_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
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
                                                <input id="out_datetime" value="{{ $event_details->end_date }}"  name="end_time" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" required>
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
                                                <input class="add-inputs"  name="seat_number" type="number" placeholder="Seat number" value="{{$event_details->seat_number }}" >
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
                                                 <?php echo '<option value="'.$event_details->category.'">'.$event_details->category.'</option>'; ?>
                                                 <option  value="">-------------</option>
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
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="checkbox" {{ $event_details->hide_date_event_page==1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck" style="font-size: 12px;">Hide Expire date on event page </label>
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
                            <textarea class="add-event-des" name="event_des" placeholder="Description here">{{$event_details->description}}</textarea>
                            <script>
                                CKEDITOR.replace('event_des');
                            </script>
                        </div>
                    </div>
                    <div class="upload-mp">
                        <button class="upload-btn" type="submit">Update Event</button>
                    </div>
                </form>
        
    </div>
</div>																																				
</div>	