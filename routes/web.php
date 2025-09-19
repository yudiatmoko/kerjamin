<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home.index');
Route::get('/lowongan-kerja', [PageController::class, 'jobs'])->name('jobs.index');
Route::get('/blog', [PageController::class, 'blogs'])->name('blogs.index');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
