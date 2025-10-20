<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Mostrar formulario de solicitud de reset
     */
    public function showLinkRequestForm()
    {
    return view('auth.passwords.email');
    }

    /**
     * Enviar email con link de reset
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Debe ser un correo válido',
        ]);

        // Enviar link de reset
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Te hemos enviado un enlace para restablecer tu contraseña por correo electrónico.');
        }

        throw ValidationException::withMessages([
            'email' => 'No encontramos un usuario con ese correo electrónico.',
        ]);
    }
}