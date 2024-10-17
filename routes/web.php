<?php

use App\Livewire\Cities;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::middleware('auth')->group(static function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('cities', Cities::class)
        ->name('cities');

    Route::get('cities/{city}', \App\Livewire\City::class)
        ->name('cities.city');
});

require __DIR__.'/auth.php';
