<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CurriculumController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//マルチログイン 追加
Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class,'logout']);
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');


Route::view('/admin/password/reset', 'admin/passwords/email');
Route::post('/admin/password/email', [App\Http\Controllers\admin\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/admin/password/reset/{token}', [App\Http\Controllers\admin\ResetPasswordController::class,'showResetForm']);
Route::post('/admin/password/reset', [App\Http\Controllers\admin\ResetPasswordController::class, 'reset']);

// トップページ
Route::get('/top',[TopController::class,'index'])->name('top.index');
// 配信ページ
Route::get('/delivery',[DeliveryController::class,'show'])->name('delivery.show');

//データ入力ページ
Route::get('/banner/new', [BannerController::class, 'new'])->name('banner.new');
Route::post('/banner/create', [BannerController::class, 'create'])->name('banner.create');
Route::get('/banner/getfile/{id}',[BannerController::class,'getfile'])->name('banner.getfile');

Route::get('/curriculum/news',[CurriculumController::class,'news'])->name('curriculum.news');
Route::post('curriculum/create',[CurriculumController::class,'creates'])->name('curriculum.creates');
Route::get('/curriculum/getfile/{id}',[CurriculumController::class,'getfiles'])->name('curriculum.getfiles');


// Route::post('/update-curriculum-progress', [DeliveryController::class, 'update'])->name('delivery.update');
// Route::any('/update-curriculum-progress', [DeliveryController::class, 'update'])->name('delivery.update');

Route::match(['get', 'post'], '/update-curriculum-progress', [DeliveryController::class, 'update'])->name('delivery.update');














