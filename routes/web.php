<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index'])->name('inicio');

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/tipo/{tipo}', [EventoController::class, 'porTipo'])->name('eventos.tipo');
Route::get('/eventos/{id}', [EventoController::class, 'show'])
    ->whereNumber('id')
    ->name('eventos.show');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});