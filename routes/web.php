<?php

use App\Http\Controllers\auth\SessionController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Backend\WikiPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.index');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);
});

Route::resource('wiki-pages', WikiPageController::class)->except('show')->middleware('auth');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');
