<?php

use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\WikiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WikiController::class, 'index'])->name('wiki.home');
Route::get('/wiki/{page}', [WikiController::class, 'show'])->name('wiki.show');
Route::get('/search/results', SearchController::class)->name('search.results');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);
});

Route::post('/upload-image', [PageController::class, 'uploadImage'])->name('upload.image')->middleware('auth');
Route::resource('pages', PageController::class)->except('show')->middleware('auth');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');
