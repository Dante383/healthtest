<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Practice;

class PracticesController extends Controller
{
    public function index () {
        return view('dashboard.practices', [
            'practices' => Practice::paginate(10)
        ]);
    }
}
