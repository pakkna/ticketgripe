@include('layouts.header')
@include('layouts.sidebar')

<!-- Dashboard Header  section -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                            <span class="d-inline-block pr-2">
                                <i class="lnr-apartment opacity-6"></i>
                            </span>
                            <span class="d-inline-block">{{$event_info->title}} information</span>
                        </div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>Dashboards</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Event
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <p>Default password =>^7t+dxQ%zAaSC7Wf</p>
                    <a href='https://ticketgripe.com' class='btn-hover-shine btn-shadow btn btn-info btn-md' target='_blank'>Log in to this account</a>
                    <button type="button" data-toggle="tooltip" data-placement="left" class="btn btn-dark" title="" data-original-title="Show a Toastr Notification!">
                        <i class="fa fa-battery-three-quarters"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Row section -->
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                        <input type="text" name="id" value="{{$event_info->id}}" hidden>
                        <div class="card-body ">
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group date" id="id_0">
                                        <span style="margin-right:5px;margin-top: 4px;">Event Start :</span>
                                        <input id="in_datetime" name="check_in" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($event_info->start_date)}}" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-left: 0;">
                                    <div class="input-group date" id="id_1">
                                        <span style="margin-right:5px;margin-top: 4px;">Event End :</span>
                                        <input id="out_datetime" name="check_out" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($event_info->end_date)}}" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-left: 0;">
                                    <div class="input-group date" id="id_1">
                                        <span style="margin-right:5px;margin-top: 4px;">Created At :</span>
                                        <input id="out_datetime" name="check_out" type="text" class="form-control" style="border-top-left-radius: .25rem;border-bottom-left-radius: .25rem;" value="{{javascript_dateformate($event_info->created_at)}}" required>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="section">
                                <div class="section">
                                    <!-- <h5 class="card-title" style="margin-top: 7px;" id="tourist_no">Tourist NO : #1</h5> -->
                                    <div class=" form-row" style="margin-top: 15px;">
                                        <div class="form-group form-line-height col-lg-12 col-md-12">
                                            <label class="input-label">Event Title <span class="important">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{$event_info->title}}" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Event Owner<span class="important">*</span></label>
                                            <input type="text" name="age" class="form-control" value="{{$event_info->fullname}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Owner Email <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$event_info->email}}" placeholder="Guest's Profession" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Tickets <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$total_ticket}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Event Status <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$event_info->event_status}}" placeholder="">
                                        </div>
                                    </div>

                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-12 col-md-12">
                                            <label class="input-label">Address<span class="important">*</span></label>
                                            <input type="text" name="age" class="form-control" value="{{$event_info->address}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">City <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$event_info->city}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">State <span class="important">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{$event_info->state}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Zip Code <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$event_info->zip}}" placeholder="">
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Country <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$event_info->country}}" placeholder="">
                                        </div>
                                    </div>

                                    <div class=" form-row">
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Collection<span class="important">*</span></label>
                                            <input type="text" name="age" class="form-control" value="{{round($total_credit,2)}} BDT" placeholder="" required>
                                        </div>
                                        
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Seat No. <span class="important">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{$event_info->seat_number}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Ticket Sold <span class="important">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{$total_ticket_sold}}" placeholder="" required>
                                        </div>
                                        <div class="form-group form-line-height col-lg-3 col-md-12">
                                            <label class="input-label">Attendee <span class="important">*</span></label>
                                            <input type="text" name="profession" class="form-control" value="{{$total_attendee}}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div id="googleMaps" class="google-map-container">
                                        <iframe src="https://www.google.com/maps?q={{$event_info->address}} {{$event_info->city}} {{$event_info->state}} {{$event_info->zip}} {{$event_info->country}}&output=embed" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group form-line-height">
                                        <label for="Description" class="card-header ">Description </label>
                                        {!! $event_info->description !!} 
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title" style="margin-top: 7px;" id="tourist_no">Sponsor</h5>
                            <div class="form-row">
                                @foreach($total_sponsor as $total_sponsor)
                                <div class="col-md-6">
                                    <div class="position-relative form-group form-line-height">
                                        <img src="{{asset('/')}}/{{$total_sponsor->sponser_logo}}" alt="">
                                        <label for="Description" class="card-header ">{{$total_sponsor->sponser_name}} </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

@include('layouts.footer')

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">