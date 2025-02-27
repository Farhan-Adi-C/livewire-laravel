<?php

use Livewire\Volt\Volt;
use App\Livewire\Hobby\Edit;
use App\Livewire\Hobby\Show;
use App\Livewire\Hobby\Index;
use App\Livewire\Hobby\Create;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/hobby/index', Index::class)->name('hobby.index');
    Route::get('/hobbies/create', Create::class)->name('hobby.create');
    Route::get('/hobbies/{id}/edit', Edit::class)->name('hobby.edit');
    Route::get('/hobbies/{id}', Show::class)->name('hobby.show');
});


require __DIR__.'/auth.php';
