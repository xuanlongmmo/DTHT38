<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="" name="description">
		<meta content="" name="author">
		<meta name="keywords" content=""/>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Title -->
		<base href="{{ asset('') }}">
		<title>DTHT38</title>

		<!--Favicon -->
		<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

		<!-- Style css -->
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/dark.css" rel="stylesheet" />
		<link href="assets/css/skin-modes.css" rel="stylesheet" />

		<!-- Animate css -->
		<link href="assets/css/animated.css" rel="stylesheet" />

		<!--Sidemenu css -->
        <link  href="assets/css/sidemenu.css" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet"/>

		<!---Icons css-->
		<link href="assets/css/icons.css" rel="stylesheet"/>

		<!---Sidebar css-->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet"/>

		<!-- INTERNAL Data table css -->
		<link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>

		<!-- Treeview css -->
		<link href="assets/plugins/treeview/treeview.css" rel="stylesheet" type="text/css">
		
		<!---Custom css-->
		<link href="assets/css/custom.css" rel="stylesheet"/>

		@yield('style')
	</head>

	<body class="app sidebar-mini dark-mode">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="assets/images/svgs/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">

				<!--aside open-->
				@include('admin.layout.sidebar')
				<!--aside closed-->

				<div class="app-content main-content">
					<div class="side-app">

						<!--app header-->
						<div class="app-header header">
							<div class="container-fluid">
								<div class="d-flex">
									<a class="header-brand" href="index.html">
										<img src="assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Dayonelogo">
										<img src="assets/images/brand/logo-white.png" class="header-brand-img dark-logo" alt="Dayonelogo">
										<img src="assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Dayonelogo">
										<img src="assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Dayonelogo">
									</a>
									<div class="app-sidebar__toggle" data-toggle="sidebar">
										<a class="open-toggle" href="#">
											<i class="feather feather-menu"></i>
										</a>
										<a class="close-toggle" href="#">
											<i class="feather feather-x"></i>
										</a>
									</div>
									<div class="mt-0">
										<form class="form-inline">
											<div class="search-element">
												<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
												<button class="btn btn-primary-color" >
													<i class="feather feather-search"></i>
												</button>
											</div>
										</form>
									</div><!-- SEARCH -->
									<div class="d-flex order-lg-2 my-auto ml-auto">
										<a class="nav-link my-auto icon p-0 nav-link-lg d-md-none navsearch" href="#" data-toggle="search">
											<i class="feather feather-search search-icon header-icon"></i>
										</a>
										<div class="dropdown header-fullscreen">
											<a class="nav-link icon full-screen-link">
												<i class="feather feather-maximize fullscreen-button fullscreen header-icons"></i>
												<i class="feather feather-minimize fullscreen-button exit-fullscreen header-icons"></i>
											</a>
										</div>
										<div class="dropdown header-message">
											<a class="nav-link icon" data-toggle="dropdown">
												<i class="feather feather-mail header-icon"></i>
												<span class="badge badge-success side-badge">5</span>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
												<div class="header-dropdown-list message-menu" id="message-menu">
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="assets/images/users/1.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Jack Wright</h6>
																	<p class="fs-13 mb-1">All the best your template awesome</p>
																	<div class="small text-muted">
																		3 hours ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="assets/images/users/2.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Lisa Rutherford</h6>
																	<p class="fs-13 mb-1">Hey! there I'm available</p>
																	<div class="small text-muted">
																		5 hour ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="assets/images/users/3.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Blake Walker</h6>
																	<p class="fs-13 mb-1">Just created a new blog post</p>
																	<div class="small text-muted">
																		45 mintues ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="assets/images/users/4.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Fiona Morrison</h6>
																	<p class="fs-13 mb-1">Added new comment on your photo</p>
																	<div class="small text-muted">
																		2 days ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="assets/images/users/6.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Stewart Bond</h6>
																	<p class="fs-13 mb-1">Your payment invoice is generated</p>
																	<div class="small text-muted">
																		3 days ago
																	</div>
																</div>
															</div>
														</div>
													</a>
												</div>
												<div class=" text-center p-2">
													<a href="#" class="">See All Messages</a>
												</div>
											</div>
										</div>
										<div class="dropdown header-notify">
											<a class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
												<i class="feather feather-bell header-icon"></i>
												<span class="bg-dot"></span>
											</a>
										</div>
										<div class="dropdown profile-dropdown">
											<a href="#" class="nav-link pr-1 pl-0 leading-none" data-toggle="dropdown">
												<span>
													<img src="assets/images/users/16.jpg" alt="img" class="avatar avatar-md bradius">
												</span>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
												<div class="p-3 text-center border-bottom">
													<a href="#" class="text-center user pb-0 font-weight-bold">{{ Auth::user()->username }}</a>
												</div>
												<a class="dropdown-item d-flex" href="#">
													<i class="feather feather-user mr-3 fs-16 my-auto"></i>
													<div class="mt-1">Thông tin</div>
												</a>
												<a class="dropdown-item d-flex" href="#" data-toggle="modal" data-target="#changepasswordnmodal">
													<i class="feather feather-edit-2 mr-3 fs-16 my-auto"></i>
													<div class="mt-1">Đổi mật khẩu</div>
												</a>
												<a class="dropdown-item d-flex" href="#">
													<i class="feather feather-power mr-3 fs-16 my-auto"></i>
													<div class="mt-1">Đăng xuất</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/app header-->

						<!--Page header-->
						
						<!--End Page header-->


						<!--Row-->
						@yield('content')
					</div>
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © @php echo date('Y'); @endphp <a href="#">Hai bít</a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->

			<!--Sidebar-right-->
			<div class="sidebar sidebar-right sidebar-animate">
				<div class="card-header border-bottom pb-5">
					<h4 class="card-title">Notifications </h4>
					<div class="card-options">
						<a href="#" class="btn btn-sm btn-icon btn-light text-primary"  data-toggle="sidebar-right" data-target=".sidebar-right"><i class="feather feather-x"></i> </a>
					</div>
				</div>
				<div class="">
					<div class="list-group-item  align-items-center border-0">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/4.jpg)"></span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Liam <span class="text-muted font-weight-normal">Sent Message</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>30 mins ago</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/10.jpg)"></span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Paul<span class="text-muted font-weight-normal"> commented on you post</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 hour ago</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3 bg-pink-transparent"><span class="feather feather-shopping-cart"></span></span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">James<span class="text-muted font-weight-normal"> Order Placed</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 day ago</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/9.jpg)">
								<span class="avatar-status bg-green"></span>
							</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Diane<span class="text-muted font-weight-normal"> New Message Received</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 day ago</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/5.jpg)">
								<span class="avatar-status bg-muted"></span>
							</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Vinny<span class="text-muted font-weight-normal"> shared your post</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>2 days ago</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3 bg-primary-transparent">M</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Mack<span class="text-muted font-weight-normal"> your admin lanuched</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>1 week ago</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/12.jpg)">
								<span class="avatar-status bg-green"></span>
							</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Vinny<span class="text-muted font-weight-normal"> shared your post</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>04 Jan 2021 1:56 Am</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/8.jpg)">	</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Anna<span class="text-muted font-weight-normal"> likes your post</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>25 Dec 2020 11:25 Am</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/14.jpg)">	</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Kimberly<span class="text-muted font-weight-normal"> Completed one task</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>24 Dec 2020 9:30 Pm</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3" style="background-image: url(assets/images/users/3.jpg)">	</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Rina<span class="text-muted font-weight-normal"> your account has Updated</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>28 Nov 2020 7:16 Am</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="list-group-item  align-items-center  border-bottom">
						<div class="d-flex">
							<span class="avatar avatar-lg brround mr-3 bg-success-transparent">J</span>
							<div class="mt-1">
								<a href="#" class="font-weight-semibold fs-16">Julia<span class="text-muted font-weight-normal"> Prepare for Presentation</span></a>
								<span class="clearfix"></span>
								<span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i>18 Nov 2020 11:55 Am</span>
							</div>
							<div class="ml-auto">
								<a href="" class="mr-0 option-dots" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span class="feather feather-more-horizontal"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#"><i class="feather feather-eye mr-2"></i>View</a></li>
									<li><a href="#"><i class="feather feather-plus-circle mr-2"></i>Add</a></li>
									<li><a href="#"><i class="feather feather-trash-2 mr-2"></i>Remove</a></li>
									<li><a href="#"><i class="feather feather-settings mr-2"></i>More</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Sidebar-right-->

			<!--Clock-IN Modal -->
			<div class="modal fade"  id="clockinmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><span class="feather feather-clock  mr-1"></span>Clock In</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="countdowntimer"><span id="clocktimer" class="border-0"></span></div>
							<div class="form-group">
								<label class="form-label">Note:</label>
								<textarea class="form-control" rows="3">Some text here...</textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button  class="btn btn-outline-primary" data-dismiss="modal">Close</button>
							<button  class="btn btn-primary">Clock In</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Clock-IN Modal  -->

			<!--Change password Modal -->
			<div class="modal fade"  id="changepasswordnmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Change Password</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">New Password</label>
								<input type="password" class="form-control" placeholder="password" value="">
							</div>
							<div class="form-group">
								<label class="form-label">Confirm New Password</label>
								<input type="password" class="form-control" placeholder="password" value="">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Confirm</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Change password Modal  -->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

		<!-- Jquery js-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="assets/plugins/bootstrap/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/sidemenu/sidemenu.js"></script>

		<!-- P-scroll js-->
		<script src="assets/plugins/p-scrollbar/p-scrollbar.js"></script>
		<script src="assets/plugins/p-scrollbar/p-scroll1.js"></script>

		<!--Sidebar js-->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!--Ckeditor js-->
		<script src="assets/plugins/ckeditor/ckeditor.js"></script>

		<!-- INTERNAL Index js-->
		<script src="assets/js/index1-dark.js"></script>

		<!-- Treeview js-->
		<script src="assets/plugins/treeview/treeview.js"></script>
		
		<!-- Ajax js-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

		<!-- Custom js-->
		<script src="assets/js/custom.js"></script>
		<script src="assets/js/admin/loadunit.js"></script>
		<script src="assets/js/admin/relics.js"></script>

		@yield('script')
	</body>
</html>