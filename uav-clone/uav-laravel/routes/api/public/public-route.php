<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::post('user/register', [PersonController::class, 'save']);
Route::get('verify-email/{id}/{hash}', [PersonController::class, 'verifyEmail'])->name('verification.verify');
Route::post('login', [AuthController::class, 'login']);
