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

Route::middleware('CheckAdmin')->prefix('/admin/')->group(function () {
    
    Route::get('/','AdminController@panel');

    // AJAX
    Route::get('/edi-table-seminars','AdminController@ediTableSeminars');

    Route::get('/edi-table-seminar/{id}','AdminController@ediTableSeminar');

});

Route::get('/test',function(){return view('test');});
Route::get('/','HomeController@index');




Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
// OAuth Routes
Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('{name?}','FonikController@showView');