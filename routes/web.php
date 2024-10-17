<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(static function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('cities', App\Livewire\City\Cities::class)
        ->name('cities');

    Route::get('cities/{city}', App\Livewire\City\Show::class)
        ->name('cities.city');

    Route::get('cities/{city}/residents', App\Livewire\City\Residents::class)
        ->name('cities.city.residents');
});

require __DIR__.'/auth.php';
