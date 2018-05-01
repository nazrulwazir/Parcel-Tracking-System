<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api\Manage',
    'prefix'    => 'manage',
    'as'        => 'api.manage.',
], function () {
    Route::get('pos-laju-api/{tracking_number}', 'PosLajuController@track')->name('track');
});