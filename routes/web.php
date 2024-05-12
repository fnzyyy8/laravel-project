<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HelloWorld;
use  App\Http\Controllers\NestedViewController;

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

Route::get('world',[NestedViewController::class,'index']);
