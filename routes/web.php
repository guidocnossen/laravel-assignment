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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index'); 

// logout by get
Route::get('logout', 'Auth\LoginController@logout');

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function () {
	Route::get('/', 'Admin\DashboardController@index');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
	Route::get('clear-cache', 'Admin\DashboardController@clearCache')->name('admin.clear-cache');
	
    // *endownments* //
    Route::resource('houses', 'Admin\HousesController', ['as' => 'admin']);
    Route::get('houses/{house}/delete', [
        'as'   => 'admin.houses.delete',
        'uses' => 'Admin\HousesController@destroy',
    ]);
    Route::get('houses/{house}/delete-picture/{image}', [
        'as'   => 'admin.houses.delete-picture',
        'uses' => 'Admin\HousesController@deletePicture',
    ]);
}); 