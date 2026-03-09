<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'index']);


Route::post('/contact-us', [ContactController::class, 'send'])->name('contact.send');