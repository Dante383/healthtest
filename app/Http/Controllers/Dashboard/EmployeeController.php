<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Practice;

class EmployeeController extends Controller
{
    public function index (int $employee_id) {
        $employee = Employee::findOrFail($employee_id);
        $practices = Practice::all();

        return view('dashboard.employee', [
            'employee' => $employee,
            'practices' => $practices
        ]);
    }

    public function update (int $employee_id, Request $request)
    {
        $employee = Employee::findOrFail($employee_id);

        $validatedData = $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'practice_id' => 'required|exists:App\Models\Practice,id',
            'email' => 'max:255|email',
            'phone' => 'numeric'
        ]);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->practice_id = $request->practice_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        return \Redirect::route('dashboard_employee', [$employee->id]);
    }

    public function create () {
        $employee = new Employee();
        $practices = Practice::all();

        return view('dashboard.employee', [
            'employee' => $employee,
            'practices' => $practices
        ]);
    }

    public function store (Request $request) {
        $employee = new Employee();

        $validatedData = $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'practice_id' => 'required|exists:App\Models\Practice,id',
            'email' => 'max:255|email',
            'phone' => 'numeric'
        ]);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->practice_id = $request->practice_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        $employee->save();

        return \Redirect::route('dashboard_employee', [$employee->id]);
    }

    public function delete (int $employee_id) {
        $employee = Employee::findOrFail($employee_id);

        $employee->delete();

        return \Redirect::route('dashboard_employees');
    }
}
