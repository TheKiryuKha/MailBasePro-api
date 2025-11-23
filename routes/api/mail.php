<?php

declare(strict_types=1);

use App\Http\Controllers\MailController;
use App\Http\Controllers\SendMailsController;
use Illuminate\Support\Facades\Route;

Route::post('/', [MailController::class, 'store'])->name('store');

Route::post('/send', SendMailsController::class)->name('send');
