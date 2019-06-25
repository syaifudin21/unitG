<?php

Route::get('/', 'Dokter\HomeController@index')->name('dokter.home');
Route::get('/login', 'Dokter\LoginController@form');
Route::post('/login', 'Dokter\LoginController@login')->name('dokter.login');
Route::post('/logout', 'Dokter\LoginController@logout')->name('dokter.logout');
