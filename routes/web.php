<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['prefix'=>'dashbord','namespace'=>'Admincontrollers','middleware' => 'auth'], function(){
    Route::get('/', 'DashbordController@index')->name('index');

/********************************** User Route **********************************/
    Route::group(['prefix' => 'users', 'middleware' => 'role:tito_admin'], function() {
        Route::get('/', 'UsersController@index')->name('users.index');
        Route::get('create', 'UsersController@create')->name('users.create');
        Route::post('store', 'UsersController@store')->name('users.store');
        Route::get('{id}/edit', 'UsersController@edit')->name('users.edit');
        Route::put('{id}', 'UsersController@update')->name('users.update');
    });

/********************************** Bag Route **********************************/
    Route::get('bag', 'BagesController@index')->name('bag.index');
    Route::get('bag/create', 'BagesController@create')->name('bag.create');
    Route::post('bag/create','BagesController@store')->name('bag.store');
    Route::get('bag/{id}/edit','BagesController@edit')->name('bag.edit');
    Route::put('bag/{id}','BagesController@update')->name('bag.update');
    Route::get('bag/{id}/trashe', 'BagesController@trashe')->name('bag.trashe');
    Route::get('bag/trashed', 'BagesController@trashed')->name('bag.trashed');
    Route::get('bag/{id}/restore', 'BagesController@restore')->name('bag.restore');
    Route::get('bag/{id}/forcedelete', 'BagesController@forcedelete')->name('bag.forcedelete');

    /********************************** Bag Route **********************************/
    Route::get('laws', 'lawsController@index')->name('laws.index');
    Route::get('laws/create', 'lawsController@create')->name('laws.create');
    Route::post('laws/create','lawsController@store')->name('laws.store');
    Route::get('laws/{id}/edit','lawsController@edit')->name('laws.edit');
    Route::put('laws/{id}','lawsController@update')->name('laws.update');
    Route::get('laws/{id}/trashe', 'lawsController@trashe')->name('laws.trashe');
    Route::get('laws/trashed', 'lawsController@trashed')->name('laws.trashed');
    Route::get('laws/{id}/restore', 'lawsController@restore')->name('laws.restore');
    Route::get('laws/{id}/forcedelete', 'lawsController@forcedelete')->name('laws.forcedelete');

    /********************************** door Route **********************************/
    Route::get('door', 'doorsController@index')->name('door.index');
    Route::get('door/create', 'doorsController@create')->name('door.create');
    Route::post('door/create','doorsController@store')->name('door.store');
    Route::get('door/{id}/edit','doorsController@edit')->name('door.edit');
    Route::put('door/{id}','doorsController@update')->name('door.update');
    Route::get('door/{id}/forcedelete', 'doorsController@forcedelete')->name('door.forcedelete');

    /********************************** Material Route **********************************/
    Route::get('material', 'materialsController@index')->name('material.index');
    Route::get('material/create', 'materialsController@create')->name('material.create');
    Route::post('material/create','materialsController@store')->name('material.store');
    Route::get('material/{id}/edit','materialsController@edit')->name('material.edit');
    Route::put('material/{id}','materialsController@update')->name('material.update');
    Route::get('material/{id}/forcedelete', 'materialsController@forcedelete')->name('material.forcedelete');

    /********************************** AboutUs Route **********************************/
    Route::get('about', 'AboutusController@index')->name('about.index');
    Route::get('about/{id}/edit', 'AboutusController@edit')->name('about.edit');
    Route::post('about/{id}/update', 'AboutusController@update')->name('about.update');
    Route::post('about/store', 'AboutusController@store')->name('about.store');

    /********************************** Social Route **********************************/
    Route::get('social', 'SocialController@index')->name('social.index');
    Route::post('social/store', 'SocialController@store')->name('social.store');
    Route::post('social/{id}/update', 'SocialController@update')->name('social.update');

    /********************************** Settings Route **********************************/
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::post('setting/store', 'SettingController@store')->name('setting.store');
    Route::post('setting/{id}/update', 'SettingController@update')->name('setting.update');

    /********************************** Settings Route **********************************/
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');
});


/********************************** Auth Route **********************************/
Auth::routes([
  'register' => false, // Registration Routes...
  'verify' => false, // Email Verification Routes...
  ]);
Route::get('/home', 'HomeController@index')->name('home');
