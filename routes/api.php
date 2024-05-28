<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DatasensorController;
use App\Http\Controllers\DataaktuatorController;
use App\Http\Controllers\LedController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/devices', [DeviceController::class, 'index']);
Route::post('/devices', [DeviceController::class, 'store']);
Route::get('/devices/{id}', [DeviceController::class, 'show']);
Route::put('/devices/{id}', [DeviceController::class, 'update']);
Route::delete('/devices/{id}', [DeviceController::class,'destroy']);


Route::get('/datasensor', [DatasensorController::class, 'index']);
Route::post('/datasensor', [DatasensorController::class, 'store']);
Route::get('/datasensor/{id}', [DatasensorController::class, 'show']);
Route::put('/datasensor/{id}', [DatasensorController::class, 'update']);
Route::delete('/datasensor/{id}', [DatasensorController::class,'destroy']);


Route::get('/dataaktuator', [DataaktuatorController::class, 'index']);
Route::post('/dataaktuator', [DataaktuatorController::class, 'store']);
Route::get('/dataaktuator/{id}', [DataaktuatorController::class, 'show']);
Route::put('/dataaktuator/{id}', [DataaktuatorController::class, 'update']);
Route::delete('/dataaktuator/{id}', [DataaktuatorController::class,'destroy']);


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
Route::put('/leds/{id}', [LedController::class, 'update'])->name('update');
Route::delete('/leds/{id}', [LedController::class, 'destroy'])->name('destroy');

