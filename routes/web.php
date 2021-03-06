<?php

use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'welcome');

// Auth::loginUsingId(2);

// Autentikasi
Auth::routes([
    'verify' => true
]);

// Route
Route::get('/home', 'HomeController@index')->middleware('verified')->name('user.home');
Route::post('user/cari', 'HomeController@cari')->name('user.cari');

Route::get('user/pinjaman', 'PeminjamanController@historyPinjaman')->name('user.historyPinjaman');
Route::get('book/show/{book}', 'PeminjamanController@show');
Route::post('user/pinjam/{book}', 'PeminjamanController@pinjam')->name('user.pinjam');
Route::post('user/kembalikan/{book}', 'PeminjamanController@kembalikan')->name('user.kembalikan');

Route::get('penulis', 'PenulisController@index')->name('user.penulis');
