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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/aset/{id}/delete', 'AsetController@delete');
Route::get('/aset/import', 'AsetController@import');
Route::post('/aset/import', 'AsetController@processImport');
Route::get('/aset/export', 'AsetController@export');
Route::get('/aset/charts', 'AsetController@charts');
Route::resource('/aset', 'AsetController');


//Untuk SIPAKCAMAR
Route::get('/form-peminjaman/{id}/transaksi_confirm_status', 'FormPeminjamanController@transaksi_confirm_status');
Route::get('/form-peminjaman/{id}/transaksi_tolak_status', 'FormPeminjamanController@transaksi_tolak_status');

Route::get('/barang/{id}/delete', 'BarangController@delete');
Route::resource('/barang', 'BarangController');
Route::get('/jenisbarang/{id}/delete', 'JenisBarangController@delete');
Route::resource('/jenisbarang', 'JenisBarangController');
Route::resource('/peminjam', 'PeminjamController');
Route::get('/refpeminjam/{id}/delete', 'RefPeminjamController@delete');
Route::resource('/refpeminjam', 'RefPeminjamController');
Route::resource('/transaksipeminjaman', 'TransaksiPeminjamanController');
Route::resource('/form-peminjaman','FormPeminjamanController');
//Route::post('/form-peminjaman/create', 'FormPeminjamanController@create');
Route::get('/about', 'AboutController@index')->name('about');
//Route::get('/form-peminjaman','FormPeminjamanController@index')->name('form-peminjaman');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

