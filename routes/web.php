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

Route::get('/', 'DashboardController@dashboard');

Route::group(['middleware' => ['auth']], function(){

    Route::group(['prefix' => 'activities'], function () {
        Route::post('store', 'ActivityController@store')->name('store_activity');
        Route::post('archive', 'ActivityController@archive')->name('archive_activity');
    });
});

Auth::routes([
    'register' => false,
]);
