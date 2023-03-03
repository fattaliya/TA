<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Controllers\Administrator;
use App\Http\Controllers;
use App\Http\Controllers\RegisterController;

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


Route::get('/', 'FrontController@tes')->name('index');


Route::get('/cari', 'FrontController@cari');
Route::get('/cari-buku/{kategori}', 'FrontController@cari_buku');
Route::get('/search-auto-db', 'FrontController@searchQuery');
Route::post('/post-tamu', 'FrontController@tamu')->name('post.tamu');


Route::get('/masuk', 'MasukController@create');
// Route::get('/admin/dashboard', 'Admin\DashboardController@index');
Route::get('/admin/dashboard', 'BukuController@indexdashboard');

Route::get('/admin/buku', 'bukuController@read');
Route::get('/admin/buku/add', 'bukuController@add');
Route::post('/admin/buku/create', 'bukuController@create');
Route::get('/admin/buku/edit/{id}', 'bukuController@edit');
Route::post('/admin/buku/update/{id}', 'bukuController@update');
Route::get('/admin/buku/delete/{id}', 'bukuController@delete');
Route::get('/admin/buku/buku/{id}', 'bukuController@buku');
Route::get('/admin/buku/cari', 'BukuController@cari');
Route::get('/admin/buku/print_buku', 'bukuController@print_buku');
Route::get('/admin/buku/print', 'bukuController@print');

//Kategori
Route::get('/admin/kategori', 'kategoriController@read');
Route::get('/admin/kategori/add', 'KategoriController@add');
Route::post('/admin/kategori/create', 'KategoriController@create');
Route::get('/admin/kategori/edit/{id}', 'KategoriController@edit');
Route::post('/admin/kategori/update/{id}', 'KategoriController@update');
Route::get('/admin/kategori/delete/{id}', 'KategoriController@delete');

//Kategori
Route::get('/admin/kehilangan', 'kehilanganController@read');
Route::get('/admin/kehilangan/add', 'kehilanganController@add');
Route::post('/admin/kehilangan/create', 'kehilanganController@create');
Route::get('/admin/kehilangan/edit/{id}', 'kehilanganController@edit');
Route::post('/admin/kehilangan/update/{id}', 'kehilanganController@update');
Route::get('/admin/kehilangan/delete/{id}', 'kehilanganController@delete');



//Denda
Route::get('/admin/jurusan', 'jurusanController@read');
Route::get('/admin/jurusan/add', 'jurusanController@add');
Route::post('/admin/jurusan/create', 'jurusanController@create');
Route::get('/admin/jurusan/edit/{id}', 'jurusanController@edit');
Route::post('/admin/jurusan/update/{id}', 'jurusanController@update');
Route::get('/admin/jurusan/delete/{id}', 'jurusanController@delete');


//Cari Kategori
Route::get('/kategori', 'FrontController@carikategori')->name('kategori.buku');

//Data Siswa


Route::get('/admin/data_siswa', 'datasiswaController@read');
Route::get('/admin/data_siswa/add', 'datasiswaController@add');
Route::post('/admin/data_siswa/create', 'datasiswaController@create');
Route::get('/admin/data_siswa/edit/{id}', 'datasiswaController@edit');
Route::post('/admin/data_siswa/update/{id}', 'datasiswaController@update');
Route::get('/admin/data_siswa/delete/{id}', 'datasiswaController@delete');
Route::get('/admin/data_siswa/status_akun/{id}', 'datasiswaController@status_akun');
Route::get('/admin/data_siswa/konfirmasi', 'datasiswaController@konfrimasi');
Route::get('/admin/data_siswa/detail/{nis}', 'datasiswaController@detail');
Route::get('/admin/peminjaman/detail/print_data_siswa', 'peminjamanController\detail@print_data_siswa');
Route::get('/admin/data_siswa/cari', 'DatasiswaController@cari');
Route::get('/admin/data_siswa/print_data_anggota', 'datasiswaController@print_data_anggota');
Route::get('/admin/data_siswa/print', 'datasiswaController@print');


//Peminjaman
Route::get('/admin/peminjaman', 'peminjamanController@read');
Route::get('/admin/peminjaman/add', 'peminjamanController@add');
Route::post('/admin/peminjaman/create', 'peminjamanController@create');
Route::get('/admin/peminjaman/edit/{id}', 'peminjamanController@edit');
Route::post('/admin/peminjaman/update/{id}', 'peminjamanController@update');
Route::get('/admin/peminjaman/delete/{id}', 'peminjamanController@delete');
Route::get('/admin/peminjaman/kembali/{id}', 'peminjamanController@kembali');
Route::get('/admin/peminjaman/kembali/{id}', 'peminjamanController@kembali');

Route::get('/admin/peminjaman/getdenda/{id}', 'peminjamanController@getdenda');
Route::post('/admin/peminjaman/denda', 'peminjamanController@denda');
Route::get('/admin/peminjaman/getKehilangan/{id}', 'peminjamanController@getKehilangan');
Route::post('/admin/peminjaman/kehilangan', 'peminjamanController@Kehilangan');
// Route::get('/admin/peminjaman/print', 'peminjamanController@print');
Route::get('/admin/peminjaman/reportPeminjaman', 'LaporanController@reportPeminjaman');
Route::get('/admin/peminjaman/report', 'peminjamanController@report');
Route::get('/admin/peminjaman/cari-data/{id_siswa}/{bulan}/{tahun}', 'peminjamanController@cari_data')->name('laporan.cari_data');
Route::get('/admin/peminjaman/print/{id_siswa}/{bulan}/{tahun}', 'peminjamanController@print_laporan')->name('laporan.print');
Route::get('/admin/peminjaman/reportPeminjaman/{tglawal}/{tglakhir}', 'LaporanController@reportPeminjaman');
Route::get('/admin/peminjaman/detail/{nis}', 'peminjamanController@detail');
Route::get('/admin/peminjaman/print/{nis}', 'peminjamanController@print_detail')->name('peminjaman.print');

Route::get('/admin/pengembalian/report', 'peminjamanController@pengembalian');
Route::get('/admin/pengembalian/cari-data/{id_siswa}/{bulan}/{tahun}', 'peminjamanController@cari_pengembalian')->name('laporan.cari_data');
Route::get('/admin/pengembalian/print/{id_siswa}/{bulan}/{tahun}', 'peminjamanController@pengembalian_print')->name('pengembalian.print');


Route::get('/admin/buku-tamu', 'BukuTamuController@index')->name('buku.tamu');
Route::get('/admin/print-buku-tamu/{m}/{s}', 'BukuTamuController@print')->name('buku.tamu.print');

Route::get('/admin/pengembalian-buku', 'peminjamanController@pengembalian_buku');



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
