<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LedController;
use App\Http\Controllers\DatasensorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.landing');
})->name('landing');


Route::get('/devices', [DeviceController::class, 'index'])->middleware(['auth', 'verified'])->name('devices');
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user');
Route::get('/datasensor', [DatasensorController::class, 'index'])->middleware(['auth', 'verified'])->name('sensor.index');
Route::get('leds', [LedController::class, 'index'])->middleware(['auth', 'verified'])->name('led.index');
Route::post('/leds/{id}/toggle', [LedController::class, 'toggleStatus'])->name('toggleStatus');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
