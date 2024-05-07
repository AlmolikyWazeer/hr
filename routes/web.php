<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/setting', SettingController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('/employee', EmployeeController::class);
Route::resource('/attendance', AttendanceController::class);
Route::resource('/balance', BalanceController::class);
Route::resource('/training', TrainingController::class);
