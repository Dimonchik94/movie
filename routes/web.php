<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainPageController@index');
Route::get('/action', 'MainPageController@action');
Route::get('/comedy', 'MainPageController@comedy');
Route::get('/fantasy', 'MainPageController@fantasy');
Route::get('/movie/{id}', 'MainPageController@movie');


$methods = [ 'index', 'show', 'store', 'update', 'destroy'];
Route::resource('moderate', 'MoviesController')
    ->only($methods)
    ->names('moderate.panel');

Route::post('/uploadImage', 'ImageController@uploadImage')->name('upload.image'); // Загрузка картинок
