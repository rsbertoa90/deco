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

// Route::middleware('CheckAdmin')->group(function(){

    Route::put('/seminar/edit','SeminarController@edit');
    
    Route::delete('/seminar/delete/{id}','SeminarController@delete');
    
    Route::get('/seminar/create-form','SeminarController@createForm');
    
    Route::post('/seminar/create','SeminarController@create');
    
    Route::put('/event/updateCity','EventController@updateCity');
    
    Route::put('/event/updateDate','EventController@updateDate');
    
    Route::put('/event/updateTime','EventController@updateTime');

    Route::delete('/event/delete/{id}','EventController@delete');
// });


