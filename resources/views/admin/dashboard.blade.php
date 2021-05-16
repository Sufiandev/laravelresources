@extends('admin.layout.app')
@section('content')
	<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
									<div class="page-icon">
										<i class="icon-laptop_windows"></i>
									</div>
									<div class="page-title">
										<h5>Dashboard</h5>
										<h6 class="sub-heading">Welcome to {{$settings->siteName}} </h6>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
									<div class="right-actions">
										<a href="#" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="Download Reports">
											<i class="icon-download4"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<div class="stats-widget-header">
												<i class="icon-documents2"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Menu</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total">
														{{ Helper::countRows('menus') }}
														</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<div class="stats-widget-header">
												<i class="icon-layers3"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Categories</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total">{{ Helper::countRows('categories') }}</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<a href="#" class="stats-label" data-toggle="tooltip" data-placement="top" title="New Followers">47</a>
											<div class="stats-widget-header">
												<i class="icon-googleplus"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Google</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total">2,800</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<a href="#" class="stats-label" data-toggle="tooltip" data-placement="top" title="New Posts">12</a>
											<div class="stats-widget-header">
												<i class="icon-rss"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Blog</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total">7,000</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
						<!-- Row start -->
						<div class="row gutters">
							
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Overview</div>
									<div class="card-body text-center" style="min-height: 222px">
										<!-- Row start -->
										<br><br><br>
										<h2 class="mx-auto center">Welcome to Admin Panel</h2>
										<span class="mx-auto center">Powered by <a href="http://solutionsplayer.com">Solutions Player</a></span>
										
										
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
@endsection