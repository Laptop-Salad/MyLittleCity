<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(static function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('projects', \App\Livewire\Project\Projects::class)
        ->name('projects');

    Route::get('projects/{project}', \App\Livewire\Project\Show::class)
        ->name('projects.project');

    Route::get('projects/{project}/people', \App\Livewire\People\People::class)
        ->name('projects.project.people');

    Route::get('cities/{city}', App\Livewire\City\Show::class)
        ->name('cities.city');

    Route::get('cities/{city}/residents', App\Livewire\City\Residents::class)
        ->name('cities.city.residents');
});

require __DIR__.'/auth.php';
