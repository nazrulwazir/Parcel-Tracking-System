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


Auth::routes();
Route::group([
    'namespace' => 'Manage',
    'as'        => 'manage.',
], function () {
		Route::get('/', 'TrackController@index')->name('index');
		Route::post('/track', 'TrackController@index')->name('track.id');
		Route::get('{parcel_type}/{tracing_num}', 'TrackController@track')->name('track');
		Route::resource('notification', 'NotificationController')->except('index','show','update','index','edit','create', 'destroy');
});