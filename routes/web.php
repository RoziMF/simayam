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

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/transaksi', 'PenjualanController@index')->name('penjualan');
Route::resource('penjualan','PenjualanController');
Route::get('/cetak_pdf','PenjualanController@pdf')->name('pdf');

// Route::get('/pemesanan', 'PemesananController@index')->name('pemesanan');
Route::resource('pemesanan','PemesananController');
Route::get('/cetak_pdf_order','PemesananController@pdf')->name('pdforder');

Route::resource('harga','HargaController');

Route::resource('stok','StokController');

//peramalan
Route::get('/peramalan', 'PeramalanController@index')->name('peramalan');
Route::get('/peramalan/store', 'PeramalanController@peramalan')->name('peramalan.store');
Route::get('/peramalan_order/store', 'PeramalanController@peramalan0')->name('peramalan0.store');

//keuangan
Route::get('/keuangan', 'KeuanganController@index')->name('keuangan');
Route::get('/pengeluaran/create', 'KeuanganController@pengeluaranCreate')->name('pengeluaranCreate');
Route::post('/keuangan/store', 'KeuanganController@pengeluaranStore')->name('pengeluaranStore');


// Route::put('/harga', 'HargaController@update')->name('harga');
// Route::get('/form_harga', 'HargaController@form');
// Route::put('/harga/proses', 'HargaController@proses');
