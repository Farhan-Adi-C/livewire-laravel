<?php

use App\Http\Controllers\CobaController;
use Livewire\Volt\Volt;
use App\Livewire\Hobby\Edit;
use App\Livewire\Hobby\Show;
use App\Livewire\Hobby\Index;
use App\Livewire\Hobby\Create;
use App\Livewire\Phone\Create as PhoneCreate;
use App\Livewire\Phone\Edit as PhoneEdit;
use App\Livewire\Phone\Index as PhoneIndex;
use App\Livewire\Phone\Update;
use App\Livewire\Siswa\Create as SiswaCreate;
use App\Livewire\Siswa\Edit as SiswaEdit;
use App\Livewire\Siswa\Index as SiswaIndex;
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


    Route::get('/siswa/index', SiswaIndex::class)->name('siswa.index');
    Route::get('/siswa/create', SiswaCreate::class)->name('siswa.create');
    Route::get('siswa/edit/{id}', SiswaEdit::class)->name('siswa.edit');

    Route::get('/phone/index', PhoneIndex::class)->name('phone.index');
    Route::get('/phone/create/{id}', PhoneCreate::class)->name('phone.create');
    Route::get('/phone/edit/{id}', PhoneEdit::class)->name('phone.edit');
    Route::get('/phone/update/{id}', Update::class)->name('phone.update');
});

use App\Http\Controllers\PaymentController;

Route::post('/create-invoice', [PaymentController::class, 'createInvoice']);
Route::post('/xendit-callback', [PaymentController::class, 'handleCallback']);


require __DIR__.'/auth.php';
