<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailValidationController;


Route::get('/api/check-email', [EmailValidationController::class, 'checkEmail'])->name('check-email');
