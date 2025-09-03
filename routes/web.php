<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\productosController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// -----------------------------
// RUTAS PÚBLICAS
// -----------------------------
Route::get('/registrarse', [AuthController::class, 'mostrarRegistro'])->name('mostrar.Registro');
Route::post('/registrarse', [AuthController::class, 'Registrar'])->name('Registrarse');

Route::get('/login', [AuthController::class, 'mostrarInicioSesion'])->name('login');
Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('iniciarSesion');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Perfil
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

    // Lector de códigos de barras
    Route::get('/barcode', function () {
        return view('barcode');
    })->name('barcode');

// -----------------------------
// RUTAS CON AUTENTICACIÓN
// -----------------------------
Route::middleware('auth')->group(function () {

    // Dashboard / Inicio
    Route::get('/', [AuthController::class, 'mostrarInicio'])->name('mostrar.Inicio');
    Route::get('/producto/{id}', [ProductosController::class, 'verProducto'])->name('producto.show');
    Route::post('/profile/avatar', [AuthController::class, 'updateAvatar'])->name('profile.avatar');

    Route::put('/update-profile', [AuthController::class, 'update'])->name('update.profile');

    Route::get('/personalinfo', function () {
        return view('personalinfo');
    })->name('personalinfo');

    Route::get('/security', function () {
        return view('security');
    })->name('security');

    Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update.password');

    Route::post('/logout', [AuthController::class, 'cerrarSesion'])->name('logout');

    // Email Verification
    Route::get('/email/verify', function () {
        return view('emailver');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Correo de verificación reenviado.');
    })->middleware('throttle:6,1')->name('verification.send');


    Route::post('/barcode', [productosController::class, 'mostrarProducto'])->name('barcode.scan');

    Route::get('/barcode/list', function () {
        return view('barcode-list');
    })->name('barcode.list');
});
