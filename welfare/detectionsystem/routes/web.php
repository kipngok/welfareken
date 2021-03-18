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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');
Route::resource('/product','ProductController');
Route::resource('/company','CompanyController');
Route::resource('/category','CategoryController');
Route::resource('/income','IncomeController');
Route::resource('/user','UserController');
Route::get('/generateRandomString','CodeController@generateRandomString');
Route::get('/notification','IncomeController@notification');
Route::get('/code/{product_id}/{product}/','CodeController@filtered');
Route::resource('/code','CodeController');
Route::resource('/inactive','InactiveproductcodesController');
Route::resource('/active','ActiveproductcodesController');
// Route::get('/generateRandomString','CodeController@promoteSave');
