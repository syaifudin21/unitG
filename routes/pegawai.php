<?php

Route::get('/', 'Pegawai\HomeController@index')->name('pegawai.home');
Route::get('/login', 'Pegawai\LoginController@form');
Route::post('/login', 'Pegawai\LoginController@login')->name('pegawai.login');
Route::post('/logout', 'Pegawai\LoginController@logout')->name('pegawai.logout');

Route::get('/dokter', 'Pegawai\DokterController@index')->name('pegawai.dokter');
Route::get('/dokter/tambah', 'Pegawai\DokterController@create')->name('pegawai.dokter.create');
Route::get('/dokter/status', 'Pegawai\DokterController@status')->name('pegawai.dokter.status');
Route::get('/dokter/show/{id}', 'Pegawai\DokterController@show')->name('pegawai.dokter.show');
Route::post('/dokter/tambah', 'Pegawai\DokterController@store')->name('pegawai.dokter.store');
Route::get('/dokter/edit/{id}', 'Pegawai\DokterController@edit')->name('pegawai.dokter.edit');
Route::put('/dokter/update', 'Pegawai\DokterController@update')->name('pegawai.dokter.update');
Route::delete('/dokter/delete/{id}', 'Pegawai\DokterController@delete')->name('pegawai.dokter.delete');

Route::get('/pasien', 'Pegawai\PasienController@index')->name('pegawai.pasien');
Route::get('/pasien/show/{id}', 'Pegawai\PasienController@show')->name('pegawai.pasien.show');
Route::delete('/pasien/delete/{id}', 'Pegawai\PasienController@delete')->name('pegawai.pasien.delete');

Route::get('/periksa', 'Pegawai\PeriksaController@index')->name('pegawai.periksa');
Route::get('/periksa/tambah', 'Pegawai\PeriksaController@create')->name('pegawai.periksa.create');
Route::get('/periksa/status', 'Pegawai\PeriksaController@status')->name('pegawai.periksa.status');
Route::get('/periksa/show/{id}', 'Pegawai\PeriksaController@show')->name('pegawai.periksa.show');
Route::post('/periksa/tambah', 'Pegawai\PeriksaController@store')->name('pegawai.periksa.store');
Route::get('/periksa/edit/{id}', 'Pegawai\PeriksaController@edit')->name('pegawai.periksa.edit');
Route::put('/periksa/update', 'Pegawai\PeriksaController@update')->name('pegawai.periksa.update');
Route::delete('/periksa/delete/{id}', 'Pegawai\PeriksaController@delete')->name('pegawai.periksa.delete');
