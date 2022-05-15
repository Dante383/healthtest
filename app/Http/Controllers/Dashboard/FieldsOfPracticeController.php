<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FieldOfPractice;

class FieldsOfPracticeController extends Controller
{
    public function index () {
        return view('dashboard.fields_of_practice', [
            'fields_of_practice' => FieldOfPractice::paginate(10)
        ]);
    }
}
