<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string|max:500',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'asunto.required' => 'El asunto es obligatorio',
            'mensaje.required' => 'El mensaje es obligatorio',
            'mensaje.max' => 'El mensaje no puede superar los 500 caracteres',
        ]);

        try {
            Contacto::create($validated);

            return response()->json([
                'success' => true,
                'message' => '✅ Mensaje enviado correctamente'
            ]);
        } catch (\Exception $e) {
            Log::error('Error al guardar contacto: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => '❌ Error al enviar el mensaje'
            ], 500);
        }
    }
}
