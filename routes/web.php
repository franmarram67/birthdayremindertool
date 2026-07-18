<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::livewire('contacts', 'pages::contacts')->name('contacts');
    Route::livewire('calendar', 'pages::calendar')->name('calendar');
});

require __DIR__.'/settings.php';
