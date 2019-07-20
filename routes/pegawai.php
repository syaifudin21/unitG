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
Route::delete('/dokter/reset/{id}', 'Pegawai\DokterController@reset')->name('pegawai.dokter.reset');

Route::get('/pegawai', 'Pegawai\PegawaiController@index')->name('pegawai.pegawai');
Route::get('/pegawai/tambah', 'Pegawai\PegawaiController@create')->name('pegawai.pegawai.create');
Route::get('/pegawai/status', 'Pegawai\PegawaiController@status')->name('pegawai.pegawai.status');
Route::get('/pegawai/show/{id}', 'Pegawai\PegawaiController@show')->name('pegawai.pegawai.show');
Route::post('/pegawai/tambah', 'Pegawai\PegawaiController@store')->name('pegawai.pegawai.store');
Route::get('/pegawai/edit/{id}', 'Pegawai\PegawaiController@edit')->name('pegawai.pegawai.edit');
Route::put('/pegawai/update', 'Pegawai\PegawaiController@update')->name('pegawai.pegawai.update');
Route::delete('/pegawai/delete/{id}', 'Pegawai\PegawaiController@delete')->name('pegawai.pegawai.delete');

Route::get('/inventaris', 'Pegawai\InventarisController@index')->name('pegawai.inventaris');
Route::get('/inventaris/tambah', 'Pegawai\InventarisController@create')->name('pegawai.inventaris.create');
Route::get('/inventaris/show/{id}', 'Pegawai\InventarisController@show')->name('pegawai.inventaris.show');
Route::post('/inventaris/tambah', 'Pegawai\InventarisController@store')->name('pegawai.inventaris.store');
Route::get('/inventaris/edit/{id}', 'Pegawai\InventarisController@edit')->name('pegawai.inventaris.edit');
Route::put('/inventaris/update', 'Pegawai\InventarisController@update')->name('pegawai.inventaris.update');
Route::delete('/inventaris/delete/{id}', 'Pegawai\InventarisController@delete')->name('pegawai.inventaris.delete');

Route::get('/pasien', 'Pegawai\PasienController@index')->name('pegawai.pasien');
Route::get('/pasien/show/{id}', 'Pegawai\PasienController@show')->name('pegawai.pasien.show');
Route::delete('/pasien/delete/{id}', 'Pegawai\PasienController@delete')->name('pegawai.pasien.delete');
Route::delete('/pasien/reset/{id}', 'Pegawai\PasienController@reset')->name('pegawai.pasien.reset');

Route::get('/periksa', 'Pegawai\PeriksaController@index')->name('pegawai.periksa');
Route::get('/periksa/tambah', 'Pegawai\PeriksaController@create')->name('pegawai.periksa.create');
Route::get('/periksa/status', 'Pegawai\PeriksaController@status')->name('pegawai.periksa.status');
Route::get('/periksa/show/{id}', 'Pegawai\PeriksaController@show')->name('pegawai.periksa.show');
Route::post('/periksa/tambah', 'Pegawai\PeriksaController@store')->name('pegawai.periksa.store');
Route::post('/periksa/tambah/pra', 'Pegawai\PeriksaController@storepra')->name('pegawai.periksa.store.pra');
Route::post('/periksa/tambah/primer', 'Pegawai\PeriksaController@storeprimer')->name('pegawai.periksa.store.primer');
Route::delete('/periksa/tambah/akhir', 'Pegawai\PeriksaController@storeakhir')->name('pegawai.periksa.store.akhir');
Route::get('/periksa/edit/{id}', 'Pegawai\PeriksaController@edit')->name('pegawai.periksa.edit');
Route::put('/periksa/update', 'Pegawai\PeriksaController@update')->name('pegawai.periksa.update');

Route::get('/periksa/keperawatan/{periksa_id}', 'Pegawai\PeriksaController@createkeperawatan')->name('pegawai.keperawatan.create');
Route::post('/periksa/keperawatan', 'Pegawai\PeriksaController@storekeperawatan')->name('pegawai.keperawatan.store');

Route::get('/periksa/obatcairan/{periksa_id}', 'Pegawai\PeriksaController@createobatcairan')->name('pegawai.obatcairan.create');
Route::post('/periksa/obatcairan', 'Pegawai\PeriksaController@storeobatcairan')->name('pegawai.obatcairan.store');

Route::get('/periksa/observasi/{periksa_id}', 'Pegawai\PeriksaController@createobservasi')->name('pegawai.observasi.create');
Route::post('/periksa/observasi', 'Pegawai\PeriksaController@storeobservasi')->name('pegawai.observasi.store');

Route::get('/periksa/alatterpasang/{periksa_id}', 'Pegawai\PeriksaController@createalatterpasang')->name('pegawai.alatterpasang.create');
Route::post('/periksa/alatterpasang', 'Pegawai\PeriksaController@storealatterpasang')->name('pegawai.alatterpasang.store');
Route::get('/alatterpasang/status', 'Pegawai\PeriksaController@alatstatus')->name('pegawai.alatterpasang.status');
