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
Route::get('/', 'UserController@Index')->name('home');
Route::post('/logout', 'UserController@postLogout')->name('postLogout');

Route::group(['middleware' => 'visitor'], function() {
    Route::get('/login', 'UserController@login')->name('login');
    Route::post('/login', 'UserController@postLogin')->name('postLogin');

});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin/', function(){
        return redirect()->route('admin.dashboard');
    });

    Route::get('/admin/dashboard', 'admin\UserController@dashboard') ->name('admin.dashboard');
    Route::get('/admin/order/addOffer', 'admin\OrderController@addOffer') ->name('admin.order.addOffer');
    Route::get('/admin/order/uploadOffer/{id}', 'admin\OrderController@uploadOffer') ->name('admin.order.uploadOffer');
    Route::post('/admin/order/store', 'admin\OrderController@store') ->name('admin.order.store');
    Route::get('/admin/order/list/edit/{id}', 'admin\OrderController@edit') ->name('admin.order.edit');
    Route::post('/admin/order/list/{id}', 'admin\OrderController@update') ->name('admin.order.update');
    Route::get('/admin/order/destroy/{id}', 'admin\OrderController@destroy')->name('admin.order.destroy');
    Route::get('/admin/order/addDp', 'admin\OrderController@addOffer') ->name('admin.order.addDp');
    Route::get('/admin/order/uploadDp/{id}', 'admin\OrderController@uploadOffer') ->name('admin.order.uploadDp');
    
   
});

Route::group(['middleware' => 'client'], function() {
    Route::get('/client/', function(){
        return redirect()->route('client.dashboard');
    });

    Route::get('/client/dashboard', 'client\UserController@dashboard') ->name('client.dashboard');
    Route::get('/client/order/uploadOffer/{id}', 'client\OrderController@uploadOffer') ->name('client.order.uploadOffer');
    Route::post('/client/order/store', 'client\OrderController@store') ->name('client.order.store');
    Route::get('/client/order/listDp', 'client\OrderController@listDp') ->name('client.order.listDp');
    
});

Route::group(['middleware' => 'minerba'], function() {
    Route::get('/minerba/', function(){
        return redirect()->route('minerba.dashboard');
    });

    Route::get('/minerba/dashboard', 'minerba\UserController@dashboard') ->name('minerba.dashboard');
    
});

