<?php

use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\TruyenController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [indexController::class, 'home']);
Route::get('/danh-muc/{slug}', [indexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [indexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{slug}', [indexController::class, 'xemchapter']);
Route::get('/the-loai/{slug}', [indexController::class, 'theloai']);
Route::get('/tag/{tag}', [indexController::class, 'tag']);
Route::get('/kytu/{kytu}', [indexController::class, 'kytu']);

Route::post('/tim-kiem', [indexController::class, 'timkiem']);
Route::post('/timkiem-ajax', [indexController::class, 'timkiem_ajax']);

Auth::routes();

Route::get('/home', [indexController::class, 'home'])->name('home');

Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);
Route::get('/custom_error', function(){
    return Artisan::call('php artisan vendor:publish --tag=laravel-errors');
});