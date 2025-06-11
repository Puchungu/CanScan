<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest; 
use Illuminate\Http\Request;

Route::get('/',[AuthController::class, 'mostrarInicio'])->name('mostrar.Inicio');

Route::get('/registrarse', [AuthController::class, 'mostrarRegistro'])->name('mostrar.Registro');
Route::post('/registrarse', [AuthController::class, 'Registrar'])->name('Registrarse');

Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::get('/login', [AuthController::class, 'mostrarInicioSesion'])->name('login');

Route::post('/logout', [AuthController::class, 'cerrarSesion'])->name('logout');

Route::get('/email/verify', function () {
    return view('emailver');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Correo de verificación reenviado.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/barcode', function () {
    return view('barcode');
})->name('barcode');

Route::post('/barcode/upload', function (Illuminate\Http\Request $request) {
    $barcode = $request->input('barcode');
    return redirect()->route('barcode.list')->with('barcode', $barcode);
})->name('barcode.upload');

Route::get('/barcode/list', function () {
    return view('barcode-list');
})->name('barcode.list');