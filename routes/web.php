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
    return view('customer.dashboard');
});
Route::get('/home', 'HomeController@index');

Route::post('/customer/order/store', 'OrderController@customerStore')->name('order.store.customer');

// Login 
Route::get('/manager/login', 'AuthController@login')->name('login');
Route::get('/manager/regristasi', 'AuthController@registrasi')->name('regristasi');
Route::post('/manager/postregistrasi', 'AuthController@postregistrasi');
Route::post('/manager/postlogin', 'AuthController@postlogin');
Route::get('/manager/logout', 'AuthController@logout');


Route::group(['middleware'=>'auth'],function(){

    // Dashboard
    Route::get('/manager', 'DashboardMGController@index')->name('livestock.index');
    // Livestock
    Route::get('/manager/livestock', 'LivestockController@index')->name('livestock.index');
    Route::get('/manager/livestock/add', 'LivestockController@create')->name('livestock.add');
    Route::post('/manager/livestock/store', 'LivestockController@store')->name('livestock.store');
    // Update
    Route::get('/manager/livestock/edit/{id}', 'LivestockController@edit')->name('livestock.edit');
    Route::post('/manager/livestock/update/{id}', 'LivestockController@update')->name('livestock.update');
    // Deleted
    Route::post('/manager/livestock/delete/{id}', 'LivestockController@destroy')->name('livestock.deleted');
    // Status
    Route::post('/manager/livestock/mati/{id}', 'LivestockController@mati')->name('livestock.mati');
    Route::post('/manager/livestock/sudahBeli/{id}', 'LivestockController@sudahBeli')->name('livestock.sudah_beli');
    Route::post('/manager/livestock/belumBeli/{id}', 'LivestockController@belumBeli')->name('livestock.belum_beli');
    // Detail
    Route::get('/manager/livestock/detail/{id}', 'LivestockController@show')->name('livestock.detail');
    // Search
    Route::get('/manager/livestock/search', 'LivestockController@search')->name('livestock.search');

    // Cow
    Route::get('/manager/livestock/cow/stock', 'CowController@index')->name('livestock.cow.stock');
    // Route::get('/manager/livestock/dead', 'LivestockController@index')->name('livestock.cow.purchased');
    // Route::get('/manager/livestock/purchased', 'LivestockController@index')->name('livestock.cow.purchased');

    // Goat
    Route::get('/manager/livestock/goat/stock', 'GoatController@index')->name('livestock.goat.stock');
    // Route::get('/manager/livestock/dead', 'LivestockController@index')->name('livestock.cow.purchased');
    // Route::get('/manager/livestock/purchased', 'LivestockController@index')->name('livestock.cow.purchased');

    // Sheep
    Route::get('/manager/livestock/sheep/stock', 'SheepController@index')->name('livestock.sheep.stock');
    // Route::get('/manager/livestock/dead', 'LivestockController@index')->name('livestock.cow.purchased');
    // Route::get('/manager/livestock/purchased', 'LivestockController@index')->name('livestock.cow.purchased');


    // Order
    Route::get('/manager/order', 'OrderController@index')->name('order.index');
    Route::get('/manager/order/add', 'OrderController@create')->name('order.add');
    Route::post('/manager/order/store', 'OrderController@store')->name('order.store');

    // Update
    Route::get('/manager/order/edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('/manager/order/update/{id}', 'OrderController@update')->name('order.update');
    // Deleted
    Route::post('/manager/order/delete/{id}', 'OrderController@destroy')->name('order.deleted');
    // Search
    Route::get('/manager/order/search', 'OrderController@search')->name('order.search');
    // Detail
    Route::get('/manager/order/detail/{id}', 'OrderController@show')->name('order.detail');
    // Status
    Route::post('/manager/order/sukses/{id}', 'OrderController@sukses')->name('order.sukses');
    Route::post('/manager/order/kirim/{id}', 'OrderController@kirim')->name('order.kirim');
    Route::post('/manager/order/batal/{id}', 'OrderController@batal')->name('order.batal');
    // Pilih Hewan
    Route::post('/manager/order/{id}/{id_livestock}', 'OrderController@pilihHewan')->name('order.pilih_hewan');
    Route::post('/manager/order/hapus/{id}/{id_livestock}', 'OrderController@hapusHewan')->name('order.hapus_hewan');

});


