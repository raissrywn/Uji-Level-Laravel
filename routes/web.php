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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('adminhome');
// });
Route::get('/',function(){
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'DashboardController@index')->name('home');

Route::group(['middleware' => ['auth', 'CheckLevel:admin,waiter,kasir,owner']], function () {
    Route::get('/home', 'DashboardController@index')->name('home');
    Route::resource('makanans', 'MakananController');
});

Route::group(['middleware' => ['auth', 'CheckLevel:kasir']], function () {
    Route::resource('order', 'KasirController');
    Route::get('/invoice', 'KasirController@invoice')->name('invoice');
    Route::get('/invoice/pdf', 'KasirController@pdf')->name('invoicepdf');

});
