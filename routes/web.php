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
    Route::get('/admin/order/uploadDp/{id}', 'admin\OrderController@uploadDP') ->name('admin.order.uploadDp');
    Route::get('/admin/order/listOrder', 'admin\OrderController@listOrder') ->name('admin.order.listOrder');
    Route::get('/admin/order/proceed/{id}', 'admin\OrderController@proceed') ->name('admin.order.proceed');
    Route::get('/admin/order/detail/{id}', 'admin\OrderController@detail') ->name('admin.order.detail');
    Route::get('/admin/order/contract/{id}', 'admin\OrderController@contract') ->name('admin.order.contract');
    
    
    Route::get('/admin/meeting/BeritaAcara', 'admin\MeetingController@uploadBA') ->name('admin.meeting.uploadBA');
    Route::get('/admin/meeting/schedule', 'admin\MeetingController@createSchedule') ->name('admin.meeting.schedule');
    Route::post('/admin/meeting/store', 'admin\MeetingController@store') ->name('admin.meeting.store');
    Route::get('/admin/meeting/listMeeting', 'admin\MeetingController@listMeeting') ->name('admin.meeting.listMeeting');
    Route::get('/admin/meeting/createBA/{id}', 'admin\MeetingController@createBA') ->name('admin.meeting.createBA');
    
   
    Route::get('/admin/work/curva_s', 'admin\WorkController@curvaS') ->name('admin.work.curvaS');
});

Route::group(['middleware' => 'client'], function() {
    Route::get('/client/', function(){
        return redirect()->route('client.dashboard');
    });

    Route::get('/client/dashboard', 'client\UserController@dashboard') ->name('client.dashboard');
    Route::get('/client/order/uploadOffer/{id}', 'client\OrderController@uploadOffer') ->name('client.order.uploadOffer');
    Route::post('/client/order/store', 'client\OrderController@store') ->name('client.order.store');
    Route::get('/client/order/listDp', 'client\OrderController@listDp') ->name('client.order.listDp');
    Route::get('/client/order/uploadDp/{id}', 'client\OrderController@uploadDp') ->name('client.order.uploadDp');
    Route::get('/client/order/listOrder', 'client\OrderController@index') ->name('client.order.listOrder');
    Route::post('/client/order/update/{id}', 'client\OrderController@update') ->name('client.order.update');
    
    Route::get('/client/offer/approveOrder', 'client\OrderController@offerLetter') ->name('client.offer.listOrder');
    Route::get('/client/offer/uploadOffer2/{id}', 'client\OrderController@uploadOffer2') ->name('client.offer.uploadOffer2');
    
    Route::get('/client/meeting/listBeritaAcara', 'client\MeetingController@listBA') ->name('client.meeting.listBA');
    Route::get('/client/meeting/listMeeting', 'client\MeetingController@listMeeting') ->name('client.meeting.listMeeting');
    
    Route::post('/client/work/update/{id}', 'client\WorkController@update') ->name('client.work.update');
    Route::get('/client/work/uploadCurvaS/{id}', 'client\WorkController@uploadCurvaS') ->name('client.work.uploadCurvaS');

    Route::get('/client/document/addDocument/{id}', 'client\DocumentController@addDoc') ->name('client.document.addDoc');
    Route::get('/client/document/listOrder', 'client\DocumentController@index') ->name('client.work.listOrder');
    Route::post('/client/document/update/{id}', 'client\DocumentController@update') ->name('client.document.update');
    Route::post('/client/document/store', 'client\DocumentController@store') ->name('client.document.store');
   
   
});

Route::group(['middleware' => 'minerba'], function() {
    Route::get('/minerba/', function(){
        return redirect()->route('minerba.dashboard');
    });

    Route::get('/minerba/dashboard', 'minerba\UserController@dashboard') ->name('minerba.dashboard');
    
});

