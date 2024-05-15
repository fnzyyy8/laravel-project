<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HelloWorld;
use  App\Http\Controllers\NestedViewController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\InputTypeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\RedirectController;

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
Route::get('/testing',function (){
    return "Selamat Datang";
});
Route::redirect('/wrong','/testing');
Route::fallback(function (){
    return 'Halaman tidak ada';
});
Route::get('/hello',[HelloWorld::class,'index']);

Route::get('/world',[NestedViewController::class,'index'])
->name('world');
Route::get('/product/{id}',[ParameterController::class,'onlyparam'])
->name('param.onlyparam');
Route::get('product/{productId}/item/{itemId}',[ParameterController::class,'doubleparam'])
->name('param.doubleparam');
Route::get('number/{id}',[ParameterController::class,'regexparam'])->where('id','[0-9]+')
->name('param.regexparam');
Route::get('user/{id?}',[ParameterController::class,'optionalparam'])
->name('param.optionalparam');
Route::get('/redirect',[ParameterController::class,'namedroute']);
Route::post('/input-type',[InputTypeController::class,'index']);
Route::post('/filter-only',[InputTypeController::class,'filterOnly']);
Route::post('/filter-except',[InputTypeController::class,'filterExcept']);

Route::get('/upload',[FileController::class,'uploadView'])->name('file.upload');
Route::post('/upload',[FileController::class,'upload']);


Route::get('/response/hello',[ResponseController::class,'response']);
Route::get('/response/header',[ResponseController::class,'header']);
Route::get('response/view',[ResponseController::class,'responseView']);
Route::get('response/json',[ResponseController::class,'responseJson']);
Route::get('response/file',[ResponseController::class,'responseFile']);
Route::get('response/download',[ResponseController::class,'responseDownload']);

Route::get('/cookie/set',[CookieController::class,'createCookie']);
Route::get('/cookie/get',[CookieController::class,'getCookie']);
Route::get('/cookie/clear',[CookieController::class,'clearCookie']);

Route::get('/redirect/to',[RedirectController::class,'redirectTo'])->name('redirectTo');
Route::get('/redirect/from',[RedirectController::class,'redirectFrom']);
Route::get('/redirect/name',[RedirectController::class,'redirectName']);
Route::get('/redirect/name/{name}',[RedirectController::class,'redirectHello'])->name('redirectName');
Route::get('/redirect/action',[RedirectController::class,'redirectAction']);
Route::get('/redirect/away',[RedirectController::class,'redirectAway']);
