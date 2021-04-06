<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\{Company, User};

class HomeController extends AdminBaseController
{
    public function index()
    {
        $this->company_count = Company::count();
        $this->employee_count = User::where('is_admin', 0)->count();
        return view('admin.dashboard', $this->data);
    }
}
