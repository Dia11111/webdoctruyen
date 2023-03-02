<?php

use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\TruyenController;
use Illuminate\Support\Facades\Auth;
use Curl\Curl;
use Illuminate\Support\Facades\Redirect;

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

Route::post('/convert', function () {
    if (isset($_POST['convert'])) {
        $text = strip_tags(request('text'));
        $apiKey = 'USx1KXAU20T5dne9DwwBmoAKx4zxZESW';

        $curl = new Curl();
        $curl->setHeader('api-key', $apiKey);
        $curl->setHeader('X-TTS-NoCache', true);
        $curl->setHeader('cache-control', 'no-cache');
        $curl->setHeader('voice', 'lannhi');
        $curl->setHeader('speed', -1);
        $curl->post(
            'https://api.fpt.ai/hmi/tts/v5',
            $text,
        );

        // $res = $curl;
        $result = json_decode($curl->rawResponse);
        $audioContent = $result->async;
        return Redirect::back()->with([
            'audioContent' => $audioContent,
            'res' => $result,
            'text' => $text
        ]);
    }
    return Redirect::back();
})->name('text-to-speech.convert');

//======================================================================

Route::get('/', [indexController::class, 'home']);
Route::get('/danh-muc/{slug}', [indexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [indexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{slug}', [indexController::class, 'xemchapter']);
Route::get('/the-loai/{slug}', [indexController::class, 'theloai']);
Route::get('/tag/{tag}', [indexController::class, 'tag']);

Route::post('/tim-kiem', [indexController::class, 'timkiem']);
Route::post('/timkiem-ajax', [indexController::class, 'timkiem_ajax']);

Auth::routes();

Route::get('/home', [indexController::class, 'home'])->name('home');

Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);
