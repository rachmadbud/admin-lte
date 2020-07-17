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


/*
|--------------------------------------------------------------------------
| Cek Login
|--------------------------------------------------------------------------*/

Auth::routes();

Route::get('/home', 'HomeController@dashboard')->name('dashboard');
Route::get('/dashboard', 'PegawaiController@dashboard')->name('dashboard');
Route::get('/karyawan', 'PegawaiController@index')->name('index');
/*
|--------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| Aplikasi Crud + Serch
|--------------------------------------------------------------------------*/
Route::get('/pegawai/cari','PegawaiController@cari');

Route::post('/karyawan', 'PegawaiController@store')->name('store');

Route::get('/profile/{datas}', 'PegawaiController@show')->name('profile');

Route::patch('/karyawan/{datas}', 'PegawaiController@update')->name('update');
Route::patch('pegawai/karyawan/{datas}', 'PegawaiController@update')->name('update');

Route::get('karyawan/{datas}', 'PegawaiController@edit')->name('edit');
Route::get('pegawai/karyawan/{datas}', 'PegawaiController@edit')->name('edit');

Route::delete('/karyawan/{datas}/delete', 'PegawaiController@destroy')->name('destroy');
Route::delete('/pegawai/karyawan/{datas}/delete', 'PegawaiController@destroy')->name('destroy');





