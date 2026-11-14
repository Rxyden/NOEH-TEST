<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;

Route::middleware(['auth', 'role:registered-user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });