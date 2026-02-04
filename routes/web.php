<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\Session;

Route::get('/',[HomeController::class,'index'])->name('landing');
Route::post('/contact',[HomeController::class,'store'])->name('contact.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('produk.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/booking',[RentalController::class,'success'])->name('booking.success');
});

require __DIR__.'/auth.php';
