<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// -----------------------------
// RUTAS PÚBLICAS
// -----------------------------
Route::get('/registrarse', [AuthController::class, 'mostrarRegistro'])->name('mostrar.Registro');
Route::post('/registrarse', [AuthController::class, 'registrar'])->name('Registrarse');

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

Route::post('/barcode', [productosController::class, 'mostrarProducto'])->name('barcode.scan');

// Comparar productos
Route::post('/comparar/add', [ProductosController::class, 'addToCompare'])->name('comparar.add');
Route::get('/comparar', [ProductosController::class, 'showCompare'])->name('comparar.show');
Route::post('/comparar/remove/{id}', [ProductosController::class, 'removeFromCompare'])->name('comparar.remove');
Route::post('/comparar/clear', [ProductosController::class, 'clearCompare'])->name('comparar.clear');

// Rutas de productos admin
Route::get('/admin/productos', [AdminController::class, 'listarProductos'])->name('admin.productos.index');
Route::get('/admin/productos/create', [AdminController::class, 'crearProducto'])->name('admin.productos.create');
Route::post('/admin/productos', [AdminController::class, 'guardarProducto'])->name('admin.productos.store');
Route::get('/admin/productos/{id}/edit', [AdminController::class, 'editarProducto'])->name('admin.productos.edit');
Route::put('/admin/productos/{id}', [AdminController::class, 'actualizarProducto'])->name('admin.productos.update');
Route::delete('/admin/productos/{id}', [AdminController::class, 'eliminarProducto'])->name('admin.productos.destroy');

// Rutas de usuarios admin
Route::get('/admin/usuarios', [AdminController::class, 'listarUsuarios'])->name('admin.usuarios.index');
Route::get('/admin/usuarios/create', [AdminController::class, 'crearUsuario'])->name('admin.usuarios.create');
Route::post('/admin/usuarios', [AdminController::class, 'guardarUsuario'])->name('admin.usuarios.store');
Route::get('/admin/usuarios/{id}/edit', [AdminController::class, 'editarUsuario'])->name('admin.usuarios.edit');
Route::put('/admin/usuarios/{id}', [AdminController::class, 'actualizarUsuario'])->name('admin.usuarios.update');
Route::delete('/admin/usuarios/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.usuarios.destroy');

// Ruta para ver sugerencias
Route::get('/admin/sugerencias', [AdminController::class, 'showSugerencias'])->name('admin.sugerencias.index');
Route::get('/admin/sugerencias/{id}/aprobar', [AdminController::class, 'aprobarSugerencia'])->name('admin.sugerencias.aprobar');
Route::post('/admin/sugerencias/{id}/rechazar', [AdminController::class, 'rechazarSugerencia'])->name('admin.sugerencias.rechazar');

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

    Route::put('/change-password', [AuthController::class, 'updatePassword'])->name('update.password');

    Route::post('/logout', [AuthController::class, 'cerrarSesion'])->name('logout');

    // Email Verification
    Route::get('/email/verify', function () {
        return view('emailver');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/login') ->with('message', 'Correo verificado correctamente. Ahora puedes iniciar sesión.');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Correo de verificación reenviado.');
    })->middleware('throttle:6,1')->name('verification.send');

    Route::get('/barcode/list', function () {
        return view('barcode-list');
    })->name('barcode.list');

    Route::get('/sugerir-producto', [ProductosController::class, 'sugerirProducto'])->name('sugerir.producto');
    Route::post('/sugerir-producto', [ProductosController::class, 'guardarSugerencia'])->name('store.producto');

    Route::get('/support-center', [AuthController::class, 'showSupportCenter'])->name('support.center');
    Route::get('/faqs', [AuthController::class, 'showFAQs'])->name('faqs');
    Route::get('/soporte/reportar', [AuthController::class, 'showContactForm'])->name('contact');
    Route::post('/soporte/reportar', [AuthController::class, 'submitContactForm'])->name('report.error.submit');

    Route::get('/tour-completed', function() {
    $user = Auth::user();
    $user->has_seen_tutorial = true;
    $user->save();
    session(['show_tutorial' => false]);
    return redirect()->route('mostrar.Inicio');
    })->name('tour.completed');
    
});
