<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">
		<title>Ticket Gripe - Login Now</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="{!! asset('master/images/fav.png') !!}">
		
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
												<a href="{{route('/')}}"><img src="{!! asset('master/images/login-register/logo.svg') !!}" alt=""></a>
											</div>
											<div class="lr-text">
												<h2>Login Now</h2>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum blandit felis a hendrerit.</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="lr-right">
										<h4>Sign In to Ticket Gripe</h4>
											<div class="login-register-form">
												<form>
													<div class="form-group">									
														<input class="title-discussion-input" type="email" name="email" placeholder="Type Email or Phone Number" required>
													</div>
													<div class="form-group">									
														<input class="title-discussion-input" type="password" name="password" placeholder="Password" required>
													</div>
													<button class="login-btn" type="submit">Login Now</button>
												</form>
												<a href="#" class="forgot-link">Forgot Password?</a>
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
		<script src="{!! asset('master/js/jquery.min.js') !!}"></script>
		@include('layouts.master_layout.footer')

