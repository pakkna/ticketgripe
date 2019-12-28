@if(Session::has('flashMessageSuccess'))
    <div class="alert alert-success alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageSuccess') }}
    </div>
@endif

@if(Session::has('flashMessageAlert'))
    <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageAlert') }}
    </div>
@endif

@if(Session::has('flashMessageWarning'))
    <div class="alert alert-warning alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageWarning') }}
    </div>
@endif

@if(Session::has('flashMessageDanger'))
    <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('flashMessageDanger') }}
    </div>
@endif