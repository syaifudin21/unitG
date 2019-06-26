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

Route::get('/', 'HomeController@home')->name('home');
Route::get('/daftar', 'HomeController@daftar')->name('pasien.daftar');
Route::post('/daftar/store', 'HomeController@store')->name('pasien.daftar.store');


Route::post('/upload/gambar', 'ImagesController@upload')->name('upload.gambar');
Route::post('/galeri/store', 'ImagesController@store')->name('galeri.store');
Route::delete('/galeri/delete/{id}', 'ImagesController@delete')->name('galeri.delete');
