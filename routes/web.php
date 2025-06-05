<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest; 

Route::get('/',[AuthController::class, 'mostrarInicio'])->name('mostrar.Inicio');

Route::get('/registrarse', [AuthController::class, 'mostrarRegistro'])->name('mostrar.Registro');
Route::post('/registrarse', [AuthController::class, 'Registrar'])->name('Registrarse');

Route::get('/login', [AuthController::class, 'mostrarInicioSesion'])->name('mostrar.Login');
Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::get('/login', [AuthController::class, 'mostrarInicioSesion'])->name('login');

Route::post('/logout', [AuthController::class, 'cerrarSesion'])->name('logout');

Route::get('/email/verify', function () {
    return view('login');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
