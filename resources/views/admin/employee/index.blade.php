@extends('layouts.app')
@section('page-title','Manage Employee')
@section('page-style')
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Employee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Employee</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Employee List</h3>
        <div class="text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('employee.form') }}" data-toggle="tooltip" data-placement="top" title="Register employee">Add Employee</a>
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div id="message" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ $message }}
            </div>
        @endif
        <table id="employee-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>company</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('page-script')

<script>
    $(function () {
        var table = $('#employee-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employee') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'company', name: 'company'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    $('table').on('click',".delete-employee" , function(e) {
        e.preventDefault();

        var token = '{{ csrf_token() }}';
        var employee_id = $(this).data('employee-id');

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this language again!",
            type: "error",
            showCancelButton: true,
            dangerMode: true,
            cancelButtonClass: '#DD6B55',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Delete!',
        },function (result) {
            if (result) {
                $.ajax({
                    url: "{{ route('employee.destroy') }}",
                    type:'POST',
                    data: {_token:token, employee_id:employee_id},
                    success: function(data) {
                        if (data.success) {
                            $('#employee-table').DataTable().ajax.reload();
                            toastr.success(data.message);
                        }else{
                            toastr.error(data.message);
                        }
                    },
                    error: function(data) {
                        toastr.error('Something went wrong!');
                        $('#employee-table').DataTable().ajax.reload();
                    }
                });
            }
        });
    })
</script>
@endsection
