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

// Only authentified people can use those routes. Allow to edit data.
Route::group(['middleware' => ['auth']], function(){

    Route::group(['prefix' => 'activities'], function () {
        Route::post('store', 'ActivityController@store')->name('store_activity');
        Route::post('archive', 'ActivityController@archive')->name('archive_activity');
    });

    Route::group(['prefix' => 'events'], function () {
        Route::post('store', 'EventController@store')->name('store_event');
    });
});

Auth::routes([
    'register' => false,
]);
