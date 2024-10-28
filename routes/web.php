<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para manejar mensajes
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{id}/edit', [MessageController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{id}', [MessageController::class, 'update'])->name('messages.update');