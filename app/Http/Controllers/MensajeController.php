<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MensajeController extends Controller
{
    /**
     * Constructor - requiere autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Obtiene los mensajes entre dos usuarios en un equipo
     */
    public function obtenerMensajes(Request $request, $equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);

        // Verificar que el usuario pertenece al equipo
        if (!$equipo->tieneUsuario(Auth::user())) {
            return response()->json(['error' => 'No tienes permiso para ver estos mensajes.'], 403);
        }

        $receptorId = $request->query('receptor_id');

        if (!$receptorId) {
            return response()->json(['mensajes' => []]);
        }

        // Verificar que el receptor también pertenece al equipo (usar cache)
        $receptor = $equipo->usuarios()->where('user_id', $receptorId)->first();
        if (!$receptor) {
            return response()->json(['error' => 'El usuario no pertenece a este equipo.'], 400);
        }

        // Obtener mensajes entre los dos usuarios
        $mensajes = Mensaje::where('equipo_id', $equipoId)
            ->where(function($query) use ($receptorId) {
                $query->where(function($q) use ($receptorId) {
                    $q->where('emisor_id', Auth::id())
                      ->where('receptor_id', $receptorId);
                })
                ->orWhere(function($q) use ($receptorId) {
                    $q->where('emisor_id', $receptorId)
                      ->where('receptor_id', Auth::id());
                });
            })
            ->with(['emisor:id,nombre,apellido', 'receptor:id,nombre,apellido']) // Solo cargar campos necesarios
            ->orderBy('created_at', 'asc')
            ->limit(100) // Limitar a últimos 100 mensajes
            ->get()
            ->map(function ($mensaje) {
                return [
                    'id' => $mensaje->id,
                    'mensaje' => $mensaje->mensaje,
                    'archivo' => $mensaje->archivo_url,
                    'nombre_archivo' => $mensaje->nombre_archivo,
                    'archivo_tamaño' => $mensaje->archivo_tamaño,
                    'archivo_icono' => $mensaje->archivo_icono,
                    'es_imagen' => $mensaje->esImagen(),
                    'tipo' => $mensaje->tipo,
                    'emisor_id' => $mensaje->emisor_id,
                    'emisor_nombre' => $mensaje->emisor->full_name,
                    'emisor_iniciales' => $mensaje->emisor->initials,
                    'leido' => $mensaje->leido,
                    'created_at' => $mensaje->created_at->format('d/m/Y H:i'),
                    'es_mio' => $mensaje->emisor_id === Auth::id(),
                ];
            });

        // Marcar como leídos los mensajes del receptor (en background)
        Mensaje::where('equipo_id', $equipoId)
            ->where('emisor_id', $receptorId)
            ->where('receptor_id', Auth::id())
            ->where('leido', false)
            ->update([
                'leido' => true,
                'leido_at' => now()
            ]);

        return response()->json(['mensajes' => $mensajes]);
    }

    /**
     * Envía un nuevo mensaje
     */
    public function enviar(Request $request, $equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);

        // Verificar que el usuario pertenece al equipo
        if (!$equipo->tieneUsuario(Auth::user())) {
            return response()->json(['error' => 'No tienes permiso para enviar mensajes.'], 403);
        }

        $validated = $request->validate([
            'receptor_id' => 'required|exists:users,id',
            'mensaje' => 'nullable|string|max:5000',
            'archivo' => 'nullable|file|max:10240', // Máximo 10MB
        ], [
            'receptor_id.required' => 'Debes seleccionar un destinatario',
            'receptor_id.exists' => 'El usuario no existe',
            'mensaje.max' => 'El mensaje no puede tener más de 5000 caracteres',
            'archivo.file' => 'Debes enviar un archivo válido',
            'archivo.max' => 'El archivo no puede pesar más de 10MB',
        ]);

        // Verificar que el receptor pertenece al equipo
        $receptor = $equipo->usuarios()->where('user_id', $validated['receptor_id'])->first();
        if (!$receptor) {
            return response()->json(['error' => 'El usuario no pertenece a este equipo.'], 400);
        }

        // Validar que se envíe al menos mensaje o archivo
        if (empty($validated['mensaje']) && !$request->hasFile('archivo')) {
            return response()->json(['error' => 'Debes enviar un mensaje o un archivo.'], 400);
        }

        try {
            $archivoPath = null;
            $nombreArchivo = null;
            $tipo = 'texto';

            // Procesar archivo si existe
            if ($request->hasFile('archivo')) {
                $archivo = $request->file('archivo');
                $nombreArchivo = $archivo->getClientOriginalName();
                $archivoPath = $archivo->store('mensajes/' . $equipoId, 'public');
                
                $tipo = empty($validated['mensaje']) ? 'archivo' : 'ambos';
            }

            $mensaje = Mensaje::create([
                'equipo_id' => $equipo->id,
                'emisor_id' => Auth::id(),
                'receptor_id' => $validated['receptor_id'],
                'mensaje' => $validated['mensaje'] ?? null,
                'archivo' => $archivoPath,
                'nombre_archivo' => $nombreArchivo,
                'tipo' => $tipo,
                'leido' => false,
            ]);

            $mensaje->load('emisor');

            return response()->json([
                'success' => true,
                'mensaje' => [
                    'id' => $mensaje->id,
                    'mensaje' => $mensaje->mensaje,
                    'archivo' => $mensaje->archivo_url,
                    'nombre_archivo' => $mensaje->nombre_archivo,
                    'archivo_tamaño' => $mensaje->archivo_tamaño,
                    'archivo_icono' => $mensaje->archivo_icono,
                    'es_imagen' => $mensaje->esImagen(),
                    'tipo' => $mensaje->tipo,
                    'emisor_id' => $mensaje->emisor_id,
                    'emisor_nombre' => $mensaje->emisor->full_name,
                    'emisor_iniciales' => $mensaje->emisor->initials,
                    'leido' => $mensaje->leido,
                    'created_at' => $mensaje->created_at->format('d/m/Y H:i'),
                    'es_mio' => true,
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Error al enviar mensaje: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al enviar el mensaje.'], 500);
        }
    }

    /**
     * Elimina un mensaje
     */
    public function eliminar($mensajeId)
    {
        $mensaje = Mensaje::findOrFail($mensajeId);

        // Solo el emisor puede eliminar su mensaje
        if ($mensaje->emisor_id !== Auth::id()) {
            return response()->json(['error' => 'No tienes permiso para eliminar este mensaje.'], 403);
        }

        try {
            $mensaje->delete();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error('Error al eliminar mensaje: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al eliminar el mensaje.'], 500);
        }
    }

    /**
     * Obtiene el contador de mensajes no leídos
     */
    public function contadorNoLeidos($equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);

        // Verificar que el usuario pertenece al equipo
        if (!$equipo->tieneUsuario(Auth::user())) {
            return response()->json(['error' => 'No tienes permiso.'], 403);
        }

        $noLeidos = Mensaje::where('equipo_id', $equipoId)
            ->where('receptor_id', Auth::id())
            ->where('leido', false)
            ->count();

        return response()->json(['no_leidos' => $noLeidos]);
    }
}