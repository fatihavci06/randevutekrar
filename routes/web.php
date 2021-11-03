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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/giris','App\Http\Controllers\Auths@login')->name('login');
Route::post('admin/giris','App\Http\Controllers\Auths@loginpost')->name('admin.login.post');
Route::get('/admin','App\Http\Controllers\Auths@index')->middleware('auth')->name('admin.dashboard');
Route::post('admin/cikis','App\Http\Controllers\Auths@logout')->name('logout');
Route::group(['prefix'=>'cron'],function(){
    Route::get('/reminder',function(){
        Artisan::call('Reminder:Start');
    });
});
Route::get('admin/calisma-saatleri','App\Http\Controllers\admin\indexcontroller@index')->middleware('auth')->name('admin.calisma-saati');
Route::get('admin/test-saatleri','App\Http\Controllers\admin\indexcontroller@testindex');
Route::get('/randevu-sorgulama','App\Http\Controllers\front\indexcontroller@randevusorgulama')->name('randevu-takip');