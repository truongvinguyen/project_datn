<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Models\category;
use App\Models\brand;
use App\Models\article;
use App\Models\articleFeedback;

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

Route::prefix('home')->name('product')->group(function () {
    Route::get('', [App\Http\Controllers\showDataController::class, 'product'])->name('');
    Route::get('{id}', [App\Http\Controllers\showDataController::class, 'product_by_id'])->name('index');
});

//danh mục
Route::prefix('categories')->name('api.categories.')->group(function () {
    Route::get('/{offset?}/{limit?}', function (int $offset = 0, int $limit = 10) {
        if ($limit === null) {
            $res = category::all();
            return response()->json($res, 200);
        }
        $res = category::offset($offset)->limit($limit)->orderBy('id', 'desc')->get();
        return response()->json($res, 200);
    })->name('index');
    Route::get('/', function () {
        category::all();
    })->name('');
    Route::get('detail/{id}', function () {
    })->name('detail');
    Route::get('create', function () {
    })->name('create');
    Route::post('store', function () {
    })->name('store');
    Route::get('edit/{id}', function () {
    })->name('edit');
    Route::post('update/{id}', function () {
    })->name('update');
    Route::get('delete/{id}', function () {
    })->name('delete');
});
