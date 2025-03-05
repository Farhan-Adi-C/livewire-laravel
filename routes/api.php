<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/create-invoice', [PaymentController::class, 'createInvoice']);
Route::post('/xendit-callback', [PaymentController::class, 'handleCallback']);