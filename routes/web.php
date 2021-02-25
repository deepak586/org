<?php

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
Auth::routes(['register' => false]);
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('company', 'CompanyController')->names([
    'create' => 'company.create'
]);
Route::resource('employee', 'EmployeeController')->names([
    'create' => 'employee.create'
]);
Route::post('login1', 'JwtAuthController@login1');



