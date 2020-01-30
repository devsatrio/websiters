<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/','Admin\api\Tracking_Ts@index');
Route::post('/login','Admin\api\LoginControl@login');
Route::get('/track-ku/{idk}','Admin\api\Tracking_Ts@history');
Route::post('uplaporan','Admin\api\Tracking_Ts@simpan');
Route::post('upakun','Admin\api\Tracking_Ts@upakun');