<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.landing');
})->name('landing');

Route::get('/devices', function () {
    $title = 'Devices';
    return view('pages.devices', compact('data'));
})->middleware(['auth', 'verified'])->name('devices');


Route::get('/sensor', function () {
    $title = 'Sensor';
    return view('pages.sensor', compact('title'));
})->middleware(['auth', 'verified'])->name('sensor');

Route::get('/ledcontrol', function () {
    $title = 'LED Control';
    return view('pages.led', compact('title'));
})->middleware(['auth', 'verified'])->name('led');

Route::get('/devices', [DeviceController::class, 'index'])->middleware(['auth', 'verified'])->name('devices');
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user');
Route::get('/leds', [LedController::class, 'index'])->middleware(['auth', 'verified'])->name('led');
Route::get('/leds', [LedController::class, 'store'])->middleware(['auth', 'verified'])->name('led.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
