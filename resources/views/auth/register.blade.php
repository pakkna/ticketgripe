<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">
		<title>Ticket Gripe - Register Now</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="{!! asset('master/images/icon1.png') !!}">
		
		<!-- Stylesheets -->
		<link href="{!! asset('master/css/responsive.css') !!}" rel="stylesheet">
		<link href="{!! asset('master/css/style.css') !!}" rel="stylesheet">
		<link href="{!! asset('master/css/datepicker.min.css') !!}" rel="stylesheet">
		<link href="{!! asset('master/css/bootstrap.min.css') !!}" rel="stylesheet">
		<link href="{!! asset('master/css/all.min.css') !!}" rel="stylesheet">
		<link href="{!! asset('master/css/owl.carousel.css') !!}" rel="stylesheet">
		<link href="{!! asset('master/css/owl.theme.default.min.css') !!}" rel="stylesheet">
	
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
												<h2>Register Now</h2>
												<p>Ticketgripe.com a brand of Innovadeus Pvt Ltd.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="lr-right">
											<h4>Sign Up to Ticket Gripe</h4>
											<div class="login-register-form">
											@include("layouts.includes.flash")
												<form class="form-horizontal" method="POST" action="{{ route('user.register') }}">
											     	{{ csrf_field() }}
													<div class="form-group">									
														<input class="title-discussion-input{{ $errors->has('username') ? ' has-error' : '' }}" type="text" name="username" placeholder="User Name" value="{{ old('username') }}" required>
														@if ($errors->has('username'))
														<span class="help-block">
															<strong>{{ $errors->first('username') }}</strong>
														</span>
														@endif
													</div>
													<div class="form-group">									
														<input class="title-discussion-input{{ $errors->has('fullname') ? ' has-error' : '' }}" type="text" name="fullname" placeholder="Your Name" value="{{ old('fullname') }}" required>
														@if ($errors->has('fullname'))
														<span class="help-block">
															<strong>{{ $errors->first('fullname') }}</strong>
														</span>
														@endif
													</div>
													<div class="form-group">									
														<input class="title-discussion-input{{ $errors->has('email') ? ' has-error' : '' }}" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
														@if ($errors->has('email'))
														<span class="help-block">
															<strong>{{ $errors->first('email') }}</strong>
														</span>
														@endif
													</div>
													<div class="form-group">								 	
														<input class="title-discussion-input{{ $errors->has('name') ? ' has-error' : '' }}" type="password" name="password" placeholder="Password" required>
														@if ($errors->has('password'))
														<span class="help-block">
															<strong>{{ $errors->first('password') }}</strong>
														</span>
														@endif
													</div>													
													<div class="rgstr-dt-txt">
														By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a> and <a href="#">Cookie Policy</a>. You may receive Email notifications from us and can opt out at any time.
													</div>
													<button class="login-btn" type="submit">Register Now</button>
													<div class="login-link">If you have an account? <a href="{{route('login')}}">Login Now</a></div>
												</form>											
												
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