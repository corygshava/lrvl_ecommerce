<!DOCTYPE html>
<html lang="en">
<head>
	@if (isset($prefix))
		<base href="{{$prefix}}">
	@endif
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>myAdmin - HouseOfJrm</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="adm_ass/assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="adm_ass/assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="adm_ass/assets/vendors/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="adm_ass/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="adm_ass/assets/vendors/owl-carousel-2/owl.carousel.min.css">
	<link rel="stylesheet" href="adm_ass/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="adm_ass/assets/css/style.css">
	<link rel="stylesheet" href="assets/css/coryG_base.css">
	<link rel="stylesheet" href="assets/css/w3.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="adm_ass/assets/images/favicon.png" />

	<script src="assets/js/SuperScript.js"></script>
	<script src="assets/js/toappend.js"></script>
	<script src="assets/js/customalerter.js"></script>
	<script src="assets/js/app.js"></script>

	<style>
		/* critical styles */
		.main-panel{
			height: calc(100vh - 0px);
			overflow-x: hidden;
			overflow-y: auto;
		}

		textarea.form-control{
			min-height: 120px;
		}
		.form-control:focus{
			color: #fff;
		}

		.table.table-hover tr img {
			aspect-ratio: 1;
			height: 30px;
			object-fit: cover;
			border-radius: 0 !important;
		}
		.table.table-hover tr:hover th{
			color: var(--text) !important;
		}
		.table.table-hover tr:hover td{
			color: #fff;
		}

		/* pagination fixes */
		.page-item{
			background-color: transparent !important;
		}
	</style>

	<style>
		/* Custom scrollbar style */
		/* WebKit browsers (Chrome, Safari, Edge) */
		::-webkit-scrollbar {
			width: 8px; /* Scrollbar width */
			height: 10px; /* Horizontal scrollbar height */
		}

		::-webkit-scrollbar-track {
			background: #414260; /* Transparent track so content is visible */
		}

		::-webkit-scrollbar-thumb {
			background-color: rgba(0, 0, 0, 0.5); /* Scrollbar thumb color */
			border-radius: 4px; /* Rounded thumb */
		}

		::-webkit-scrollbar-thumb:hover {
			background-color: rgba(0, 0, 0, 0.7); /* Color on hover */
		}
	</style>
</head>
<body>
	<div class="container-scroller">
			<div class="row p-0 m-0" id="proBanner">
				<div class="col-md-12 p-0 m-0">
					<div class="card-body card-body-padding d-flex align-items-center justify-content-between">
						<div class="ps-lg-1">
							<div class="d-flex align-items-center justify-content-between">
								<p class="mb-0 font-weight-medium me-3 buy-now-text">Welcome to your Dashboard!</p>
								<a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
							<button id="bannerClose" class="btn border-0 p-0">
								<i class="mdi mdi-close text-white me-0"></i>
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- partial:partials/_sidebar.html -->
			@include('admin.sidebar')

			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<!-- partial:partials/_navbar.html -->
				@include('admin.navbar')

				{{ $slot}}
			</div>
		</div>

	<!-- scripts -->
		<!-- container-scroller -->
		<!-- plugins:js -->
		<script src="adm_ass/assets/vendors/js/vendor.bundle.base.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="adm_ass/assets/vendors/chart.js/Chart.min.js"></script>
		<script src="adm_ass/assets/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="adm_ass/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
		<script src="adm_ass/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="adm_ass/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
		<script src="adm_ass/assets/js/jquery.cookie.js" type="text/javascript"></script>
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="adm_ass/assets/js/off-canvas.js"></script>
		<script src="adm_ass/assets/js/hoverable-collapse.js"></script>
		<script src="adm_ass/assets/js/misc.js"></script>
		<script src="adm_ass/assets/js/settings.js"></script>
		<script src="adm_ass/assets/js/todolist.js"></script>
		<!-- endinject -->
		<!-- Custom js for this page -->
		<script src="adm_ass/assets/js/dashboard.js"></script>
		<!-- End custom js for this page -->
	<!-- End scripts -->

	{{-- critical JS --}}

	@if (session()->has('message'))
		<script>alert_success(`{{ session()->get('message')}}`)</script>
	@endif
</body>
</html>