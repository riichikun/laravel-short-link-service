<?php

declare(strict_types=1);

use App\Http\Controllers\LinkController;
use App\Http\Controllers\LinkStatsController;
use Illuminate\Support\Facades\Route;

Route::post('/links', [LinkController::class, 'store']);

Route::get('/links/{code}/stats', [LinkStatsController::class, 'get']);
