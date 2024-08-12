<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\IncomeSourcesController;
use App\Http\Controllers\SpendingsController;
use App\Http\Controllers\CategoriesController;



// 会員登録
Route::get('/', [UserController::class, 'signUp'])->name('signUp');
Route::post('/confirm_info', [UserController::class, 'confirm_info'])->name('confirm_info');

// 確認画面
Route::get('/signUp_confirm', [UserController::class, 'signUp_confirm'])->name('signUp_confirm');

Route::post('/register', [UserController::class, 'register'])->name('register');
// ログイン
Route::get('/signIn', [UserController::class, 'signIn'])->name('signIn');
Route::post('/login', [UserController::class, 'login'])->name('login');


// Topページ
Route::get('/top', [TopController::class, 'top'])->name('top');

// 収入源
Route::get('/income_sources', [incomeSourcesController::class, 'income_sources'])->name('income_sources');

// 収入源の追加
Route::get('/show_create_income_sources', [incomeSourcesController::class, 'show_create_income_sources'])->name('show_create_income_sources');
Route::post('/income_sources', [incomeSourcesController::class, 'store'])->name('income_sources.store');

// 収入源の編集
Route::get('/show_edit_income_sources/{id}/edit', [incomeSourcesController::class, 'show_edit_income_sources'])->name('show_edit_income_sources');
Route::put('/income_sources/{id}', [incomeSourcesController::class, 'update'])->name('income_sources.update');

// 収入源の削除
Route::delete('/income_sources/{id}', [incomeSourcesController::class, 'destroy'])->name('income_sources.destroy');

// 収入
Route::get('/incomes', [IncomesController::class, 'incomes'])->name('incomes');

// 収入の追加
Route::get('/show_create_incomes', [IncomesController::class, 'show_create_incomes'])->name('show_create_incomes');
Route::post('/incomes', [IncomesController::class, 'store'])->name('incomes.store');

// 収入の編集
Route::get('/show_edit_incomes/{id}', [IncomesController::class, 'show_edit_incomes'])->name('incomes.edit');
Route::put('/incomes/{id}', [IncomesController::class, 'update'])->name('incomes.update');

// 収入の削除
Route::delete('/incomes/{id}', [IncomesController::class, 'destroy'])->name('incomes.destroy');


