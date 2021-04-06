<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Log-In</title>

		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">

		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

		<!-- icheck bootstrap -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('/assets/admin-lte/dist/css/adminlte.min.css') }}">

		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href=""><b>Login</b></a>
			</div>

			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg">Sign in to start your session</p>
					@if ($message = Session::get('error'))
						<div id="message" class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-check"></i> Error!</h5>
							{{ $message }}
						</div>
					@endif
					@if ($message = Session::get('success'))
						<div id="message" class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h5><i class="icon fas fa-check"></i> Success!</h5>
							{{ $message }}
						</div>
					@endif
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<div class="input-group mb-3">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="input-group mb-3">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
							<div class="input-group-append">
								<div class="input-group-text">
								<span class="fas fa-lock"></span>
								</div>
							</div>
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="row">
							<div class="col-8">
							</div>

							<div class="col-4">
								<button type="submit" class="btn btn-primary btn-block btn-flat">
								{{ __('Login') }}
								</button>
							</div>
						</div>
					</form>
					<p class="mb-1">
						@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
							</a>
						@endif
					</p>
				</div>
		 	</div>
		</div>

		<!-- jQuery -->
		<script src="{{ asset('/assets/admin-lte/plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap 4 -->
		<script src="{{ asset('/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

		<!-- AdminLTE App -->
		<script src="{{ asset('/assets/admin-lte/dist/js/adminlte.min.js') }}"></script>
	</body>
</html>
