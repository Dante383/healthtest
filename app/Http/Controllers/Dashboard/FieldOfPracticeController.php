<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldOfPractice;
use App\Models\Practice;

class FieldOfPracticeController extends Controller
{
    public function index (int $field_of_practice_id) {
        $field_of_practice = FieldOfPractice::findOrFail($field_of_practice_id);
        $practices = Practice::all();

        return view('dashboard.field_of_practice', [
            'field_of_practice' => $field_of_practice,
            'practices' => $practices
        ]);
    }

    public function update (int $field_of_practice_id, Request $request)
    {
        $field_of_practice = FieldOfPractice::findOrFail($field_of_practice_id);

        $validatedData = $request->validate([
            'name' => 'required',
            'practice_id' => 'required|exists:App\Models\Practice,id'
        ]);

        $field_of_practice->name = $request->name;
        $field_of_practice->practice_id = $request->practice_id;

        $field_of_practice->save();

        return \Redirect::route('dashboard_field-of-practice', [$field_of_practice->id]);
    }

    public function create () {
        $field_of_practice = new FieldOfPractice();
        $practices = Practice::all();

        return view('dashboard.field_of_practice', [
            'field_of_practice' => $field_of_practice,
            'practices' => $practices
        ]);
    }

    public function store (Request $request) {
        $field_of_practice = new FieldOfPractice();

        $validatedData = $request->validate([
            'name' => 'required',
            'practice_id' => 'required|exists:App\Models\Practice,id'
        ]);

        $field_of_practice->name = $request->name;
        $field_of_practice->practice_id = $request->practice_id;

        $field_of_practice->save();

        return \Redirect::route('dashboard_field-of-practice', [$field_of_practice->id]);
    }

    public function delete (int $field_of_practice_id) {
        $field_of_practice = FieldOfPractice::findOrFail($field_of_practice_id);

        $field_of_practice->delete();

        return \Redirect::route('dashboard_fields-of-practice');
    }
}
