<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasensorController;
use App\Http\Controllers\LedController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/datasensor', [DatasensorController::class, 'indexx']);
Route::post('/datasensor', [DatasensorController::class, 'store']);
Route::get('/datasensor/{id}', [DatasensorController::class, 'show']);
Route::put('/datasensor/{id}', [DatasensorController::class, 'update']);
Route::delete('/datasensor/{id}', [DatasensorController::class,'destroy']);

Route::get('/notification', [NotificationController::class, 'index']);
Route::post('/notification', [NotificationController::class, 'store']);
Route::get('/notification/{id}', [NotificationController::class, 'show']);
Route::put('/notification/{id}', [NotificationController::class, 'update']);
Route::delete('/notification/{id}', [NotificationController::class,'destroy']);

Route::get('/users', [UserController::class, 'indexx']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class,'destroy']);

Route::get('/leds', [LedController::class, 'indexx'])->name('index');
Route::post('/leds', [LedController::class, 'storee'])->name('store');
Route::get('/leds/{id}', [LedController::class, 'show'])->name('show');
Route::put('/leds/{id}', [LedController::class, 'updatee'])->name('update');
Route::delete('/leds/{id}', [LedController::class, 'destroy'])->name('destroy');

