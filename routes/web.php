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

Auth::routes();

Route::get('/logout', 'HomeController@logout');
Route::get('/categories/{id?}', 'CategoriesController@index');
Route::group(['prefix' => 'users', 'middleware' => 'checkUsers'], function() {
    Route::get('/edit/{id?}', 'UsersController@edit')->name('edit');
    Route::post('/edit/{id?}', 'UsersController@update')->name('update');
});
Route::get('/sale', 'SaleController@index');
Route::get('/search', 'HomeController@getSearch');
