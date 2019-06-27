<?php

Route::get('/', 'Dokter\HomeController@index')->name('dokter.home');
Route::get('/login', 'Dokter\LoginController@form');
Route::post('/login', 'Dokter\LoginController@login')->name('dokter.login');
Route::post('/logout', 'Dokter\LoginController@logout')->name('dokter.logout');

Route::get('/diagnosa', 'Dokter\DiagnosaController@index')->name('dokter.diagnosa');
Route::get('/diagnosa/tambah', 'Dokter\DiagnosaController@create')->name('dokter.diagnosa.create');
// Route::get('/diagnosa/status', 'Dokter\DiagnosaController@status')->name('dokter.diagnosa.status');
Route::get('/diagnosa/show/{id}', 'Dokter\DiagnosaController@show')->name('dokter.diagnosa.show');
Route::post('/diagnosa/tambah', 'Dokter\DiagnosaController@store')->name('dokter.diagnosa.store');
Route::get('/diagnosa/edit/{id}', 'Dokter\DiagnosaController@edit')->name('dokter.diagnosa.edit');
Route::put('/diagnosa/update', 'Dokter\DiagnosaController@update')->name('dokter.diagnosa.update');
Route::delete('/diagnosa/delete/{id}', 'Dokter\DiagnosaController@delete')->name('dokter.diagnosa.delete');

