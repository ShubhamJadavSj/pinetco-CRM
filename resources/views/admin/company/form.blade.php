@extends('layouts.app')
@section('page-title',isset($company) ? 'Edit Company' : 'Register Company')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">{{ isset($company) ? 'Edit Company' : 'Register Company' }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active">{{ isset($company) ? 'Edit Company' : 'Register Company' }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@if (count($errors) > 0)
	<div id="message" class="col-sm-12 alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.
	</div>
@endif
<div class="row">
	<div class="col-md-8">
		<div class="card ">
			<div class="card-header">
				<h3 class="card-title">{{ isset($company) ? 'Edit Company' : 'Register Company' }}</h3>
				<div align="right">
					<a class="btn btn-sm btn-primary" href="{{ route('company') }}"> Back</a>
				</div>
			</div>
			<form id="company_form_validation" enctype="multipart/form-data" action="{{ isset($company) ? route('company.update', $company->id) :  route('company.store') }}" method="POST">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<strong>Name:</strong>
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name') ?? (isset($company) ? $company->name : old('name')) }}">
								@error('name')
									<span class="error" style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<strong>Email:</strong>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email') ?? (isset($company) ? $company->email : old('email')) }}">
								@error('email')
									<span class="error" style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<strong>Website:</strong>
								<input type="text" class="form-control" name="website_url" id="website_url" placeholder="Enter Website URL" value="{{ old('website_url') ?? (isset($company) ? $company->website : old('website_url')) }}">
								@error('website_url')
									<span class="error" style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<strong>Logo:</strong>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="logo" onchange="loadFile(event)" class="custom-file-input" id="logoImage">
											<label class="custom-file-label" for="logoImage">Choose logo</label>
										</div>
									</div>
									@error('logo')
										<span class="error" style="color: red" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Submitting'; " class="btn btn-primary">Submit</button>
					<a href="{{ route('company') }}"><button type="button" class="btn btn-default btn-outline">Back</button></a>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card card-primary card-outline">
			<div class="card-body box-profile">
			<div class="text-center">
				<img class="img-fluid" id="image-append" src="{{ (isset($company) && $company->logo_path) ? $company->logo_path : asset('images/logo/default-logo.png') }}" alt="book cover">
			</div>
			<h3 class="profile-username text-center">Logo</h3>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page-script')
<script>
    var loadFile = function(event) {
      var output = document.getElementById('image-append');
      output.src = URL.createObjectURL(event.target.files[0]);
   };
</script>
@endsection
