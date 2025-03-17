<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/siswas', [SiswaController::class, 'apiIndex']);
Route::post('/siswas', [SiswaController::class, 'apiStore']);
Route::get('/siswas/{id}', [SiswaController::class, 'apiShow']);
Route::put('/siswas/{id}', [SiswaController::class, 'apiUpdate']);
Route::delete('/siswas/{id}', [SiswaController::class, 'apiDestroy']);