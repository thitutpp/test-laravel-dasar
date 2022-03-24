<?php

use App\Exports\ExcelExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// CRUD Data
Route::resource('companies', 'CompaniesController')->middleware('auth');
Route::resource('employees', 'EmployeesController')->middleware('auth');
// CRUD Data

// Route Import Excel
Route::get('users', function () {
    $user = User::orderBy('id','desc')->paginate(5);
    return view('user.index',compact('user'));
})->middleware('auth');
Route::post('users', function () {
    Excel::import(new UsersImport, request()->file('file'));
    return back();
})->middleware('auth');
// Route Import Excel

// Route Cetak PDF
Route::get('/employees-pdf', 'EmployeesController@print')->name('print.employees')->middleware('auth');
Route::get('/companies-pdf', 'CompaniesController@print')->name('print.companies')->middleware('auth');
// Route Cetak PDF
