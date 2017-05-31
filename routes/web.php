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
    return redirect('/login');
});

Auth::routes();

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('/users', 'UsersController');
    Route::resource('/cars', 'CarsController');
    Route::resource('/bookings', 'BookingsController');
    Route::get('/checks', 'ChecksController@index')->name('checks.index');
});
