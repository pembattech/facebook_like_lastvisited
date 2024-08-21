<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/update-last-section', [UserController::class, 'updateLastSection'])->middleware('auth');
