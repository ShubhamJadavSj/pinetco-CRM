<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', function(){
    return redirect()->route('dashboard');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'role:Administrator']], function() {

    //Dashboard routes
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    //Company routes
    Route::prefix('company')->group(function () {
        Route::get('/', 'CompanyController@index')->name('company');
        Route::get('/form/{id?}', 'CompanyController@form')->name('company.form');
        Route::post('/store', 'CompanyController@store')->name('company.store');
        Route::post('/update/{id?}', 'CompanyController@update')->name('company.update');
        Route::post('/delete', 'CompanyController@destroy')->name('company.destroy');
    });

    //employee routes
    Route::prefix('employee')->group(function () {
        Route::get('/', 'EmployeeController@index')->name('employee');
        Route::get('/form/{id?}', 'EmployeeController@form')->name('employee.form');
        Route::post('/store', 'EmployeeController@store')->name('employee.store');
        Route::post('/update/{id?}', 'EmployeeController@update')->name('employee.update');
        Route::post('/delete', 'EmployeeController@destroy')->name('employee.destroy');
    });

});
