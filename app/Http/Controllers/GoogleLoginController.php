<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
class GoogleLoginController extends Controller
{
    //// 1. Redirige al usuario a Google
   // 1. Redirige al usuario a Google
    public function redirectToGoogle()
    {
        // --- ¡AQUÍ ES DONDE VA! ---
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email']) // <-- AÑADE ESTA LÍNEA
            ->redirect();
    }

    // 2. Maneja la respuesta de Google
    public function handleGoogleCallback()
    {
        try {
            // Obtiene los datos del usuario de Google
            $googleUser = Socialite::driver('google')->user();

            // Busca si el usuario ya existe en tu base de datos
            // ▼▼▼ CORRECCIÓN ▼▼▼
            // Buscamos por 'google_id' (no 'provider_id') y quitamos la referencia a 'provider'
            $user = User::where('google_id', $googleUser->id) 
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Si el usuario existe, actualiza los datos si es nulo
                // ▼▼▼ CORRECCIÓN ▼▼▼
                // Actualizamos 'google_id' (no 'provider_id')
                if (!$user->google_id) {
                    $user->google_id = $googleUser->id; // <-- Corregido
                    $user->ruta_img = $user->ruta_img ?? $googleUser->getAvatar();
                    $user->save();
                }
                
                // Inicia sesión con este usuario
                Auth::login($user);

            } else {
                // Dividir el nombre completo en nombre y apellido
                $nameParts = explode(' ', $googleUser->name, 2);
                $nombre = $nameParts[0];
                $apellido = $nameParts[1] ?? '';

                // Si el usuario no existe, créalo
                // ▼▼▼ CORRECCIÓN ▼▼▼
                // Quitamos 'provider' y usamos 'google_id'
                $newUser = User::create([
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'username' => User::generateUsername($googleUser->email), // Necesitamos este método
                    'email' => $googleUser->email,
                    // 'provider' => 'google',          // <-- Eliminado (no tienes esta columna)
                    'google_id' => $googleUser->id,     // <-- Corregido
                    'ruta_img' => $googleUser->getAvatar(),
                    'email_verified_at' => now(), // El email de Google ya está verificado
                    'password' => null // Tu columna password SÍ permite nulos (lo vi en la imagen)
                ]);

                // Inicia sesión con el nuevo usuario
                Auth::login($newUser);
            }

            // Redirige al dashboard o a donde quieras
            return redirect('/dashboard');

        } catch (\Exception $e) {
           // Muestra el error exacto
            //  dd($e->getMessage());

             return redirect('/login')->with('error', 'Algo salió mal: ' . $e->getMessage());
        }
    }
}
