<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\incomesController;
use App\Http\Controllers\income_sourcesController;
use App\Http\Controllers\spendingsController;
use App\Http\Controllers\categoriesController;

// 会員登録
Route::get('/', [UserController::class, 'signUp'])->name('signUp');
Route::post('/confirm_info', [UserController::class, 'confirm_info'])->name('confirm_info');

// 確認画面
Route::get('/signUp_confirm', [UserController::class, 'signUp_confirm'])->name('signUp_confirm');

Route::post('/register', [UserController::class, 'register'])->name('register');
// ログイン
Route::get('/signIn', [UserController::class, 'signIn'])->name('signIn');
Route::post('/login', [UserController::class, 'login'])->name('login');


