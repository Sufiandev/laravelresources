<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="{{ asset('images/'.$settings->favicon) }}" />
		<title>{{ config('app.name', $settings->siteName ) }} Admin Dashboard</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">


		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<!-- Common CSS -->
		<link rel="stylesheet" href="{{ asset('backend_assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/fonts/icomoon/icomoon.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/css/main.css') }}" />

	</head>
	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div id="loader">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
			</div>
		</div>
		<!-- Loading ends -->
		<body class="">
			
		<div class="container">
			<div class="login-screen row align-items-center" style="width: 444px;margin: auto;">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<form  action='{{ url("login/admin") }}' method="POST">
						@csrf
						<div class="login-container">
							<div class="row no-gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="login-box">
										<a href="#" class="login-logo">
											<img src="{{ asset('images/'.$settings->logo) }}" alt="Logo" />
										</a>
										@if($errors->any())
										    @foreach ($errors->all() as $error)
										       <div class="alert alert-danger">{{ $error }}</div>
										    @endforeach
										@endif
										
										<div class="input-group">
											<span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
											<input type="text" class="form-control" name="email" placeholder="Email" aria-label="username" aria-describedby="username" required autofocus value="{{ old('email') }}">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
											<input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" aria-describedby="password" required>
										</div>
										<br>
		                                <div class="input-group ml-4">
		                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}

		                                </div>
                           		<div class="actions clearfix">
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<footer class="main-footer fixed-btm">
				Copyright {{config('app.name')}}  {{date('Y')}}
			</footer>
	</body>



		<!-- jQuery first, then Tether, then other JS. -->
		<script src="{{ asset('backend_assets/js/jquery.js') }}"></script>
		<script src="{{ asset('backend_assets/js/tether.min.js') }}"></script>
		<script src="{{ asset('backend_assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/unifyMenu/unifyMenu.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/onoffcanvas/onoffcanvas.js') }}"></script>
		<script src="{{ asset('backend_assets/js/moment.js') }}"></script>

		<!-- Slimscroll JS -->
		<script src="{{ asset('backend_assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

		

		<!-- Common JS -->
		<script src="{{ asset('backend_assets/js/common.js') }}"></script>
		
	</body>

<!-- Mirrored from bootstrap.gallery/unify-admin/design-1/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Feb 2018 12:05:45 GMT -->
</html>