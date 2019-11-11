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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/vehicle/{id}', 'IndexController@show')->name('show');
Route::resource('/drivers', 'DriverController', ['parameters' => ['drivers' => 'id']])->names('drivers');
//Route::resource('/vehicles', 'VehicleController', ['parameters' => ['vehicles' => 'id']])->names('vehicles');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/vehicles', 'VehicleController', ['parameters' => ['vehicles' => 'id']]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
