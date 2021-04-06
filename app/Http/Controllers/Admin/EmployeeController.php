<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\{User, Company};
use App\Http\Requests\EmployeeValidation;
use DataTables;

class EmployeeController extends AdminBaseController
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$users = User::where('is_admin', 0)->get();

			return Datatables::of($users)
				->addIndexColumn()
				->addColumn('registered_at',function ($row){
					return $row->created_at->diffForHumans();
				})
				->addColumn('action', function($row){
					$action = '<a href="'.route('employee.form', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a> &nbsp <a href="javascript:void(0)" class="edit btn btn-danger btn-sm delete-employee" data-employee-id="'.$row->id.'">Delete</a>';
					return $action;
				})
				->rawColumns(['action'])
				->make(true);
		}

		return view('admin.employee.index', $this->data);
	}

	public function form(Request $request, $id = null)
	{
        $this->companies = Company::all();
		if ($id) {
			$this->employee = User::find($id);
		}

		return view('admin.employee.form', $this->data);
	}

    public function store(EmployeeValidation $request)
    {
        $employee = new User();

        $employee->first_name = $request->first_name;
        $employee->last_name  = $request->last_name;
        $employee->email      = $request->email;
        $employee->phone      = $request->phone;
        $employee->company_id = $request->company;
        $employee->password   = bcrypt($request->password);
        $employee->save();

        return redirect()->route('employee')->with('success', 'Employee Registered Successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|min:2',
			'last_name'  => 'required|string|min:2',
			'email'      => 'required|email|unique:users,email,'.$id,
			'phone'      => 'required|min:10|max:14',
			'company'    => 'required',
			'password'   => 'sometimes|nullable|min:6',
        ]);

        $employee = User::find($id);

        $employee->first_name = $request->first_name;
        $employee->last_name  = $request->last_name;
        $employee->email      = $request->email;
        $employee->phone      = $request->phone;
        $employee->company_id = $request->company;
        $request->password ? $employee->password   = bcrypt($request->password) : '';
        $employee->save();


        return redirect()->route('employee')->with('success', 'Employee Edited Successfully!');
    }

    public function destroy(Request $request)
    {
        if (User::find($request->employee_id)->delete()) {
            return response()->json(['success' => true, 'message' => 'Employee Deleted Successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Something Went wrong!']);
    }
}
