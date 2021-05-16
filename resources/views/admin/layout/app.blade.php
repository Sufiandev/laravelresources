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
		<title>{{ config('app.name', 'POS') }} Admin Dashboard</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">


		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<!-- Common CSS -->
		<link rel="stylesheet" href="{{ asset('backend_assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/fonts/icomoon/icomoon.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/css/main.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/vendor/datatables/dataTables.bs4.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/vendor/datatables/dataTables.bs4-custom.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend_assets/vendor/summernote/summernote-bs4.css') }}" />

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

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">
			<!-- BEGIN .app-heading -->
			<header class="app-header">
				<div class="container-fluid">
					<div class="row gutters">
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
							<a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
								<i class="icon-menu5"></i>
							</a>
							<a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
								<i class="icon-chevron-thin-left"></i>
							</a>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-4">
							<a href="" class="logo">
								<img src="{{ asset('images/'.$settings->logo) }}" alt=" Admin Dashboard" />
							</a>
						</div>
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
							<ul class="header-actions">
								
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<img class="avatar" src="{{ asset('images/thumb/'.Auth::user()->image) }}" alt="User Thumb" />
										<span class="user-name">{{ Auth::user()->name }} </span>
										<i class="icon-chevron-small-down"></i>
									</a>
									<div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
									
										<div class="logout-btn">
											<a class="btn btn-primary" href="{{ route('admin.logout') }}"
		                                       onclick="event.preventDefault();
		                                                     document.getElementById('logout-form').submit();">
		                                        {{ __('Logout') }}
		                                    </a>

											<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
		                                        @csrf
		                                    </form>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<!-- END: .app-heading -->
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<!-- BEGIN .app-side -->
				<aside class="app-side" id="app-side">
					<!-- BEGIN .side-content -->
					<div class="side-content ">
						<!-- BEGIN .user-profile -->
						<div class="user-profile">
							<img src="{{ asset('images/thumb/'.Auth::user()->image) }}" class="profile-thumb" alt="User Thumb">
							<h6 class="profile-name"> {{ Auth::user()->name }} </h6>
						
						</div>
						<!-- END .user-profile -->
						<!-- BEGIN .side-nav -->
						<nav class="side-nav">
							<!-- BEGIN: side-nav-content -->
							<ul class="unifyMenu" id="unifyMenu">
								
								<li class="@if ($menu == 'dashboard') active selected @endif">
									<a href="{{ url('admin') }}">
										<span class="has-icon">
											<i class="icon-laptop4"></i>
										</span>
										<span class="nav-title">Dashboard</span>
									</a>
								</li>
								<li class="@if ($menu == 'cmsuser') active selected @endif" >
									<a href="{{ url('admin/cmsuser') }}">
										<span class="has-icon">
											<i class="icon-profile-male"></i>
										</span>
										<span class="nav-title"> CMS USER </span>
									</a>
								</li>
								<li class="@if ($menu == 'categories') active selected @endif" >
									<a href="{{ url('admin/categories') }}">
										<span class="has-icon">
											<i class="icon-layers3"></i>
										</span>
										<span class="nav-title"> Categories </span>
									</a>
								</li>
								<li class="@if ($menu == 'products') active selected @endif" >
									<a href="{{ url('admin/products') }}">
										<span class="has-icon">
											<i class="icon-tags"></i>
										</span>
										<span class="nav-title"> Products </span>
									</a>
								</li>
								<li class="@if ($menu == 'blog') active selected @endif" >
									<a href="{{ url('admin/blog') }}">
										<span class="has-icon">
											<i class="icon-newspaper"></i>
										</span>
										<span class="nav-title"> Blog </span>
									</a>
								</li>
								<li class="@if ($menu == 'projects') active selected @endif" >
									<a href="{{ url('admin/projects') }}">
										<span class="has-icon">
											<i class="icon-newspaper"></i>
										</span>
										<span class="nav-title"> Projects </span>
									</a>
								</li>
								<li class="@if ($menu == 'menu') active selected @endif" >
									<a href="{{ url('admin/menu') }}">
										<span class="has-icon">
											<i class="icon-layers2"></i>
										</span>
										<span class="nav-title"> Menu </span>
									</a>
								</li>
								<li class="@if ($menu == 'career' || $menu == 'slider' || $menu == 'patners' || $menu == 'applications') active selected @endif">
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-tools-2"></i>
										</span>
										<span class="nav-title">Others</span>
									</a>
									<ul aria-expanded="false" class="collapse @if ($menu == 'career' || $menu == 'slider' || $menu == 'patners' || $menu == 'applications') in @endif">
										
										<li>
											<a @if ($menu == 'career') class='current-page' @endif href='{{ url('admin/career') }}'>Career</a>
										</li>

										<li>
											<a @if ($menu == 'applications') class='current-page' @endif href='{{ url('admin/applications') }}'>Applications</a>
										</li>
										
										<li>
											<a @if ($menu == 'slider') class='current-page' @endif href='{{ url('admin/slider') }}'>Slider</a>
										</li>
										<li>
											<a @if ($menu == 'patners') class='current-page' @endif href='{{ url('admin/patners') }}'>Patners</a>
										</li>
										
									</ul>
								</li>
								<li class="@if ($menu == 'settings') active selected @endif" >
									<a href="{{ url('admin/settings') }}">
										<span class="has-icon">
											<i class="icon-tools-2"></i>
										</span>
										<span class="nav-title"> Settings </span>
									</a>
								</li>
								
							</ul>
							<!-- END: side-nav-content -->
						</nav>
						<!-- END: .side-nav -->
					</div>
					<!-- END: .side-content -->
				</aside>
				<!-- END: .app-side -->

				@yield('content')

			</div>
			<!-- END: .app-container -->
			<!-- BEGIN .main-footer -->
			<footer class="main-footer fixed-btm">
				Copyright {{ $settings->siteName }} Admin {{ date('Y') }}.
			</footer>
			<!-- END: .main-footer -->
		</div>
		<!-- END: .app-wrap -->

		<!-- jQuery first, then Tether, then other JS. -->
		<script src="{{ asset('backend_assets/js/jquery.js') }}"></script>
		<script src="{{ asset('backend_assets/js/tether.min.js') }}"></script>
		<script src="{{ asset('backend_assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/unifyMenu/unifyMenu.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/onoffcanvas/onoffcanvas.js') }}"></script>
		<script src="{{ asset('backend_assets/js/moment.js') }}"></script>

		<!-- Data Tables -->
		<script src="{{ asset('backend_assets/vendor/datatables/dataTables.min.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
		
		<!-- Custom Data tables -->
		<script src="{{ asset('backend_assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/datatables/custom/fixedHeader.js') }}"></script>

		<!-- Slimscroll JS -->
		{{-- <script src="{{ asset('backend_assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
		<script src="{{ asset('backend_assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

		 --}}
		<script src="{{ asset('backend_assets/vendor/summernote/summernote-bs4.js') }}"></script>
		<!-- Common JS -->
		<script src="{{ asset('backend_assets/js/common.js') }}"></script>
		{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
	</body>

</html>
@php
	$editorArr = [
		'categories',
		'menu',
		'blog',
		'projects',
		'products',
		'career'
	];
@endphp
@if (in_array($menu, $editorArr))
	<script>
 		$('.sn1').summernote({
			placeholder: 'Details'
		});
	</script>
@endif