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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','HomeController@index');
Route::group(['prefix' => 'admin'],function(){
    Route::get('/','Admin\LoginController@index');
    Route::post('/','Admin\LoginController@login')->name('admin.login');
    Route::group(['middleware' => ['auth']], function(){
        Route::get('home','Admin\HomeController@index');
    });
    
});

