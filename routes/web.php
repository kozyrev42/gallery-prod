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

Route::get('/', 'ImagesController@index');

Route::middleware(['admin'])->group(function(){
    Route::get('/about', 'HomeController@about');
});

Route::get('/create', 'ImagesController@create');

Route::get('/show/{id}', 'ImagesController@show');

Route::get('/edit/{id}', 'ImagesController@edit');

Route::post('/update/{id}', 'ImagesController@update');

Route::post('/store', 'ImagesController@store');

Route::get('/delete/{id}', 'ImagesController@delete');

Route::get('/test/{id?}', 'ImagesController@testRequest'); // для теста Request

Route::post('/testpost', 'ImagesController@testPost'); // для валидации данных из формы

Route::get('/list', 'HomeController@list'); // страница список дел