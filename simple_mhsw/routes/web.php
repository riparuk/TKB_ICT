<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('siswas.index');
});

Route::resource('siswas', SiswaController::class);
Route::get('/siswas/{id}/pdf', [SiswaController::class, 'generatePdf'])->name('siswas.pdf');
// Route::get('/siswas/{id}/pdf', [SiswaController::class, 'generatePdf'])->withoutMiddleware('auth')->name('siswas.pdf');

// // API Route
// Route::get('api/siswas', [SiswaController::class, 'apiIndex']);
// Route::middleware('api')->post('api/siswas', [SiswaController::class, 'apiStore']);
// Route::get('api/siswas/{id}', [SiswaController::class, 'apiShow']);
// Route::middleware('api')->put('api/siswas/{id}', [SiswaController::class, 'apiUpdate']);
// Route::middleware('api')->delete('api/siswas/{id}', [SiswaController::class, 'apiDestroy']);