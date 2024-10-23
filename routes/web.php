<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BannerController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('banners/create', [BannerController::class, 'create'])
        ->can('create', App\Models\Banner::class)
        ->name('banners.create');

    Route::post('banners', [BannerController::class, 'store'])
        ->can('create', App\Models\Banner::class)
        ->name('banners.store');

    Route::get('banners/{id}/edit', [BannerController::class, 'edit'])
        ->can('update', App\Models\Banner::class)
        ->name('banners.edit');

    Route::put('banners/{id}', [BannerController::class, 'update'])
        ->can('update', App\Models\Banner::class)
        ->name('banners.update');

    Route::delete('banners/{id}', [BannerController::class, 'destroy'])
        ->can('delete', App\Models\Banner::class)
        ->name('banners.destroy');
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
