<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\PracticesController;
use App\Http\Controllers\Dashboard\EmployeesController;
use App\Http\Controllers\Dashboard\FieldsOfPracticeController;

use App\Http\Controllers\Dashboard\PracticeController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\FieldOfPracticeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/practices', [PracticesController::class, 'index'])->name('dashboard_practices');
    Route::get('/employees', [EmployeesController::class, 'index'])->name('dashboard_employees');
    Route::get('/fields-of-practice', [FieldsOfPracticeController::class, 'index'])->name('dashboard_fields-of-practice');

    Route::get('/practice/{id}', [PracticeController::class, 'index'])->name('dashboard_practice');
    Route::patch('/practice/{id}', [PracticeController::class, 'update'])->name('dashboard_practice.update');
    Route::delete('/practice/{id}', [PracticeController::class, 'delete'])->name('dashboard_practice.delete');
    Route::get('/new-practice', [PracticeController::class, 'create'])->name('dashboard_practice.create');
    Route::post('/practices', [PracticeController::class, 'store'])->name('dashboard_practice.store');

    Route::get('/employee/{id}', [EmployeeController::class, 'index'])->name('dashboard_employee');
    Route::patch('/employee/{id}', [EmployeeController::class, 'update'])->name('dashboard_employee.update');
    Route::get('/new-employee', [EmployeeController::class, 'create'])->name('dashboard_employee.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('dashboard_employee.store');

    Route::get('/field-of-practice/{id}', [FieldOfPracticeController::class, 'index'])->name('dashboard_field-of-practice');
    Route::patch('/field-of-practice/{id}', [FieldOfPracticeController::class, 'update'])->name('dashboard_field-of-practice.update');
});

require __DIR__.'/auth.php';
