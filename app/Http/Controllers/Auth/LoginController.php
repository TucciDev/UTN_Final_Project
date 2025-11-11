<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Si ya está autenticado, redirigir al dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación flexible: acepta email o username
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'login.required' => 'El correo o nombre de usuario es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
        ]);

        // Determinar si es email o username
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        // Crear array de credenciales
        $loginCredentials = [
            $loginType => $request->login,
            'password' => $request->password
        ];

        // Intentar autenticar
        if (Auth::attempt($loginCredentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            return redirect()->route('dashboard')
                ->with('success', '¡Bienvenido de vuelta, ' . Auth::user()->nombre . '!');
        }

        throw ValidationException::withMessages([
            'login' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')
            ->with('success', 'Sesión cerrada exitosamente');
    }
}