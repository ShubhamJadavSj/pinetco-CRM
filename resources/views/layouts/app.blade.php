<!DOCTYPE html>
<html>
   <head>
		<meta charset="UTF-8">
		<title>@yield('page-title')</title>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">

		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

		<!-- Favicon icon -->
		<link rel="icon" href="{{ asset('/images/logo/logo.png') }}" type="image/gif" sizes="16x16">

		<!-- Tempusdominus Bbootstrap 4 -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

		<!-- iCheck -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

		<!-- JQVMap -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/jqvmap/jqvmap.min.css') }}">

		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/dist/css/adminlte.min.css') }}">

		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

		<!-- Daterange picker -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/daterangepicker/bootstrap-datepicker.css') }}">

		<!-- DataTables -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

		<!-- summernote -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/summernote/summernote-bs4.css') }}">

		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

		<!-- Select2 -->
		<link href="{{ URL::asset('/assets/admin-lte/select2/select2.min.css') }}" rel="stylesheet" />
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

		{{-- Sweat alert --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

        {{-- toaster --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

		@yield('page-style')

	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

			<!-- Header -->
			@include('layouts.includes.header')

			<!-- Sidebar -->
			@include('layouts.includes.sidebar')

			<div class="content-wrapper">
				<section class="content-header">
				<section class="content">
					@yield('content')
				</section>
				</div>

				<!-- Footer -->
				@include('layouts.includes.footer')
			</div>

			<!-- jQuery -->
			<script src="{{ asset('/assets/admin-lte/plugins/jquery/jquery.min.js') }}"></script>

			<!-- jQuery UI 1.11.4 -->
			<script src="{{ asset('/assets/admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

			<script src="{{ asset('/assets/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
			<!-- Bootstrap 4 -->
			<script src="{{ asset('/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- Select2 -->
		<script src="{{ URL::asset('/assets/admin-lte/select2/select2.min.js') }}"></script>

		<!-- ChartJS -->
		<script src="{{ asset('/assets/admin-lte/plugins/chart.js/Chart.min.js') }}"></script>

		<!-- Sparkline -->
		<script src="{{ asset('/assets/admin-lte/plugins/sparklines/sparkline.js') }}"></script>

		<!-- JQVMap -->
		<script src="{{ asset('/assets/admin-lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
		<script src="{{ asset('/assets/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

		<!-- jQuery Knob Chart -->
		<script src="{{ asset('/assets/admin-lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

		<!-- daterangepicker -->
		<script src="{{ asset('/assets/admin-lte/plugins/moment/moment.min.js') }}"></script>
		<script src="{{ asset('/assets/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
		<script src="{{ asset('/assets/admin-lte/plugins/daterangepicker/bootstrap-datepicker.js') }}"></script>

		<!-- Tempusdominus Bootstrap 4 -->
		<script src="{{ asset('/assets/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

		<!-- Summernote -->
		<script src="{{ asset('/assets/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>

		<!-- overlayScrollbars -->
		<script src="{{ asset('/assets/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

		<!-- AdminLTE App -->
		<script src="{{ asset('/assets/admin-lte/dist/js/adminlte.js') }}"></script>

		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="{{ asset('/assets/admin-lte/dist/js/pages/dashboard.js') }}"></script>

		<!-- DataTables -->
		<script src="{{ asset('/assets/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('/assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('/assets/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('/assets/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

		<!-- data Toggle -->
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		{{-- sweat alert --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        toaster
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	</body>

	@yield('page-script')

</html>
