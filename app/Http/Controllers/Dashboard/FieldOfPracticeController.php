<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldOfPractice;

class FieldOfPracticeController extends Controller
{
    public function index (int $field_of_practice_id) {
        $field_of_practice = FieldOfPractice::findOrFail($field_of_practice_id);

        return view('dashboard.field_of_practice', [
            'field_of_practice' => $field_of_practice
        ]);
    }

    public function update (int $field_of_practice_id, Request $request)
    {
        $field_of_practice = FieldOfPractice::findOrFail($field_of_practice_id);

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $field_of_practice->name = $request->name;

        $field_of_practice->save();

        return \Redirect::route('dashboard_field-of-practice', [$field_of_practice->id]);
    }
}
