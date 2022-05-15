<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index () {
        return view('dashboard.employees', [
            'employees' => Employee::with('practice')->paginate(10)
        ]);
    }
}
