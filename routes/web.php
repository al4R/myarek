<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeriController;
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
Route::resource('/user', 'UserController');
Route::resource('/mobil', 'MobilController');
// Route::resource('/seri', 'SeriController');
Route::resource('/transaksi', 'TransaksiController');
Route::resource('/riwayat', 'RiwayatController');
Route::resource('/cancel', 'CancelController');
Route::resource('/pembayaran', 'BayarController');
Route::resource('/expired', 'ExpiredController');
Route::resource('/metode','MetodeBayarController');

Route::get('/mobilupdate/{id}','MobilController@show');
Route::put('/mobilupdate/{id}','MobilController@update');
Route::get('/mobildelete/{id}','MobilController@destroy');

Route::get('/userupdate/{id}','UserController@show');
Route::put('/userupdate/{id}','UserController@update');
Route::get('/userdelete/{id}','UserController@destroy');
Route::put('/useracc/{id}','UserController@edit');
Route::get('/useracc/{id}','UserController@showacc');

Route::get('/trancancel/{id}', 'TransaksiController@cancel');
Route::get('/selesai/{id}', 'TransaksiController@selesai');
Route::get('/acctransaksi/{id}','TransaksiController@show');
Route::get('/detailtransaksi/{id}','TransaksiController@detail');

Route::get('/gagal/{id}','BayarController@gagal');
Route::put('/acc/{id}','BayarController@acc');

Route::get('/expselesai/{id}', 'ExpiredController@selesai');

Route::get('/metodeshow/{id}','MetodeBayarController@show');
Route::put('/metodeupdate/{id}','MetodeBayarController@update');
Route::get('/metodedelete/{id}','MetodeBayarController@destroy');




// Route::get('/seri','SeriController@index');
// Route::get('/sericreate','SeriController@create');
// Route::get('/seriupdate/{id}','SeriController@update');
// Route::get('/seridelete/{id}','SeriController@destroy');

