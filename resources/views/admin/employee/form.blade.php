@extends('layouts.app')
@section('page-title',isset($employee) ? 'Edit Employee' : 'Register Employee')
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">{{ isset($employee) ? 'Edit Employee' : 'Register Employee' }}</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
				<li class="breadcrumb-item active">{{ isset($employee) ? 'Edit Employee' : 'Register Employee' }}</li>
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
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h3 class="card-title">{{ isset($employee) ? 'Edit Employee' : 'Register Employee' }}</h3>
				<div align="right">
					<a class="btn btn-sm btn-primary" href="{{ route('employee') }}"> Back</a>
				</div>
			</div>
			<form id="user_form_validation" enctype="multipart/form-data" action="{{ isset($employee) ? route('employee.update', $employee->id) :  route('employee.store') }}" method="POST">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<strong>First Name:</strong>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ old('first_name') ?? (isset($employee) ? $employee->first_name : old('first_name')) }}">
								@error('first_name')
									<span class="error" style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<strong>Last Name:</strong>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ old('last_name') ?? (isset($employee) ? $employee->last_name : old('last_name')) }}">
								@error('last_name')
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
								<strong>Email:</strong>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ old('email') ?? (isset($employee) ? $employee->email : old('email')) }}">
								@error('email')
									<span class="error" style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<strong>Phone:</strong>
								<input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{ old('phone') ?? (isset($employee) ? $employee->phone : old('phone')) }}">
								@error('phone')
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
                                <strong>Company:</strong>
                                <select name="company" class="form-control">
                                    <option value="" selected>Select Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" {{ old('company') == $company->id ? 'selected' : ((isset($employee) && $employee->phone = $company->id) ? 'selected' : '') }}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company')
									<span class="error" style="color: red" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
                            </div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <strong>Password:</strong>
                               <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                               @error('password')
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
					<a href="{{ route('employee') }}"><button type="button" class="btn btn-default btn-outline">Back</button></a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
