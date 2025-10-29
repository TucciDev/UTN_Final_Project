<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TareaController;
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
    
    // Dashboard - ahora usa el EquipoController
    Route::get('/dashboard', [EquipoController::class, 'index'])->name('dashboard');
    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Perfil de usuario
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    
    // ========================================
    // RUTAS DE EQUIPOS
    // ========================================
    
    // Ver todos los equipos (dashboard)
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    
    // Crear equipo
    Route::get('/equipos/crear', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    
    // Unirse a un equipo
    Route::get('/equipos/unirse', [EquipoController::class, 'showJoinForm'])->name('equipos.join.form');
    Route::post('/equipos/unirse', [EquipoController::class, 'join'])->name('equipos.join');
    
    // Ver, editar y eliminar equipo específico
    Route::get('/equipos/{id}', [EquipoController::class, 'show'])->name('equipos.show');
    Route::get('/equipos/{id}/editar', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/equipos/{id}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/equipos/{id}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
    
    // Salir de un equipo
    Route::post('/equipos/{id}/salir', [EquipoController::class, 'leave'])->name('equipos.leave');
    
    // Gestión de miembros (solo admins)
    Route::delete('/equipos/{equipoId}/miembros/{userId}', [EquipoController::class, 'removeMember'])
        ->name('equipos.members.remove');
    Route::patch('/equipos/{equipoId}/miembros/{userId}/rol', [EquipoController::class, 'changeRole'])
        ->name('equipos.members.change-role');

    // ========================================
    // RUTAS DE TAREAS
    // ========================================
    
    // Crear tarea
    Route::post('/equipos/{equipoId}/tareas', [TareaController::class, 'store'])->name('tareas.store');
    
    // Actualizar tarea
    Route::put('/tareas/{tareaId}', [TareaController::class, 'update'])->name('tareas.update');
    
    // Cambiar estado (para drag & drop)
    Route::patch('/tareas/{tareaId}/estado', [TareaController::class, 'cambiarEstado'])->name('tareas.cambiar-estado');
    
    // Eliminar tarea
    Route::delete('/tareas/{tareaId}', [TareaController::class, 'destroy'])->name('tareas.destroy');
});

// ========================================
// RUTAS DE AUTENTICACIÓN ADICIONALES (generadas por Laravel)
// ========================================
Auth::routes(['login' => false, 'register' => false, 'reset' => true, 'verify' => false]);