<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductBrandController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource("blog", BlogController::class);
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource("task", TaskController::class);
});


// task
Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource("productBrand", ProductBrandController::class);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__ .'/api.php';