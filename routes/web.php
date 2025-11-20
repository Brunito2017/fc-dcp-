<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::resources([
        'players' => PlayerController::class,
    ]);

    Route::prefix('players/{player}')->group(function () {
        Route::get('/fetch-player/{eaId}', [PlayerController::class, 'fetchAndStore']);
    });

    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
