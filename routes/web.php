<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorld;
use  App\Http\Controllers\NestedViewController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\InputTypeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SessionController;

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
    return view('welcome');
});
Route::get('/testing', function () {
    return "Selamat Datang";
});
Route::redirect('/wrong', '/testing');
Route::fallback(function () {
    return 'Halaman tidak ada';
});
Route::get('/hello', [HelloWorld::class, 'index'])->name('hello');
Route::get('/world', [NestedViewController::class, 'index'])
    ->name('world');

Route::controller(ParameterController::class)->group(function () {
    Route::get('/product/{id}', 'onlyparam')->name('param.onlyparam');
    Route::get('product/{productId}/item/{itemId}', 'doubleparam')->name('param.doubleparam');
    Route::get('number/{id}', 'regexparam')->where('id', '[0-9]+')->name('param.regexparam');
    Route::get('user/{id?}', 'optionalparam')->name('param.optionalparam');
    Route::get('/redirect', 'namedroute');
});

Route::controller(InputTypeController::class)->group(function () {
    Route::post('/input-type', 'index');
    Route::post('/filter-only', 'filterOnly');
    Route::post('/filter-except', 'filterExcept');
});


Route::get('/upload', [FileController::class, 'uploadView'])->name('file.upload');
Route::post('/upload', [FileController::class, 'upload']);

Route::controller(ResponseController::class)->prefix('/response')
    ->group(function () {
        Route::get('/hello', 'response');
        Route::get('/header', 'header');
        Route::get('/view', 'responseView');
        Route::get('/json', 'responseJson');
        Route::get('/file', 'responseFile');
        Route::get('/download', 'responseDownload');
    });


Route::controller(CookieController::class)
    ->prefix('/cookie')
    ->group(function () {
        Route::get('/set', 'createCookie');
        Route::get('/get', 'getCookie');
        Route::get('/clear', 'clearCookie');
    });


Route::controller(RedirectController::class)->prefix('/redirect')->group(function () {
    Route::get('/to', 'redirectTo')->name('redirectTo');
    Route::get('/name/{name}', 'redirectHello')->name('redirectName');
    Route::get('/from', 'redirectFrom');
    Route::get('/name', 'redirectName');
    Route::get('/action', 'redirectAction');
    Route::get('/away', 'redirectAway');
});

Route::get('/middleware', function () {
    return "Ok";
})->middleware(['contoh']);

Route::get('/middleware/group', function () {
    return "Group";
})->middleware(['fsh']);

Route::get('/middleware/param', function () {
    return 'Param Middleware';
})->middleware('akses:FSH,201');

Route::get('/middleware/param/without', function () {
    return 'Param Middleware Without';
})->middleware('fsh')->withoutMiddleware('contoh');

Route::get('/form', [FormController::class, 'formView']);
Route::post('/form', [FormController::class, 'form']);

Route::controller(SessionController::class)->prefix('/session')
    ->group(function (){
        Route::get('/','getSession');
        Route::get('/create','createSession');
        Route::get('/clear','clearSession');
    });
