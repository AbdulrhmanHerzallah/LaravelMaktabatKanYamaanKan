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

Route::get('/', 'IndexController@index');


Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['prefix' => 'dashboard' , 'middleware' => 'auth'], function (){
    Route::get('/' , ['as' => 'index.index' , 'uses' => 'DashboardController@index']);
    Route::group(['prefix' => 'letter'] , function (){
        Route::get('/create' , ['as' => 'letter.create' , 'uses' => 'LetterController@create']);
        Route::post('/store' , ['as' => 'letter.store' , 'uses' => 'LetterController@store']);
        Route::get('/show' , ['as' => 'letter.show' , 'uses' => 'LetterController@show']);
        Route::get('/show-admin' , ['as' => 'letter.show_admin' , 'uses' => 'LetterController@show_admin'])->middleware('AdminAndBranchManager');
        Route::get('/download-latter/{id}' , ['as' => 'letter.download' , 'uses' => 'LetterController@download']);
    });

    Route::group(['prefix' => 'bill'] , function (){
        Route::get('/create' , ['as' => 'bill.create' , 'uses' => 'BillController@create']);
        Route::post('/store' , ['as' => 'bill.store' , 'uses' => 'BillController@store']);
        Route::post('/print-bill' , ['as' => 'bill.print_bill' , 'uses' => 'BillController@print_bill']);
        Route::get('/my-bill/show' , ['as' => 'bill.showMyBill' , 'uses' => 'BillController@showMyBill']);
        Route::get('/all-bills/show' , ['as' => 'bill.all_bills_admin' , 'uses' => 'BillController@showAllBillByAdmin'])->middleware('AdminAndBranchManager');
        Route::get('/show-bill-stream/{id}' , ['as' => 'bill.showBillStream' , 'uses' => 'BillController@showBillStream']);
    });


    Route::group(['prefix' => 'file' , 'namespace' => 'Files'] , function (){
        Route::get('/upload-files' , ['as' => 'file.create' , 'uses' => 'FilesUploadController@create']);
        Route::post('/store' , ['as' => 'file.store' , 'uses' => 'FilesUploadController@store']);

        Route::group(['prefix' => 'file-categories'] , function (){
            Route::get('/create' , ['as' => 'file_cat.create' , 'uses' => 'FilesCategoriesController@create'])->middleware('AdminAndBranchManager');
            Route::post('/store' , ['as' => 'file_cat.store' , 'uses' => 'FilesCategoriesController@store']);
            Route::post('/update' , ['as' => 'file_cat.update' , 'uses' => 'FilesCategoriesController@update']);
            Route::post('/delete' , ['as' => 'file_cat.delete' , 'uses' => 'FilesCategoriesController@delete']);
        });

        Route::group(['prefix' => 'my-files'] , function (){
            Route::get('/' , ['as' => 'my-files.index' , 'uses' => 'FilesDownloadController@index']);
            Route::get('/get-file-from-categories' , ['as' => 'my-files.index.post' , 'uses' => 'FilesDownloadController@index']);
            Route::post('/' , ['as' => 'my-files.download' , 'uses' => 'FilesDownloadController@myFile']);
            Route::get('/download/{id}' , ['as' => 'my-go-file.download' , 'uses' => 'FilesDownloadController@download']);
            Route::post('/del-file' , ['as' => 'my-go-file.del' , 'uses' => 'FilesDownloadController@delete_file']);
            Route::post('/update-file' , ['as' => 'my-go-file.update' , 'uses' => 'FilesDownloadController@updateFile']);
            Route::post('/search-file-my-cat' , ['as' => 'file.search_file_cat' , 'uses' => 'FilesDownloadController@search_file_cat']);
            Route::post('/search-common-files' , ['as' => 'file.search_common_files_cat' , 'uses' => 'FilesCommonController@search_common_files_cat']);
        });

        Route::group(['prefix' => 'get-common-files'] , function (){
            Route::get('/' , ['as' => 'public.file.index' , 'uses' => 'FilesCommonController@index']);
            Route::get('/get-file-admin' , ['as' => 'admin.file.index' , 'uses' => 'FilesCommonController@getAllFileAdmin'])->middleware('AdminAndBranchManager');
        });
    });

    Route::group(['prefix' => 'demand' , 'namespace' => 'Demand'] , function (){
       Route::get('/emp-create' , ['as' => 'demand.create' , 'uses' => 'DemandController@create']);
       Route::get('/admin-create' , ['as' => 'demand.create_admin' , 'uses' => 'DemandController@create_admin'])->middleware('AdminRejectionMiddleware');
       Route::post('/admin-store' , ['as' => 'demand.store_admin' , 'uses' => 'DemandController@store_admin']);
       Route::post('/store' , ['as' => 'demand.store' , 'uses' => 'DemandController@store']);
       Route::get('/show-all-my-demand' , ['as' => 'demand.show-my-demand' , 'uses' => 'DemandController@showAllMyMessages']);
       Route::get('/show-inbox-demand' , ['as' => 'demand.show-inbox-demand' , 'uses' => 'DemandController@showInboxMessages']);
       Route::get('/show-single-demand/{id_not}/{id_d}' , ['as' => 'demand.show-single-demand' , 'uses' => 'DemandController@showSingleMessages']);
    });

    Route::group(['prefix' => 'event' , 'namespace' => 'Event'] , function (){
        Route::get('/create' , ['as' => 'event.create' , 'uses' => 'EventController@create']);
        Route::post('/store' , ['as' => 'event.store' , 'uses' => 'EventController@store']);
        Route::get('/events-listed/index' , ['as' => 'listed_event.index' , 'uses' => 'EventController@index']);
        Route::get('/show/{id}/{id_noty?}' , ['as' => 'show_event.show' , 'uses' => 'EventController@show']);
        Route::post('/update-state' , ['as' => 'event.update-state' , 'uses' => 'EventController@update_state']);
        Route::get('/calendar' , ['as' => 'event.calendar' , 'uses' => 'EventController@calendar']);
        Route::get('/my-events/download-file/{id}' , ['as' => 'my_events.download_file' , 'uses' => 'EventController@download_file']);
        Route::post('/my-events/commit' , ['as' => 'my_events.commit' , 'uses' => 'EventController@commit']);
        Route::post('/my-events/update' , ['as' => 'my_events.update' , 'uses' => 'EventController@update_commit']);
        Route::post('/my-events/delete' , ['as' => 'my_events.delete' , 'uses' => 'EventController@delete_commit']);
    });


    Route::group(['prefix' => 'users' , 'namespace' => 'User'] , function (){
        Route::get('/create-user' , ['as' => 'user.create' , 'uses' => 'UserController@create']);
        Route::get('/my-info' , ['as' => 'user.info' , 'uses' => 'UserController@index']);
        Route::post('/store-user' , ['as' => 'user.store' , 'uses' => 'UserController@store']);
        Route::post('/store-conform-data' , ['as' => 'user.store_data_conform' , 'uses' => 'UserController@store_data_conform']);
        Route::get('/store-conform-data/{id}' , ['as' => 'user.index' , 'uses' => 'UserController@index_conform_data']);
        Route::get('/users' , ['as' => 'user.get_users_info' , 'uses' => 'UserController@get_users_info']);
        Route::get('/user/eddi-account-settings' , ['as' => 'user.edit_account_sett' , 'uses' => 'UserController@index_edit_user']);
        Route::post('/user/update-account-settings' , ['as' => 'user.update_user_account' , 'uses' => 'UserController@update_user_account']);
        Route::post('/update-users' , ['as' => 'user.update_users' , 'uses' => 'UserController@update_users']);
        Route::post('/soft-del-user' , ['as' => 'user.soft_del' , 'uses' => 'UserController@softDel']);
        Route::get('/restore-users' , ['as' => 'user.get.users_del' , 'uses' => 'UserController@getUsersDel']);
        Route::post('/restore-user' , ['as' => 'user.restore.user' , 'uses' => 'UserController@getRestore']);
    });
});
