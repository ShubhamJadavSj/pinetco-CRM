<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\{User, Company};
use DataTables;
use App\Http\Requests\CompanyValidation;
use Illuminate\Support\Facades\Mail;
use App\Mail\companyRegister;

class CompanyController extends AdminBaseController
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Company::latest()->get();
			return DataTables::of($data)
					->addIndexColumn()
					->addColumn('action', function($row){
						$action = '<a href="'.route('company.form', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a> &nbsp <a href="javascript:void(0)" class="edit btn btn-danger btn-sm delete-company" data-company-id="'.$row->id.'">Delete</a>';
						return $action;
					})
					->addColumn('logo', function($row){
						$logo = '<div class="image"><img src="'.$row->logo_path.'" class="img-circle elevation-2" alt="Company logo" style="height:100; width:100px;"></div>';
						return $logo;
					})
					->rawColumns(['action', 'logo'])
					->make(true);
		}

		return view('admin.company.index', $this->data);
	}

    public function form($id = null)
    {
        if ($id) {
            $this->company = Company::find($id);
        }

        return view('admin.company.form', $this->data);
    }

    public function store(CompanyValidation $request)
    {
        $company = new Company();

        if ($request->hasFile('logo')) {

            $logoPath = $request->file('logo');
            $logoName = time() . '.' . $logoPath->getClientOriginalExtension();

            $request->file('logo')->storeAs('company-logo/', $logoName, 'public');
            $company->logo = $logoName;
        }

        $company->name    = $request->name;
        $company->email   = $request->email;
        $company->website = $request->website_url;
        $company->save();

        $mail_details = [
			'subject' => 'Thank you for connecting company',
			'description' => 'Welcome to Mini-CRM'
		];

        Mail::to($request->email)->send(new companyRegister($mail_details));

        return redirect()->route('company')->with('success', 'Company Registered Successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email'       => 'required|email|unique:companies,email,'.$id,
            'name'        => 'required|string|max:50',
            'website_url' => 'required|url',
            'logo'        => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $company = Company::find($id);

        if ($request->hasFile('logo')) {

            if(file_exists(public_path("storage/company-logo/$company->logo")) && $company->logo != '' ){
                unlink(public_path("storage/company-logo/$company->logo"));
            }

            $logoPath = $request->file('logo');
            $logoName = time() . '.' . $logoPath->getClientOriginalExtension();

            $request->file('logo')->storeAs('company-logo/', $logoName, 'public');
            $company->logo = $logoName;
        }

        $company->name    = $request->name;
        $company->email   = $request->email;
        $company->website = $request->website_url;
        $company->save();

        return redirect()->route('company')->with('success', 'Company Edited Successfully!');
    }

    public function destroy(Request $request)
    {

        if ($company = Company::find($request->company_id)) {
            if ($company->logo && file_exists(public_path('storage/company-logo/'.$company->logo))) {
                unlink(storage_path('app/public/company-logo/'.$company->logo));
            }
            $company->delete();
            return response()->json(['success' => true, 'message' => 'Record Deleted Successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Something Went wrong!']);
    }
}
