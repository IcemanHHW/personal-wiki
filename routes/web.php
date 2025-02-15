<?php

use App\Http\Controllers\Backend\WikiPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('wiki-pages', WikiPageController::class)->except('show');
