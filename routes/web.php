<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.landing');
});


Route::get('/dashboard', function () {
    $title = 'Dashboard';
    return view('pages.dashboard', compact('title'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sensor', function () {
    $title = 'Sensor';
    return view('pages.sensor', compact('title'));
})->middleware(['auth', 'verified'])->name('sensor');

Route::get('/ledcontrol', function () {
    $title = 'LED Control';
    return view('pages.led', compact('title'));
})->middleware(['auth', 'verified'])->name('led');

// Menggunakan UserController untuk route /user
Route::get('/user', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
