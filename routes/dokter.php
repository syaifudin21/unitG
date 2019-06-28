<?php

Route::get('/', 'Dokter\HomeController@index')->name('dokter.home');
Route::get('/login', 'Dokter\LoginController@form');
Route::post('/login', 'Dokter\LoginController@login')->name('dokter.login');
Route::post('/logout', 'Dokter\LoginController@logout')->name('dokter.logout');

Route::get('/diagnosa', 'Dokter\DiagnosaController@index')->name('dokter.diagnosa');
Route::get('/diagnosa/tambah/{periksa_id}', 'Dokter\DiagnosaController@create')->name('dokter.diagnosa.create');
Route::post('/diagnosa/tambah', 'Dokter\DiagnosaController@store')->name('dokter.diagnosa.store');

Route::get('/periksa', 'Dokter\PeriksaController@index')->name('dokter.periksa');
Route::get('/periksa/show/{id}', 'Dokter\PeriksaController@show')->name('dokter.periksa.show');
Route::post('/periksa/tambah/pra', 'Dokter\PeriksaController@storepra')->name('dokter.periksa.store.pra');
Route::post('/periksa/tambah/primer', 'Dokter\PeriksaController@storeprimer')->name('dokter.periksa.store.primer');
Route::delete('/periksa/tambah/akhir', 'Dokter\PeriksaController@storeakhir')->name('dokter.periksa.store.akhir');

Route::get('/periksa/keperawatan/{periksa_id}', 'Dokter\PeriksaController@createkeperawatan')->name('dokter.keperawatan.create');
Route::post('/periksa/keperawatan', 'Dokter\PeriksaController@storekeperawatan')->name('dokter.keperawatan.store');

Route::get('/periksa/obatcairan/{periksa_id}', 'Dokter\PeriksaController@createobatcairan')->name('dokter.obatcairan.create');
Route::post('/periksa/obatcairan', 'Dokter\PeriksaController@storeobatcairan')->name('dokter.obatcairan.store');

Route::get('/periksa/alatterpasang/{periksa_id}', 'Dokter\PeriksaController@createalatterpasang')->name('dokter.alatterpasang.create');
Route::post('/periksa/alatterpasang', 'Dokter\PeriksaController@storealatterpasang')->name('dokter.alatterpasang.store');
