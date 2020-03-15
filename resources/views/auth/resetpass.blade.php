<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Ticket Gripe - Reset Password Now</title>
		
        <!-- Favicon Icon -->
        <link rel="icon" type="image/png" href="{!! asset('master/images/icon1.png') !!}">
		
        <!-- Stylesheets -->
        <link href="{!! asset('master/css/responsive.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/style.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/datepicker.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('master/css/all.min.css') !!}" rel="stylesheet">
        <script src="{!! asset('master/js/jquery3.3.1.js') !!}"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js">
        </script>
    </head>

    <body class="body-bg" oncontextmenu="return false;">				
        <!-- Body Start -->	
        <main class="register-mp">	
            <div class="main-section">
                <div class="container">					
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <div class="login-register-bg">
                                <div class="row no-gutters">
                                    <div class="col-lg-6">
                                        <div class="lg-left">
                                            <div class="lg-logo">
                                                <a href="{{route('/')}}"><img src="{!! asset('master/images/logo.png') !!}" alt=""></a>
                                            </div>
                                            <div class="lr-text">
                                                <h2>Reset password</h2>
                                                <p>Ticketgripe.com a brand of Innovadeus Pvt Ltd.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="lr-right">
                                        <h4>Reset Your Password</h4>
                                            <div class="login-register-form">
                                            @include("layouts.includes.flash")
                                            <form class="form-horizontal reset_pass_form" method="POST" action="{{ route('reset_pass_post') }}">
                                                <input type="hidden" value="{{$token}}" name="token">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">									
                                                        <input class="title-discussion-input{{ $errors->has('new_pass') ? ' has-error' : '' }}" type="password" name="new_pass" placeholder="Your new password" required>
                                                        @if ($errors->has('new_pass'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new_pass') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">									
                                                        <input class="title-discussion-input{{ $errors->has('confirm_pass') ? ' has-error' : '' }}" type="password" name="confirm_pass" placeholder="Confirm Password" required>
                                                        @if ($errors->has('confirm_pass'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('confirm_pass') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <button class="login-btn" type="submit">Confirm</button>
                                                </form>
                                                <a href="{{ route('password.request')}}" class="forgot-link">Forgot Password?</a>
                                                <div class="regstr-link">Don’t have an account? <a href="{{route('sign-up')}}">Register Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>							
                    </div>										
										
                </div>
            </div>
        </main>
        <!-- Body End -->			
        @include('layouts.master_layout.footer')

<script>
    $(document).ready(function() {
        $('.reset_pass_form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                new_pass: {
                    message: 'This field is not valid',
                    validators: {
                        notEmpty: {
                            message: 'This field is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'password must be more than 6 and less than 30 characters long'
                        },
                    }
                },
                confirm_pass: {
                    message: 'This field is not valid',
                    validators: {
                        notEmpty: {
                            message: 'This field is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'password must be more than 6 and less than 30 characters long'
                        },
                    }
                },
            }
        });
    });
</script>