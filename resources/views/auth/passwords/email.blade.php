@extends('layouts.app')

@section('content')
<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-md-offset-4 col-md-7">
            <a href="{{ url('/') }}">
                <div style="margin-left: 68px;width: 167px;"><img src="{!! asset('master/images/logo.png') !!}" style="width: 125%;margin-top: -30px;" alt=""></div> {{--{{ config('app.name', 'Laravel') }}--}}
            </a><br>

        </div>

    </div>
    <h3 align="center"> User Account Reset</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection