<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Головна сторінка
Route::get('/', [SiteController::class, 'index']);

// Обробка форми через AJAX
Route::post('/contact-us', [ContactController::class, 'send'])->name('contact.send');