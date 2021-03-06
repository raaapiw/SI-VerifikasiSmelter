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
    Route::get('/new-login', 'UserController@newlogin')->name('newlogin');
    Route::post('/login', 'UserController@postLogin')->name('postLogin');

});

Route::group(['middleware' => 'superAdmin'], function() {
    Route::get('/superAdmin/', function(){
        return redirect()->route('superAdmin.dashboard');
    });
    Route::get('/superadmin/dashboard', 'superAdmin\UserController@Dashboard') ->name('superAdmin.dashboard');
    // Route::get('/superadmin/client/addClient', 'superAdmin\ClientController@addClient') ->name('superAdmin.client.addClient');
    // Route::get('/superadmin/client/storeClient', 'superAdmin\ClientController@storeClient') ->name('superAdmin.client.storeClient');

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

    Route::resource('superadmin/management', 'superAdmin\ManagementController', ['names' => [
        'index'   => 'superAdmin.management.list',
        'show'    => 'superAdmin.management.show',
        'create'  => 'superAdmin.management.create',
        'store'   => 'superAdmin.management.store',
        'edit'    => 'superAdmin.management.edit',
        'update'  => 'superAdmin.management.update',
        'destroy' => 'superAdmin.management.destroy'
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
    Route::get('/admin/order/uploadTP/{id}', 'admin\OrderController@uploadDP') ->name('admin.order.uploadDp');
    Route::get('/admin/order/listOrder', 'admin\OrderController@listOrder') ->name('admin.order.listOrder');
    Route::get('/admin/order/proceed/{id}', 'admin\OrderController@proceed') ->name('admin.order.proceed');
    Route::get('/admin/order/detail/{id}', 'admin\OrderController@detail') ->name('admin.order.detail');
    Route::get('/admin/order/contract/{id}', 'admin\OrderController@contract') ->name('admin.order.contract');
    Route::get('/admin/order/addContract', 'admin\OrderController@addContract') ->name('admin.order.addContract');
    Route::get('/admin/order/listContract', 'admin\OrderController@listContract') ->name('admin.order.listContract');
    Route::get('/admin/order/addYear/{id}', 'admin\OrderController@year') ->name('admin.order.year');
    Route::get('/admin/order/uploadSpk/{id}', 'admin\OrderController@uploadSpk') ->name('admin.order.spk');
    
    Route::get('/admin/meeting/BeritaAcara', 'admin\MeetingController@uploadBA') ->name('admin.meeting.uploadBA');
    Route::get('/admin/meeting/schedule', 'admin\MeetingController@createSchedule') ->name('admin.meeting.schedule');
    Route::get('/admin/meeting/scheduleEdit/{id}', 'admin\MeetingController@editSchedule') ->name('admin.meeting.editSchedule');
    Route::post('/admin/meeting/store', 'admin\MeetingController@store') ->name('admin.meeting.store');
    Route::get('/admin/meeting/listMeeting', 'admin\MeetingController@listMeeting') ->name('admin.meeting.listMeeting');
    Route::get('/admin/meeting/createBA/{id}', 'admin\MeetingController@createBA') ->name('admin.meeting.createBA');
    Route::post('/admin/meeting/updateData/{id}', 'admin\MeetingController@update') ->name('admin.meeting.update');
   
    Route::get('/admin/work/curva_s', 'admin\WorkController@curvaS') ->name('admin.work.curvaS');
    Route::get('/admin/work/approve', 'admin\WorkController@approve') ->name('admin.work.approve');
    Route::get('/admin/work/approval/{id}', 'admin\WorkController@approval') ->name('admin.work.approval');
    Route::get('/admin/work/detail/{id}', 'admin\DocperController@detail') ->name('admin.work.detailDocper');
    Route::post('/admin/work/update/{id}', 'admin\WorkController@update') ->name('admin.work.update');
    
    Route::get('/admin/document/listDoc', 'admin\DocumentController@index_doc') ->name('admin.document.listDoc');
    Route::get('/admin/document/detail/{id}', 'admin\DocumentController@detail') ->name('admin.document.detail');
    
    
    Route::get('/admin/other/addPics', 'admin\OtherController@addPics') ->name('admin.other.addPics');
    Route::get('/admin/other/formPics/{id}', 'admin\OtherController@formPics') ->name('admin.other.formPics');
    Route::post('/admin/other/store', 'admin\OtherController@store') ->name('admin.other.store');
    Route::get('/admin/other/listPics', 'admin\OtherController@listPics') ->name('admin.other.listPics');
    Route::get('/admin/other/detailPics/{id}', 'admin\OtherController@detailPics') ->name('admin.other.detailPics');
    Route::get('/admin/other/destroyPics/{id}', 'admin\OtherController@destroyPics') ->name('admin.other.destroyPics');
    Route::post('/admin/other/UpdatePics/{id}', 'admin\OtherController@updatePics') ->name('admin.other.updatePics');
    Route::get('/admin/other/editPics/{id}', 'admin\OtherController@editPics') ->name('admin.other.editPics');
    Route::get('/admin/other/addLetter', 'admin\OtherController@addLetter') ->name('admin.other.addLetter');
    Route::get('/admin/other/formLetter/{id}', 'admin\OtherController@formLetter') ->name('admin.other.formLetter');
    Route::post('/admin/other/UpdateLetter/{id}', 'admin\OtherController@updateDir') ->name('admin.other.updateDir');
    Route::get('/admin/other/destroy/{id}', 'admin\OtherController@destroyDir') ->name('admin.other.destroyDir');
    


    Route::get('/admin/report/addReport', 'admin\ReportController@addReport') ->name('admin.report.addReport');
    Route::get('/admin/report/listReport', 'admin\ReportController@index') ->name('admin.report.listReport');
    Route::get('/admin/report/createReport/{id}', 'admin\ReportController@create') ->name('admin.report.create');
    Route::get('/admin/report/editReport/{id}', 'admin\ReportController@edit') ->name('admin.report.edit');
    Route::post('/admin/report/store', 'admin\ReportController@store') ->name('admin.report.store');
    Route::get('/admin/report/addReceipt', 'admin\ReportController@addReceipt') ->name('admin.report.addReceipt');
    Route::get('/admin/report/receipt/{id}', 'admin\ReportController@receipt') ->name('admin.report.receipt');
    Route::post('/admin/report/receiptUpdate{id}', 'admin\ReportController@update') ->name('admin.report.update');
    Route::get('/admin/report/listReceipt', 'admin\ReportController@listReceipt') ->name('admin.report.listReceipt');
    Route::post('/admin/report/UpdateReport/{id}', 'admin\ReportController@update_report') ->name('admin.report.update_state');
    Route::get('/admin/report/approve', 'admin\ReportController@approve') ->name('admin.report.approve');
    Route::get('/admin/report/approval/{id}', 'admin\ReportController@approval') ->name('admin.report.approval');
    Route::get('/admin/report/destroy/{id}', 'admin\ReportController@destroy') ->name('admin.report.destroy');
    Route::get('/admin/report/jenis/{id}', 'admin\ReportController@jenis') ->name('admin.report.jenis');
    Route::post('/admin/report/UpdateJenis/{id}', 'admin\ReportController@update_jenis') ->name('admin.report.update_jenis');
    
    Route::get('/admin/draft/listDraft', 'admin\DraftController@listDraft') ->name('admin.draft.listDraft');
    Route::get('/admin/draft/form/{id}', 'admin\DraftController@form') ->name('admin.report.formDraft');
    Route::get('/admin/draft/detail/{id}', 'admin\DraftController@detail') ->name('admin.report.detailDraft');
    Route::post('/admin/draft/store', 'admin\DraftController@storeDraft') ->name('admin.report.storeDraft');
    Route::post('/admin/draft/Update/{id}', 'admin\DraftController@updateDraft') ->name('admin.report.updateDraft');
    Route::get('/admin/draft/formEdit/{id}', 'admin\DraftController@edit') ->name('admin.report.editDraft');
    
    Route::get('/admin/report/addletter', 'admin\ReportController@addletter') ->name('admin.report.addLetter');
    Route::get('/admin/report/letter/{id}', 'admin\ReportController@letter') ->name('admin.report.letter');
    Route::get('/admin/report/listLetter', 'admin\ReportController@listLetter') ->name('admin.report.listLetter');
    
    Route::get('/admin/docper/detail/{id}', 'admin\DocperController@detail') ->name('admin.work.detail');
    Route::get('/admin/docper/listDocper', 'admin\DocperController@list') ->name('admin.work.listDocper');

    Route::get('/admin/docper/addName', 'admin\UploadController@index') ->name('admin.upload.addName');
    Route::get('/admin/docper/formName/{id}', 'admin\UploadController@create') ->name('admin.upload.formName');
    Route::post('/admin/docper/storeName', 'admin\UploadController@store') ->name('admin.upload.store');
    Route::post('/admin/docper/updateName/{id}', 'admin\UploadController@update') ->name('admin.upload.update');
    Route::get('/admin/docper/addName1', 'admin\DocperController@index') ->name('admin.docper.addName1');
    Route::get('/admin/docper/formName1/{id}', 'admin\DocperController@create') ->name('admin.docper.formName1');
    Route::get('/admin/docper/editformName1/{id}', 'admin\DocperController@edit') ->name('admin.docper.editformName1');
    Route::post('/admin/docper/storeName1', 'admin\DocperController@store') ->name('admin.docper.store1');
    Route::post('/admin/docper/updateName1/{id}', 'admin\DocperController@update') ->name('admin.docper.update1');
    Route::get('/admin/docper/destroy/{id}', 'admin\DocperController@destroy')->name('admin.docper.destroy');
    
    Route::get('/admin/document/formName1/{id}', 'admin\DocumentController@create') ->name('admin.document.formName1');
    Route::get('/admin/document/editformName1/{id}', 'admin\DocumentController@edit') ->name('admin.document.editformName1');
    Route::post('/admin/document/storeName1', 'admin\DocumentController@store') ->name('admin.document.store1');
    Route::post('/admin/document/updateName1/{id}', 'admin\DocumentController@update') ->name('admin.document.update1');
    Route::get('/admin/document/destroy/{id}', 'admin\DocumentController@destroy')->name('admin.document.destroy');
    
    Route::get('/admin/announcement/list', 'admin\AnnouncementController@list') ->name('admin.announcement.list');
    Route::post('/admin/announcement/update/{id}', 'admin\AnnouncementController@update') ->name('admin.announcement.update');
    Route::post('/admin/announcement/store', 'admin\AnnouncementController@store') ->name('admin.announcement.store');
    Route::get('/admin/announcement/create', 'admin\AnnouncementController@create') ->name('admin.announcement.create');
    Route::get('/admin/announcement/destroy/{id}', 'admin\AnnouncementController@destroy') ->name('admin.announcement.destroy');
    Route::get('/admin/announcement/edit/{id}', 'admin\AnnouncementController@edit') ->name('admin.announcement.edit');
    Route::post('/admin/announcement/active/{id}', 'admin\AnnouncementController@active') ->name('admin.announcement.active');
    Route::post('/admin/announcement/not_active/{id}', 'admin\AnnouncementController@not_active') ->name('admin.announcement.not_active');
    

    
    
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
    Route::get('/client/order/detail/{id}', 'client\OrderController@detail') ->name('client.order.detail');
    Route::get('/client/order/listSPK', 'client\OrderController@listSPK') ->name('client.order.listSPK');
    Route::get('/client/order/uploadSPK/{id}', 'client\OrderController@uploadSPK') ->name('client.order.uploadSPK');
   
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

    Route::get('/client/docper/addDocument/{id}', 'client\DocperController@addDoc') ->name('client.docper.addDoc');
    Route::get('/client/docper/listOrder', 'client\DocperController@index') ->name('client.docper.listOrder');
    Route::post('/client/docper/update/{id}', 'client\DocperController@update') ->name('client.docper.update');
    Route::post('/client/docper/store', 'client\DocperController@store') ->name('client.docper.store');
    Route::get('/client/docper/listDoc', 'client\DocperController@index_doc') ->name('client.docper.listDoc');
    Route::get('/client/docper/detail/{id}', 'client\DocperController@detail') ->name('client.docper.detail');
    Route::get('/client/docper/edit/{id}', 'client\DocperController@editDoc') ->name('client.docper.editDoc');
    Route::get('/client/docper/destroy/{id}', 'client\DocperController@destroy')->name('client.docper.destroy');
    Route::get('/client/docper/addDocument', 'client\DocperController@index') ->name('client.docper.doc');

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

Route::group(['middleware' => 'marketing'], function() {
    Route::get('/marketing/', function(){
        return redirect()->route('marketing.dashboard');
    });

    Route::get('/marketing/dashboard', 'marketing\UserController@dashboard') ->name('marketing.dashboard');
    Route::get('/marketing/order/addOffer', 'marketing\OrderController@addOffer') ->name('marketing.order.addOffer');
    Route::get('/marketing/order/uploadOffer/{id}', 'marketing\OrderController@uploadOffer') ->name('marketing.order.uploadOffer');
    Route::post('/marketing/order/store', 'marketing\OrderController@store') ->name('marketing.order.store');
    Route::get('/marketing/order/list/edit/{id}', 'marketing\OrderController@edit') ->name('marketing.order.edit');
    Route::post('/marketing/order/list/{id}', 'marketing\OrderController@update') ->name('marketing.order.update');
    Route::get('/marketing/order/destroy/{id}', 'marketing\OrderController@destroy')->name('marketing.order.destroy');
    Route::get('/marketing/order/addDp', 'marketing\OrderController@addOffer') ->name('marketing.order.addDp');
    Route::get('/marketing/order/uploadDp/{id}', 'marketing\OrderController@uploadDP') ->name('marketing.order.uploadDp');
    Route::get('/marketing/order/listOrder', 'marketing\OrderController@listOrder') ->name('marketing.order.listOrder');
    Route::get('/marketing/order/proceed/{id}', 'marketing\OrderController@proceed') ->name('marketing.order.proceed');
    Route::get('/marketing/order/detail/{id}', 'marketing\OrderController@detail') ->name('marketing.order.detail');
    Route::get('/marketing/order/contract/{id}', 'marketing\OrderController@contract') ->name('marketing.order.contract');
    Route::get('/marketing/order/addContract', 'marketing\OrderController@addContract') ->name('marketing.order.addContract');
    Route::get('/marketing/order/listContract', 'marketing\OrderController@listContract') ->name('marketing.order.listContract');
    
    
});

Route::group(['middleware' => 'management'], function() {
    Route::get('/management/', function(){
        return redirect()->route('management.dashboard');
    });

    Route::get('/management/dashboard', 'management\UserController@dashboard') ->name('management.dashboard');
    Route::get('/management/report/list', 'management\ReportController@list') ->name('management.report.list');
    Route::get('/management/work/list', 'management\WorkController@list') ->name('management.work.list');
    Route::get('/management/order/list', 'management\OrderController@list') ->name('management.order.list');
    Route::get('/management/meeting/list', 'management\MeetingController@list') ->name('management.meeting.list');
    
    
});


