<?php

Route::get('/', 'Pegawai\HomeController@index')->name('pegawai.home');
Route::get('/login', 'Pegawai\LoginController@form');
Route::post('/login', 'Pegawai\LoginController@login')->name('pegawai.login');
Route::post('/logout', 'Pegawai\LoginController@logout')->name('pegawai.logout');
