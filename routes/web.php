<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/*

*/


/*
    Menu
*/

Route::get('/', function () {
    // return view('welcome');
    return view('w0.w0');
});


/*
Week 0
*/
Route::get('/w0', function () {
    return view('w0.w0');
});



Route::get('/w0/p0', function () {
    return view('w0.p0');
});


Route::get('/w0/p1', function () {
    return view('w0.p1');
});


Route::get('/w0/p2', function () {
    return view('w0.p2');
});


Route::get('/w0/p3', function () {
    return view('w0.p3');
});


Route::get('/w0/p4', function () {
    return view('w0.p4');
});


Route::get('/w0/p5', function () {
    return view('w0.p5');
});


Route::get('/w0/p6', function () {
    return view('w0.p6');
});


Route::get('/w0/p7', function () {
    return view('w0.p7');
});


Route::get('/w0/p8', function () {
    return view('w0.p8');
});


Route::get('/w0/p9', function () {
    return view('w0.p9');
});

/*
Week 1
*/

Route::get('/mahasiswa', 'App\Http\Controllers\MahasiswaController@index');
Route::get('/mahasiswa_create', 'App\Http\Controllers\MahasiswaController@create')->name('mahasiswa_create');
Route::post('/mahasiswa_store', 'App\Http\Controllers\MahasiswaController@store')->name('mahasiswa_store');

/*
Week 2
*/

Route::get('/buku', 'App\Http\Controllers\BukuController@index')->name('buku');

/*
Week 3
*/
Route::get('/buku/create', 'App\Http\Controllers\BukuController@create')->name('buku.create');
Route::post('/buku/store', 'App\Http\Controllers\BukuController@store')->name('buku.store');
Route::get('/buku/delete/{id}', 'App\Http\Controllers\BukuController@destroy')->name('buku.destroy');
Route::get('/buku/edit/{id}', 'App\Http\Controllers\BukuController@edit')->name('buku.edit');
Route::put('/buku/update', 'App\Http\Controllers\BukuController@update')->name('buku.update');

/*
Week 4
*/
Route::get('/buku/search', 'App\Http\Controllers\BukuController@search')->name('buku.search');
// Auth::routes();
Auth::routes([
    // 'register' => false,
    'reset' => false,
    ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
week 7
*/
Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user');
Route::get('/user/create', 'App\Http\Controllers\UserController@create')->name('user.create');
Route::post('/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::get('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::put('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::get('/user/search', 'App\Http\Controllers\UserController@search')->name('user.search');
