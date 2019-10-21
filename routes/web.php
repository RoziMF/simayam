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

// Route::get('/pemesanan', 'PemesananController@index')->name('pemesanan');
Route::resource('pemesanan','PemesananController');

Route::resource('harga','HargaController');

Route::resource('stok','StokController');

// Route::put('/harga', 'HargaController@update')->name('harga');
// Route::get('/form_harga', 'HargaController@form');
// Route::put('/harga/proses', 'HargaController@proses');
