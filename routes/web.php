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



Route::group([
    'namespace' => 'Manage',
    'as'        => 'manage.',
], function () {
		Route::get('/', 'PosLajuController@index')->name('index');
		Route::post('/track', 'PosLajuController@index')->name('track.id');
		Route::get('{parcel_type}/{tracing_num}', 'PosLajuController@track')->name('track');
});

