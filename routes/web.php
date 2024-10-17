<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(static function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('cities', App\Livewire\Cities\Cities::class)
        ->name('cities');

    Route::get('cities/{city}', App\Livewire\Cities\Show::class)
        ->name('cities.city');
});

require __DIR__.'/auth.php';
