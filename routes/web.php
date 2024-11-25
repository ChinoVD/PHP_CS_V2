<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;

// Rutas para la autenticación
Route::get('/', function () {
    return view('home');
});

// Ruta para mostrar el home
Route::get('/home', function () {
    return view('home'); // Devuelve la vista 'home.blade.php'
})->name('home');

// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro de usuario
Route::post('/register', [AuthController::class, 'register']);

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión de usuario
Route::post('/login', [AuthController::class, 'login']);

// Ruta para la calculadora (solo para usuarios registrados)
Route::get('/calculator', [AuthController::class, 'showCalculator'])->name('calculator');

// Ruta para mostrar la página de suscripción con AuthController
Route::get('/subscription', [AuthController::class, 'showSubscriptionPage'])->name('subscription');

// Ruta para procesar la suscripción (solo cuando el usuario haga click en "Pagar y Activar Premium")
Route::post('/process-subscription', [AuthController::class, 'processSubscription'])->name('processSubscription');

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirige a la página principal después de cerrar sesión
})->name('logout');

// Rutas para el pago y suscripción
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Ruta para procesar el pago y actualizar la suscripción
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

// Ruta para mostrar la calculadora
Route::get('/calculator', [AuthController::class, 'showCalculator'])->name('calculator');
