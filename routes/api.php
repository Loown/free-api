<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Me;
use App\Http\Controllers\Vehicle;

Route::prefix('auth')->group(function () {
    Route::post('/register', Auth\RegisterController::class);
    Route::post('/login', Auth\LoginController::class);
});

Route::prefix('me')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', Me\ProfileController::class);
    Route::put('/change-password', Me\ChangePasswordController::class);
    Route::get('/bookings', Me\BookingsController::class);
});

Route::prefix('vehicles')->group(function () {
    Route::get('/{vehicle}', Vehicle\OneController::class);
    Route::get('/', Vehicle\ListController::class);
    Route::post('/', Vehicle\CreateController::class)->middleware(['auth:sanctum']);
    Route::put('/{vehicle}', Vehicle\UpdateController::class)->middleware(['auth:sanctum']);
    Route::delete('/{vehicle}', Vehicle\RemoveController::class)->middleware(['auth:sanctum']);
});