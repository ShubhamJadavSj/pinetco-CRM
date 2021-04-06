<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ url('/') }}" class="brand-link">
		<img src="{{ asset('/images/logo/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8">
		<span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('/images/logo/logo.png') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->name }}</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ route('company') }}" class="nav-link {{ Request::is('company*') ? 'active' : '' }}">
						<i class="nav-icon fas fa-building"></i>
						<p>Company</p>
					</a>
				</li>
                <li class="nav-item">
					<a href="{{ route('employee') }}" class="nav-link {{ Request::is('employee*') ? 'active' : '' }}">
						<i class="nav-icon fas fa-user"></i>
						<p>Employee</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>

