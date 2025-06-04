<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/',[AuthController::class, 'mostrarInicio'])->name('mostrar.Inicio');

Route::get('/registrarse', [AuthController::class, 'mostrarRegistro'])->name('mostrar.Registro');
Route::post('/registrarse', [AuthController::class, 'Registrar'])->name('Registrarse');

Route::get('/login', [AuthController::class, 'mostrarInicioSesion'])->name('mostrar.Login');
Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('iniciarSesion');

Route::post('/logout', [AuthController::class, 'cerrarSesion'])->name('logout');
