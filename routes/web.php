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

Route::group(['middleware' => 'superAdmin'], function() {
    Route::get('/superAdmin/', function(){
        return redirect()->route('superAdmin.dashboard');
    });
    Route::get('/superadmin/dashboard', 'superAdmin\UserController@Dashboard') ->name('superAdmin.dashboard');

    Route::resource('superadmin/admin', 'superAdmin\AdminController', ['names' => [
        'index'   => 'superAdmin.admin.list',
        'show'    => 'superAdmin.admin.show',
        'create'  => 'superAdmin.admin.create',
        'store'   => 'superAdmin.admin.store',
        'edit'    => 'superAdmin.admin.edit',
        'update'  => 'superAdmin.admin.update',
        'destroy' => 'superAdmin.admin.destroy'
    ]]);

    Route::resource('superadmin/client', 'superAdmin\ClientController', ['names' => [
        'index'   => 'superAdmin.client.list',
        'show'    => 'superAdmin.client.show',
        'create'  => 'superAdmin.client.create',
        'store'   => 'superAdmin.client.store',
        'edit'    => 'superAdmin.client.edit',
        'update'  => 'superAdmin.client.update',
        'destroy' => 'superAdmin.client.destroy'
    ]]);

    Route::resource('superadmin/minerba', 'superAdmin\MinerbaController', ['names' => [
        'index'   => 'superAdmin.minerba.list',
        'show'    => 'superAdmin.minerba.show',
        'create'  => 'superAdmin.minerba.create',
        'store'   => 'superAdmin.minerba.store',
        'edit'    => 'superAdmin.minerba.edit',
        'update'  => 'superAdmin.minerba.update',
        'destroy' => 'superAdmin.minerba.destroy'
    ]]);

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
    Route::get('/admin/order/addContract', 'admin\OrderController@addContract') ->name('admin.order.addContract');
    Route::get('/admin/order/listContract', 'admin\OrderController@listContract') ->name('admin.order.listContract');
    
    Route::get('/admin/meeting/BeritaAcara', 'admin\MeetingController@uploadBA') ->name('admin.meeting.uploadBA');
    Route::get('/admin/meeting/schedule', 'admin\MeetingController@createSchedule') ->name('admin.meeting.schedule');
    Route::post('/admin/meeting/store', 'admin\MeetingController@store') ->name('admin.meeting.store');
    Route::get('/admin/meeting/listMeeting', 'admin\MeetingController@listMeeting') ->name('admin.meeting.listMeeting');
    Route::get('/admin/meeting/createBA/{id}', 'admin\MeetingController@createBA') ->name('admin.meeting.createBA');
   
    Route::get('/admin/work/curva_s', 'admin\WorkController@curvaS') ->name('admin.work.curvaS');

    Route::get('/admin/document/listDoc', 'admin\DocumentController@index_doc') ->name('admin.document.listDoc');
    Route::get('/admin/document/detail/{id}', 'admin\DocumentController@detail') ->name('admin.document.detail');

    Route::get('/admin/report/addReport', 'admin\ReportController@addReport') ->name('admin.report.addReport');
    Route::get('/admin/report/listReport', 'admin\ReportController@index') ->name('admin.report.listReport');
    Route::get('/admin/report/createReport/{id}', 'admin\ReportController@create') ->name('admin.report.create');
    Route::post('/admin/report/store', 'admin\ReportController@store') ->name('admin.report.store');
    Route::get('/admin/report/addReceipt', 'admin\ReportController@addReceipt') ->name('admin.report.addReceipt');
    Route::get('/admin/report/receipt/{id}', 'admin\ReportController@receipt') ->name('admin.report.receipt');
    Route::post('/admin/report/receiptUpdate{id}', 'admin\ReportController@update') ->name('admin.report.update');
    Route::get('/admin/report/listReceipt', 'admin\ReportController@listReceipt') ->name('admin.report.listReceipt');

    Route::get('/admin/report/addletter', 'admin\ReportController@addletter') ->name('admin.report.addLetter');
    Route::get('/admin/report/letter/{id}', 'admin\ReportController@letter') ->name('admin.report.letter');
    Route::get('/admin/report/listLetter', 'admin\ReportController@listLetter') ->name('admin.report.listLetter');
    
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
    Route::get('/client/order/detail/{id}', 'admin\OrderController@detail') ->name('client.order.detail');
    
    Route::get('/client/offer/approveOrder', 'client\OrderController@offerLetter') ->name('client.offer.listOrder');
    Route::get('/client/offer/uploadOffer2/{id}', 'client\OrderController@uploadOffer2') ->name('client.offer.uploadOffer2');
    
    Route::get('/client/meeting/listBeritaAcara', 'client\MeetingController@listBA') ->name('client.meeting.listBA');
    Route::get('/client/meeting/listMeeting', 'client\MeetingController@listMeeting') ->name('client.meeting.listMeeting');
    
    Route::get('/client/work/addCurva', 'client\WorkController@index') ->name('client.work.addCurva');
    Route::post('/client/work/update/{id}', 'client\WorkController@update') ->name('client.work.update');
    Route::get('/client/work/uploadCurvaS/{id}', 'client\WorkController@uploadCurvaS') ->name('client.work.uploadCurvaS');
    Route::post('/client/work/store', 'client\WorkController@store') ->name('client.work.store');
    Route::get('/client/work/listCurvaS', 'client\WorkController@index_curva') ->name('client.work.listCurvaS');
    Route::get('/client/work/editCurvaS/{id}', 'client\WorkController@edit') ->name('client.work.editCurvaS');
   
    Route::get('/client/document/addDocument/{id}', 'client\DocumentController@addDoc') ->name('client.document.addDoc');
    Route::get('/client/document/listOrder', 'client\DocumentController@index') ->name('client.document.listOrder');
    Route::post('/client/document/update/{id}', 'client\DocumentController@update') ->name('client.document.update');
    Route::post('/client/document/store', 'client\DocumentController@store') ->name('client.document.store');
    Route::get('/client/document/listDoc', 'client\DocumentController@index_doc') ->name('client.document.listDoc');
    Route::get('/client/document/detail/{id}', 'client\DocumentController@detail') ->name('client.document.detail');
    Route::get('/client/document/edit/{id}', 'client\DocumentController@editDoc') ->name('client.document.editDoc');
    Route::get('/client/document/destroy/{id}', 'client\DocumentController@destroy')->name('client.document.destroy');
    Route::get('/client/document/addDocument', 'client\DocumentController@doc') ->name('client.document.doc');

    Route::get('/client/report/listLetter', 'client\ReportController@listLetter') ->name('client.report.listLetter');
    Route::get('/client/report/listReceipt', 'client\ReportController@listReceipt') ->name('client.report.listReceipt');
    Route::get('/client/report/listReport', 'client\ReportController@index') ->name('client.report.listReport');
    
   
});

Route::group(['middleware' => 'minerba'], function() {
    Route::get('/minerba/', function(){
        return redirect()->route('minerba.dashboard');
    });

    Route::get('/minerba/dashboard', 'minerba\UserController@dashboard') ->name('minerba.dashboard');
    Route::get('/minerba/report/listReport', 'minerba\ReportController@listReport') ->name('minerba.report.listReport');
    Route::get('/minerba/meeting/listMeeting', 'minerba\MeetingController@listMeeting') ->name('minerba.meeting.listMeeting');
    Route::get('/minerba/order/listSPK', 'minerba\OrderController@listSpk') ->name('minerba.order.listSpk');
    
    
});

