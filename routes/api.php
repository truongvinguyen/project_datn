<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Models\category;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Models\notification;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\articleController;
use App\Http\Controllers\Api\SearchController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  External API version 1
Route::prefix('v1/e')->group(function () {

    //  Category
    Route::controller(CategoryController::class)->prefix('categories')->middleware('api')->name('api.categories.')->group(function () {
        Route::get('home/{orderBy?}/{sort?}', 'getAllRecords')->name('index');
        Route::get('p/{offset?}/{limit?}/{orderBy?}/{sort?}', 'getPageOfRecords')->name('paginate');
        Route::post('s/{offset?}/{limit?}/{col?}', 'getSearchedRecords')->name('search');
        Route::get('detail/{id}', 'getOneRecord')->name('detail');
        Route::post('count/s/{col?}', 'countSearchedRecords')->name('count.search');
        Route::get('parents/', 'getAllParentRecords')->name('parents');
        Route::get('childrens/{id}', 'getChildrenRecords')->name('childrens');
    });
});

//  Internal API version 1
Route::prefix('v1/i')->group(function () {

    //  Category
    Route::controller(CategoryController::class)->prefix('categories')->middleware('api')->name('api.categories.')->group(function () {
        Route::post('store', 'storeRecord')->name('store');
        Route::put('update/{id}', 'updateRecord')->name('update');
        Route::post('upload/image/{id}', 'uploadImage')->name('upload.image');
        Route::put('delete/{id}', 'deleteRecord')->name('delete');
        Route::put('restore/{id}', 'restoreRecord')->name('restore');
        Route::delete('destroy/{id}', 'destroyRecord')->name('destroy');
        Route::put('activate/{id}', 'activateRecord')->name('activate');
        Route::put('disable/{id}', 'disableRecord')->name('disable');
    });
});


Route::get('notification', function () {
    return $notification = DB::table('notification')
        ->select('*')
        ->orderby('id', 'desc')
        ->orderby('notification_status', 'desc')
        ->get();
});

Route::controller(ProductController::class)->prefix('products')->name('products')->group(function () {
    Route::get('/grid/{orderBy?}/{sort?}/{offset?}/{limit?}', 'orderByGrid')->name('');
    Route::get('/gridProduct/{columns_name?}/{cate_id?}', 'gridByColumns')->name('');
});


Route::controller(SearchController::class)->prefix('search')->name('search')->group(function () {

    Route::post('/{value?}', 'search')->name('');
});


Route::controller(articleController::class)->prefix('articles')->name('articles')->group(function () {
    Route::get('/{orderBy?}/{sort?}/{offset?}/{limit?}', 'articles')->name('');
});
