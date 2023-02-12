<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


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

Route::post('/contactus','ApiController\ContactusController@send');

/* *************************  About Us  ************************** */
Route::get('/aboutus','ApiController\AboutUSController@send');

/* *************************  Setting   ************************** */
Route::get('/setting','ApiController\SettingController@send');

/* *************************   Social   ************************** */
Route::get('/social','ApiController\SocialController@send');

/* *************************   Bags   **************************** */
Route::get('/bag','ApiController\BagController@send');

/* *************************   Material   ************************ */
Route::get('/material','ApiController\MaterialController@send');

/* *************************     Law      ************************ */
Route::get('/law','ApiController\LawController@send');

/* *************************     Door     ************************ */
Route::get('/door','ApiController\DoorController@send');


