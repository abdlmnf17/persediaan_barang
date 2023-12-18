<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\LaporanController;
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
Route::get( '/persediaan/edit/{id}', 'PersediaanController@edit');

Route::get( '/barangmasuk/detail/{id}', 'BarangmasukController@show');
Route::get( '/barangkeluar/detail/{id}', 'BarangkeluarController@show');

Route::resource( '/barangmasuk', 'BarangMasukController');

Route::resource( '/laporan' , 'LaporanController' );

Route::get('/barangkeluar/hapus/{id}','BarangkeluarController@destroy');

Route::get('/barangmasuk/hapus/{id}','BarangmasukController@destroy');
Route::get('/persediaan/hapus/{id}','PersediaanController@destroy');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::post('/laporan/generate', [LaporanController::class, 'generate'])->name('laporan.generate');
Route::get('/laporan/print/{startDate}/{endDate}', 'LaporanController@printPDF')->name('laporan.print');


Route::get('/print-laporan', [PrintController::class, 'printLaporan']);
