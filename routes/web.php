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

/* ユーザー＿お知らせ */
Route::get('/userinfo', [App\Http\Controllers\ArticleController::class, 'showUserInfo'])->name('showList.userinfo');

/* 管理＿お知らせ */
Route::get('/admininfo', [App\Http\Controllers\ArticleController::class, 'showAdminInfo'])->name('showList.admininfo');
Route::get('/detail{id}', [App\Http\Controllers\ArticleController::class, 'showListDetail'])->name('showList.detail');
Route::post('/destroy', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('article.destroy');

/* お知らせ変更 */
Route::get('/admininfoedit{id}', [App\Http\Controllers\ArticleController::class, 'showListEdit'])->name('showList.admininfoedit');
Route::post('/updateInfo{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');

/* お知らせ変更 - 新規登録 */
Route::get('/admininfocreate', [App\Http\Controllers\ArticleController::class, 'showListCreate'])->name('showList.admininfocreate');
Route::post('/create', [App\Http\Controllers\ArticleController::class, 'createArticle'])->name('article.store');

/* プロフィール変更 */
Route::get('/profile{id}', [App\Http\Controllers\UserController::class, 'showListProf'])->name('showList.prof');
Route::post('/updateProfile{id}', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');

/* パスワード変更 */
Route::get('/password{id}', [App\Http\Controllers\UserController::class, 'showListPass'])->name('showList.pass');
Route::post('/updatePwd{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('password.update');

/* カリキュラム進捗 */
Route::get('/progress{id}', [App\Http\Controllers\CurriculumController::class, 'showListProgress'])->name('showList.progress');