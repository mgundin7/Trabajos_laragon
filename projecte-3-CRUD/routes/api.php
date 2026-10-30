<?php

use App\Http\Controllers\ProducteController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('producte', [ProducteController::class, 'index']);
Route::get('producte/{id}', [ProducteController::class, 'show']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('producte', [ProducteController::class, 'store']);
    Route::put('producte/{id}', [ProducteController::class, 'update']);
    Route::patch('producte/{id}', [ProducteController::class, 'update']);
    Route::delete('producte/{id}', [ProducteController::class, 'destroy']);
});