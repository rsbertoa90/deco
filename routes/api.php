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

// Route::middleware('auth:api')->group(function(){

    
        Route::put('/seminar/edit','SeminarController@edit');
        
        Route::delete('/seminar/delete/{id}','SeminarController@delete');
        
        Route::get('/seminar/create-form','SeminarController@createForm');
    
        Route::get('/event/create-form','EventController@createForm');
        
        Route::post('/seminar/create','SeminarController@create');
    
        Route::post('/event/create','EventController@create');
        
        Route::put('/event/updateCity','EventController@updateCity');
        
        Route::put('/event/updateDate','EventController@updateDate');
        
        Route::put('/event/updateTime','EventController@updateTime');
    
        Route::put('/event/updateNumericField','EventController@updateNumericField');
    
        Route::delete('/event/delete/{id}','EventController@delete');

        // por id de evento traer nombre de seminario
        Route::get('/get-seminar-title/{id}','EventController@getSeminarName');
// });




Route::get('/countrys','CityController@countrys');

Route::get('/states/{country}','CityController@states');

Route::get('/citys/{state}','CityController@citys');


