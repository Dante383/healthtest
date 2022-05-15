<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Practice;
use App\Models\Employee;
use App\Models\FieldOfPractice;

class PracticeController extends Controller
{
    public function index (int $practice_id, Request $request) {
        $practice = Practice::findOrFail($practice_id);
        
        $employees = Employee::where('practice_id', $practice->id)->paginate(3, ['*'], 'employees');
        $fields_of_practice = FieldOfPractice::where('practice_id', $practice->id)->paginate(3, ['*'], 'fields_of_practice');

        // make sure both of the paginations can be used at the same time
        $employees->appends('fields_of_practice', $request->get('fields_of_practice', 1))->links();
        $fields_of_practice->appends('employees', $request->get('employees', 1))->links();

        return view('dashboard.practice', [
            'practice' => $practice,
            'employees' => $employees,
            'fields_of_practice' => $fields_of_practice
        ]);
    }

    public function update (int $practice_id, Request $request)
    {
        $practice = Practice::findOrFail($practice_id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'max:255|email',
            'logo' => 'mimes:jpg,bmp,png|dimensions:min_width=100,min_height=100|max:2048',
            'website_url' => 'url'
        ]);

        $practice->name = $request->name;
        $practice->email = $request->email;
        $practice->website_url = $request->website_url;

        if ($request->has('logo')){
            $path = $request->file('logo')->store('public');
            $practice->logo = 'storage/' . basename($path);
        }

        $practice->save();

        return \Redirect::route('dashboard_practice', [$practice->id]);
    }

    public function create () {
        $practice = new Practice();

        return view('dashboard.practice', [
            'practice' => $practice
        ]);
    }

    public function store (Request $request) {
        $practice = new Practice();

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'max:255|email',
            'logo' => 'mimes:jpg,bmp,png|dimensions:min_width=100,min_height=100|max:2048',
            'website_url' => 'url'
        ]);

        $practice->name = $request->name;
        $practice->email = $request->email;
        $practice->website_url = $request->website_url;

        if ($request->has('logo')){
            $path = $request->file('logo')->store('public');
            $practice->logo = 'storage/' . basename($path);
        }

        $practice->save();

        return \Redirect::route('dashboard_practice', [$practice->id]);
    }

    public function delete (int $practice_id) {
        $practice = Practice::findOrFail($practice_id);

        $practice->delete();

        return \Redirect::route('dashboard_practices');
    }
}
