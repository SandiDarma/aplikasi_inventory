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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

	Route::resource('/ruang', 'RuangController');
	Route::get('/table/ruang', 'RuangController@dataTable')->name('table.ruang');

	Route::resource('/jenis', 'JenisController');
	Route::get('/table/jenis', 'JenisController@dataTable')->name('table.jenis');
	
	Route::resource('/pegawai', 'PegawaiController');
	Route::get('/table/pegawai', 'PegawaiController@dataTable')->name('table.pegawai');	

	Route::resource('/peminjaman', 'PeminjamanController');
	Route::get('/table/peminjaman', 'PeminjamanController@dataTable')->name('table.peminjaman');
	Route::get('/cari/pegawai', 'PeminjamanController@loadPegawai');
	Route::get('/peminjaman/{id}/report/peminjaman', 'PeminjamanController@generatePDF')->name('report.peminjaman');

	Route::resource('/inventaris', 'InventarisController');
	Route::get('/table/inventaris', 'InventarisController@dataTable')->name('table.inventaris');
	Route::get('/cari/jenis', 'InventarisController@loadJenis');
	Route::get('/cari/ruang', 'InventarisController@loadRuang');
	Route::get('/cari/users', 'InventarisController@loadUsers');
	
	Route::resource('/detailpinjam', 'DetailPinjamController');
	Route::get('/table/detailpinjam', 'DetailPinjamController@dataTable')->name('table.detailpinjam');
	Route::get('/cari/inventaris', 'DetailPinjamController@loadInventaris');
	
	Route::resource('/Users', 'UsersController');

});