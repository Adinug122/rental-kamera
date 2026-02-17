<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Models\Rental;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\Session;

Route::get('/',[HomeController::class,'index'])->name('landing');
Route::post('/contact',[HomeController::class,'store'])->name('contact.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('ai/chat',[ChatController::class,'askAi'])->name('askAi');
Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('produk.show');
Route::post('/booking/check', [ProductController::class, 'checkAvailability'])
    ->name('booking.check');
Route::get('/produk',[HomeController::class,'produk'])->name('produk');
Route::middleware('auth')->group(function () {
    Route::get('/history',[RentalController::class,'index'])->name('history');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/booking/success/{kode}',[RentalController::class,'success'])->name('booking.success');
    Route::post('/booking/store',[RentalController::class,'store'])->name('booking.store');
    Route::get('/booking/create',[RentalController::class,'create'])->name('booking.create');
});

require __DIR__.'/auth.php';
