<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Agregar el controlador EventoController
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PonentesController;
use App\Http\Controllers\AsistentesController;

//Rutas públicas
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);
Route::get('/ponentes', [PonentesController::class, 'index']);
Route::get('/ponentes/{id}', [PonentesController::class, 'show']);

//Rutas privadas
Route::middleware('auth:api')->group(function () {
    // Almacenar un evento nuevo
    Route::post('/eventos', [EventoController::class, 'store']);
    // Actualizar un evento específico
    Route::put('/eventos/{evento}', [EventoController::class, 'update']);
    // Eliminar un evento específico
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);
    // ----Rutas para el recurso ponentes.
    // Almacenar un ponente nuevo
    Route::post('/ponentes', [PonentesController::class, 'store']);
    // Actualizar un ponente específico
    Route::put('/ponentes/{ponente}', [PonentesController::class, 'update']);
    // Eliminar un ponente específico
    Route::delete('/ponentes/{id}', [PonentesController::class, 'destroy']);
    // ----Rutas para el recurso asistentes.
    // Recuperar todos los asistentes
    Route::get('/asistentes', [AsistentesController::class, 'index']);
    // Almacenar un asistente nuevo
    Route::post('/asistentes', [AsistentesController::class, 'store']);
    // Recuperar un asistente específico
    Route::get('/asistentes/{id}', [AsistentesController::class, 'show']);
    // Actualizar un asistente específico
    Route::put('/asistentes/{asistente}', [AsistentesController::class, 'update']);
    // Eliminar un asistente específico
    Route::delete('/asistentes/{id}', [AsistentesController::class, 'destroy']);
});