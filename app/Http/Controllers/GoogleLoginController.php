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
    
    public function redirectToGoogle()
    {
        
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email']) // <-- AÑADE ESTA LÍNEA
            ->redirect();
    }

    // Manejamos la respuesta de Google
    public function handleGoogleCallback()
    {
        try {
            
            $googleUser = Socialite::driver('google')->user();

            // Busca si el usuario ya existe en tu base de datos
            
            $user = User::where('google_id', $googleUser->id) 
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Si el usuario existe, actualiza los datos si es nulo
                
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

                // Si el usuario no existe,se crea
               
                $newUser = User::create([
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'username' => User::generateUsername($googleUser->email), 
                    'email' => $googleUser->email,      
                    'google_id' => $googleUser->id,     
                    'ruta_img' => $googleUser->getAvatar(),
                    'email_verified_at' => now(), 
                    'password' => null 
                ]);

                // Inicia sesión con el nuevo usuario
                Auth::login($newUser);
            }

            
            return redirect('/dashboard');

        } catch (\Exception $e) {
           // Muestra el error exacto
           
             //dd($e->getMessage());
             
             return redirect('/login')->with('error', 'Algo salió mal: ' . $e->getMessage());
        }
    }
}
