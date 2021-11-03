<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/calisma-saatleri/{date?}','App\Http\Controllers\front\indexcontroller@index');
Route::get('/bugunrandevu','App\Http\Controllers\front\indexcontroller@bugunrandevular');
Route::get('/gecmisrandevu','App\Http\Controllers\front\indexcontroller@gecmisrandevular');
Route::get('/gelecekrandevu','App\Http\Controllers\front\indexcontroller@gelecekrandevular');
Route::get('/onaybekleyenrandevu','App\Http\Controllers\front\indexcontroller@onaybekleyenrandevular');
Route::get('/iptalrandevu','App\Http\Controllers\front\indexcontroller@iptalrandevular');
Route::post('/durumdegistir','App\Http\Controllers\front\indexcontroller@durum');
Route::post('/randevu-kaydet','App\Http\Controllers\front\indexcontroller@randevuKaydet');
Route::post('/calisma-saati-ekle','App\Http\Controllers\admin\indexcontroller@store');
Route::get('/calisma-list','App\Http\Controllers\admin\indexcontroller@getcalismalist');
Route::get('/randevu-detay/{id}','App\Http\Controllers\admin\indexcontroller@randevudetay');
Route::post('/not-ekle','App\Http\Controllers\admin\indexcontroller@notekle');
Route::post('/randevu-hasta-ekrani','App\Http\Controllers\admin\indexcontroller@randevuhastaekrani');