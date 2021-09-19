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

Route::get('/','TopPageController@show');
Route::get('scss', function(){
    return view('for-scss');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
Route::get('recipe/create', 'Admin\RecipeController@add')->middleware('auth');
Route::post('recipe/create', 'Admin\RecipeController@create')->middleware('auth');
Route::get('recipe', 'Admin\RecipeController@index')->middleware('auth');
Route::get('recipe/edit', 'Admin\RecipeController@edit')->middleware('auth');
Route::post('recipe/edit', 'Admin\RecipeController@update')->middleware('auth');
Route::get('recipe/delete', 'Admin\RecipeController@delete')->middleware('auth');
Route::resource('category', 'Admin\CategoryController')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

