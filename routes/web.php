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

Route::middleware('CheckAdmin')->prefix('admin')->group(function () {
    
    Route::get('/','AdminController@panel');
    
    Route::get('/inscriptions','PaymentController@inscriptions');
    
    Route::post('/inscriptions','InscriptionController@RegisterInscription');

    Route::post('/unregistered/registerPayment','PaymentController@unregisteredPayment');
    
    // AJAX
    Route::get('/edi-table-seminars','AdminController@ediTableSeminars');
    
    Route::get('/edi-table-seminar/{id}','AdminController@ediTableSeminar');

    Route::get('/inscriptions/userSearch/{input}','InscriptionController@userSearch');


});

Auth::routes();

Route::get('/logout','HomeController@logout');

Route::get('/test',function(){return view('test');});

Route::get('/','HomeController@index');

Route::get('/add-to-cart/{id}','EventController@addToCart');

Route::get('/remove-from-cart/{id}','EventController@removeFromCart');

Route::get('/mis-pagos','PaymentController@index');

Route::get('/home', 'HomeController@index')->name('home');


// OAuth Routes
Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');

Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/perfil','UserController@profile');

Route::get('/test', function(){
    App\Event::activeCitys();
});

Route::get('/registerPayment','PaymentController@userForm');

// Route::post('/registerPayment','PaymentController@register');

Route::get('/fbLoginSuccess','LoginController@findOrRegister');

Route::post('/register-payment','PaymentController@newPayment');
// MELI


Route::post('/mercadopago-listener','MercadoPagoController@listener');

Route::get('/mercadopago-listener','MercadoPagoController@listener');

Route::get('/test-user','MercadoPagoController@testUser');
// FONIK
Route::get('{name?}','FonikController@showView');