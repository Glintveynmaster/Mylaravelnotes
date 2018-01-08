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

Route::get('/',['as'=>'main_page' ,'uses'=>'IndexController@show']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'web'], function(){
    Route::auth();
});
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
    Route::resource('/images','ImageController');

    Route::get('/images/update/{id}',['uses'=>'UpdatePostController@show', 'as'=>'add_post']);
    Route::post('/images/update',['uses'=>'UpdatePostController@create', 'as'=>'update_post_p']);

    Route::post('/images/import',['uses'=>'ImportExportController@import', 'as'=>'importer']);
    Route::get('/images/export',['uses'=>'ImportExportController@export', 'as'=>'exporter']);

    Route::get('/images/delete/{id}',['uses'=>'UpdatePostController@delt', 'as'=>'update_post_del']);
    Route::get('/images/delete/one_image/{id}',['uses'=>'UpdatePostController@deleteOne', 'as'=>'update_post_del_one']);
});