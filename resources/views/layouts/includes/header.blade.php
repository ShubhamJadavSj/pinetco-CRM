<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-flex">

		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="{{ asset('/images/logo/logo.png') }}" class="user-image img-circle elevation-2" alt="User Image">
				<span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<li class="user-header bg-primary">
					<img src="{{ asset('/images/logo/logo.png') }}" class="img-circle elevation-2" alt="User Image">
					<p>{{ Auth::user()->name }}</p>
					</li>
				<li class="user-footer">
					{{-- <a href="javascript:void(0)" class="btn btn-default btn-flat">Profile</a> --}}
					<a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						{{ __('Sign out') }}
					</a>
				</li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
				</form>
			</ul>
		</li>
	</ul>
</nav>
