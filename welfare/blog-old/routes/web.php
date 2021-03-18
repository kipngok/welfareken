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


Auth::routes(['register' => false]);

Route::group( ['middleware' => ['auth']], function()
{
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/school','SchoolController');
Route::resource('/sms','SmsController');
Route::post('/process', 'Controller@process');
Route::get('/invoice/{school_id}/{class}/{subscription}','InvoiceController@filtered');
Route::get('/invoice/{id}/create','InvoiceController@create');
Route::get('/invoice/batch','InvoiceController@batch');
Route::post('/invoice/saveBatch','InvoiceController@saveBatch');
Route::post('/search','StudentController@search');
Route::resource('/invoice','InvoiceController');
Route::get('/student/{school_id}/{class}/{subscription}','StudentController@filtered');
// Route::resource('/student','StudentController');
Route::get('/payment/{id}/create','PaymentController@create');
Route::get('/payment/{school_id}/{class}/{subscription}','PaymentController@filtered');
Route::resource('/payment','PaymentController');
Route::resource('/user','UserController');

});

