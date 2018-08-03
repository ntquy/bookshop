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


Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@index')->middleware('check');
// Route::get('/login','LoginController@index');

Auth::routes();

Route::get('/logout', 'HomeController@logout');
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::group(['prefix' => 'users', 'middleware' => 'checkUsers'], function(){
	Route::get('/edit/{id?}', 'UsersController@edit');
	Route::post('/edit/{id?}', 'UsersController@update');
});
