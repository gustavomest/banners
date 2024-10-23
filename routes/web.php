<?php

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

Route::get('/', function () {
    $mock = [
        [
            'arquivo' => 'UOL - 1190x330',
            'titulo' => 'BANNERS SEST SENAT',
            'plataforma' => 'HTML5',
            'campanha' => 'VALORIZAÇÃO DA ENGENHARIA',
            'resolucao' => '1190x330',
            'peso' => '0 Bytes',
            'tempo' => '00:00:00',
            'formato' => 'html',
            'empresa' => 'SEST',
            'tipo' => 'Desenvo',
        ],
        [
            'arquivo' => 'GLOBO.COM - 970x150',
            'titulo' => 'BANNERS SEST SENAT',
            'plataforma' => 'HTML5',
            'campanha' => 'VALORIZAÇÃO DA ENGENHARIA',
            'resolucao' => '970x150',
            'peso' => '0 Bytes',
            'tempo' => '00:00:00',
            'formato' => 'html',
            'empresa' => 'SEST',
            'tipo' => 'Desenvo',
        ],
        [
            'arquivo' => 'GLOBO.COM - 300x600',
            'titulo' => 'BANNERS SEST SENAT',
            'plataforma' => 'HTML5',
            'campanha' => 'VALORIZAÇÃO DA ENGENHARIA',
            'resolucao' => '300x600',
            'peso' => '0 Bytes',
            'tempo' => '00:00:00',
            'formato' => 'html',
            'empresa' => 'SEST',
            'tipo' => 'Desenvo',
        ],
        [
            'arquivo' => 'EDITORA GLOBO - 1190x250',
            'titulo' => 'BANNERS SEST SENAT',
            'plataforma' => 'HTML5',
            'campanha' => 'VALORIZAÇÃO DA ENGENHARIA',
            'resolucao' => '1190x250',
            'peso' => '0 Bytes',
            'tempo' => '00:00:00',
            'formato' => 'html',
            'empresa' => 'SEST',
            'tipo' => 'Desenvo',
        ],
    ];

    return view('main', ['items' => $mock]);
})
    ->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
