<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/lowongan-kerja', [JobListingController::class, 'index'])->name('jobs.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/tentang-kami', [AboutUsController::class, 'index'])->name('about.index');
