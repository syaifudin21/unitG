<?php

Route::get('/', 'Pasien\HomeController@index')->name('pasien.home');
Route::get('/login', 'Pasien\LoginController@form');
Route::post('/login', 'Pasien\LoginController@login')->name('pasien.login');
Route::post('/logout', 'Pasien\LoginController@logout')->name('pasien.logout');

// Route::get('/profil', 'Reporter\ReporterController@profil')->name('reporter.profil');
// Route::put('/profil/update', 'Reporter\ReporterController@profilupdate')->name('reporter.profil.update');
// Route::put('/profil/password', 'Reporter\ReporterController@profilupdatepasword')->name('reporter.profil.password');

// Route::get('/berita', 'Reporter\BeritaController@index')->name('reporter.berita');
// Route::get('/berita/publish', 'Reporter\BeritaController@publish')->name('reporter.berita.publish');
// Route::get('/berita/tambah', 'Reporter\BeritaController@create')->name('reporter.berita.create');
// Route::get('/berita/show/{id}', 'Reporter\BeritaController@show')->name('reporter.berita.show');
// Route::post('/berita/tambah', 'Reporter\BeritaController@store')->name('reporter.berita.store');
// Route::get('/berita/edit/{id}', 'Reporter\BeritaController@edit')->name('reporter.berita.edit');
// Route::put('/berita/update', 'Reporter\BeritaController@update')->name('reporter.berita.update');
// Route::delete('/berita/delete/{id}', 'Reporter\BeritaController@delete')->name('reporter.berita.delete');
