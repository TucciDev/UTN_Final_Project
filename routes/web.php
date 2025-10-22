<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// ========================================
// PÁGINA PRINCIPAL (PÚBLICA - Todos pueden verla)
// ========================================
Route::get('/', [UserController::class, 'index'])->name('home');

// ========================================
// AUTENTICACIÓN - GUEST (solo no autenticados)
// ========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// ========================================
// RUTAS PROTEGIDAS (solo autenticados)
// ========================================
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Perfil de usuario
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
});

// ========================================
// RUTAS DE AUTENTICACIÓN ADICIONALES (generadas por Laravel)
// ========================================
Auth::routes(['login' => false, 'register' => false, 'reset' => true, 'verify' => false]);
