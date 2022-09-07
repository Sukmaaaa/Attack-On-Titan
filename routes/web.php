<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kyojinController;
use App\Http\Controllers\seriesController;
use App\Http\Controllers\episodeController;
use App\Http\Controllers\adminKyojinController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\shingekiController;
use App\Http\Controllers\auditController;
use Illuminate\Support\Facades\Auth;

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

route::resource('/attack', shingekiController::class);
route::resource('/audit', auditController::class);
route::resource('/series', seriesController::class);
route::resource('/episode', episodeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::resource('/adminKyojin', adminKyojinController::class);
route::resource('/profile', profileController::class);

Route::get('/admin/kyojin', [kyojinController::class, 'index'])->name('kyojin.index')->middleware('can:view-character');
Route::post('/admin/kyojin', [kyojinController::class, 'store'])->name('kyojin.store')->middleware('can:create-character');
Route::get('/admin/kyojin/create', [kyojinController::class, 'create'])->name('kyojin.create')->middleware('can:create-character');
Route::get('/admin/kyojin/{kyojin}', [kyojinController::class, 'show'])->name('kyojin.show');
Route::put('/admin/kyojin/{kyojin}', [kyojinController::class, 'update'])->name('kyojin.update')->middleware('can:edit-character');
Route::delete('/admin/kyojin/{kyojin}', [kyojinController::class, 'destroy'])->name('kyojin.destroy')->middleware('can:delete-character');
Route::get('/admin/kyojin/{kyojin}/edit', [kyojinController::class, 'edit'])->name('kyojin.edit')->middleware('can:edit-character');

Route::get('/news', [newsController::class, 'index'])->name('news.index')->middleware('can:view-news');
Route::post('/news', [newsController::class, 'store'])->name('news.store')->middleware('can:create-news');
Route::get('/news/create', [newsController::class, 'create'])->name('news.create')->middleware('can:create-news');
Route::get('/news/{news}', [newsController::class, 'show'])->name('news.show');
Route::put('/news/{news}', [newsController::class, 'update'])->name('news.update')->middleware('can:edit-news');
Route::delete('/news/{news}', [newsController::class, 'destroy'])->name('news.destroy')->middleware('can:delete-news');
Route::get('/news/{news}/edit', [newsController::class, 'edit'])->name('news.edit')->middleware('can:edit-news');

Route::get('/role', [roleController::class, 'index'])->name('role.index')->middleware('can:view-roles');
Route::post('/role', [roleController::class, 'store'])->name('role.store')->middleware('can:create-roles');
Route::get('/role/create', [roleController::class, 'create'])->name('role.create')->middleware('can:create-roles');
Route::get('/role/{role}', [roleController::class, 'show'])->name('role.show');
Route::put('/role/{role}', [roleController::class, 'update'])->name('role.update')->middleware('can:edit-roles');
Route::delete('/role/{role}', [roleController::class, 'destroy'])->name('role.destroy')->middleware('can:delete-roles');
Route::get('/role/{role}/edit', [roleController::class, 'edit'])->name('role.edit')->middleware('can:edit-roles');
