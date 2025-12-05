<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('clients.index');
});

// Client Management Routes
Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/{id}', [ClientController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ClientController::class, 'update'])->name('update');
    Route::post('/{id}/interaction', [ClientController::class, 'submitInteraction'])->name('interaction');
    Route::post('/{id}/complaint', [ClientController::class, 'submitComplaint'])->name('complaint');
    Route::get('/{id}/insights', [ClientController::class, 'insights'])->name('insights');
});

