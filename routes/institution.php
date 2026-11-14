<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Institution\DashboardController;

Route::middleware(['auth', 'role:institution-administrator,school-staff'])
    ->prefix('institution')
    ->name('institution.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });