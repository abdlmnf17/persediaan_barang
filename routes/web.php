<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource( '/user' , 'UserController' );

Route::get('/user/hapus/{kode}','UserController@destroy');

Route::resource( '/barangkeluar', 'BarangKeluarController'); 

Route::resource( '/persediaan', 'PersediaanController');

Route::resource( '/barangmasuk', 'BarangMasukController');

Route::resource( '/laporan' , 'LaporanController' );

Route::get('/barangkeluar/hapus/{id}','BarangkeluarController@destroy'); 

Route::get('/barangmasuk/hapus/{id}','BarangmasukController@destroy'); 