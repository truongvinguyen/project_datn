<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;
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

// Delete?
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product', function () {
    return $product = product::paginate(3);
});
Route::get('product/{id}', function ($id) {
    return $product = product::find($id);
});
Route::post('product', function (Request $request) {
    return $product = product::create($request->all());
});
Route::put('product/{id}', function (Request $request, $id) {
    $product = product::findOrFail($id);
    $product->update($request->all());
    return $product;
});
//

Route::get('notification', function () {
    return $notification = DB::table('notification')
        ->select('*')
        ->orderby('id', 'desc')
        ->orderby('notification_status', 'desc')
        ->get();
});

Route::controller(ProductController::class)->prefix('products')->group(function () {

    Route::get('/list/{orderBy?}/{sort?}/{offset?}/{limit?}', 'orderByList')->name('');
    Route::get('/grid/{orderBy?}/{sort?}/{offset?}/{limit?}', 'orderByGrid')->name('');
    Route::get('/gridProduct/{columns_name?}/{cate_id?}', 'gridByColumns')->name('');
    Route::get('/listProduct/{columns_name?}/{cate_id?}', 'listByColumns')->name('');
    // Route::get('/filter/{brand_id?}','productByCategory')->name('');      

    Route::get('price/grid/{orderBy?}/{sort?}', 'gridPrice')->name('');
    Route::get('discount/grid/{orderBy?}/{sort?}', 'gridDiscount')->name('');

    Route::get('price/list/{orderBy?}/{sort?}', 'listPrice')->name('');
    Route::get('discount/list/{orderBy?}/{sort?}', 'listDiscount')->name('');
    Route::get('all/{orderBy?}/{sort?}', 'all')->name('');
});


Route::controller(SearchController::class)->prefix('search')->name('search')->group(function () {

    Route::post('/{value?}', 'search')->name('');
});


Route::controller(articleController::class)->prefix('articles')->name('articles')->group(function () {
    Route::get('/{orderBy?}/{sort?}/{offset?}/{limit?}', 'articles')->name('');
});
