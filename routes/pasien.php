<?php

Route::get('/', 'Pasien\HomeController@index')->name('pasien.home');
Route::get('/login', 'Pasien\LoginController@form');
Route::post('/login', 'Pasien\LoginController@login')->name('pasien.login');
Route::post('/logout', 'Pasien\LoginController@logout')->name('pasien.logout');

Route::get('/diagnosa', 'Pasien\ProfilController@diagnosa')->name('pasien.diagnosa');

Route::get('/profil', 'Pasien\ProfilController@profil')->name('pasien.profil');
Route::put('/profil/update', 'Pasien\ProfilController@profilupdate')->name('pasien.profil.update');
Route::put('/profil/password', 'Pasien\ProfilController@profilupdatepasword')->name('pasien.profil.password');

Route::get('/dokter/show/{id}', 'pasien\ProfilController@dokterprofil')->name('pasien.dokter.show');

Route::get('/periksa', 'Pasien\PeriksaController@index')->name('pasien.periksa');
Route::get('/periksa/show/{id}', 'Pasien\PeriksaController@show')->name('pasien.periksa.show');
Route::get('/periksa/observasi/{periksa_id}', 'Pasien\PeriksaController@createobservasi')->name('pasien.observasi.create');
Route::post('/periksa/observasi', 'Pasien\PeriksaController@storeobservasi')->name('pasien.observasi.store');

Route::get('/keluhan', 'Pasien\PeriksaController@keluhan')->name('pasien.keluhan');

// Route::get('/berita', 'Reporter\BeritaController@index')->name('reporter.berita');
// Route::get('/berita/publish', 'Reporter\BeritaController@publish')->name('reporter.berita.publish');
// Route::get('/berita/tambah', 'Reporter\BeritaController@create')->name('reporter.berita.create');
// Route::get('/berita/show/{id}', 'Reporter\BeritaController@show')->name('reporter.berita.show');
// Route::post('/berita/tambah', 'Reporter\BeritaController@store')->name('reporter.berita.store');
// Route::get('/berita/edit/{id}', 'Reporter\BeritaController@edit')->name('reporter.berita.edit');
// Route::put('/berita/update', 'Reporter\BeritaController@update')->name('reporter.berita.update');
// Route::delete('/berita/delete/{id}', 'Reporter\BeritaController@delete')->name('reporter.berita.delete');
