<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
{
    /**
     * Constructor - requiere autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Almacena una nueva tarea
     */
    public function store(Request $request, $equipoId)
    {
        $equipo = Equipo::findOrFail($equipoId);

        // Verificar que el usuario es admin del equipo
        if (!$equipo->esAdmin(Auth::user())) {
            return back()->with('error', 'Solo los administradores pueden crear tareas.');
        }

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'prioridad' => 'required|in:baja,media,alta',
            'asignado_a' => 'required|exists:users,id', // ✅ AHORA ES OBLIGATORIO
            'fecha_vencimiento' => 'nullable|date|after_or_equal:now',
            'puntos' => 'nullable|integer|min:0|max:1000',
        ], [
            'titulo.required' => 'El título es obligatorio',
            'titulo.max' => 'El título no puede tener más de 255 caracteres',
            'descripcion.max' => 'La descripción no puede tener más de 1000 caracteres',
            'prioridad.required' => 'La prioridad es obligatoria',
            'prioridad.in' => 'La prioridad debe ser: baja, media o alta',
            'asignado_a.required' => 'Debes asignar la tarea a un miembro del equipo', // ✅ NUEVO
            'asignado_a.exists' => 'El usuario asignado no existe',
            'fecha_vencimiento.date' => 'La fecha de vencimiento no es válida',
            'fecha_vencimiento.after_or_equal' => 'La fecha de vencimiento debe ser en el futuro',
            'puntos.integer' => 'Los puntos deben ser un número entero',
            'puntos.min' => 'Los puntos no pueden ser negativos',
            'puntos.max' => 'Los puntos no pueden ser mayores a 1000',
        ]);

        // Verificar que el usuario asignado pertenece al equipo
        if ($validated['asignado_a']) {
            $usuarioAsignado = $equipo->usuarios()->where('user_id', $validated['asignado_a'])->first();
            if (!$usuarioAsignado) {
                return back()->with('error', 'El usuario asignado no pertenece a este equipo.');
            }
        }

        try {
            Tarea::create([
                'titulo' => $validated['titulo'],
                'descripcion' => $validated['descripcion'] ?? null,
                'estado' => 'por_hacer',
                'prioridad' => $validated['prioridad'],
                'fecha_vencimiento' => $validated['fecha_vencimiento'] ?? null,
                'equipo_id' => $equipo->id,
                'creador_id' => Auth::id(),
                'asignado_a' => $validated['asignado_a'] ?? null,
                'puntos' => $validated['puntos'] ?? 0,
            ]);

            return back()->with('success', '¡Tarea creada exitosamente! 📝');

        } catch (\Exception $e) {
            \Log::error('Error al crear tarea: ' . $e->getMessage());
            return back()->with('error', 'Hubo un error al crear la tarea.');
        }
    }

    /**
     * Actualiza una tarea existente
     */
    public function update(Request $request, $tareaId)
    {
        $tarea = Tarea::findOrFail($tareaId);
        $equipo = $tarea->equipo;

        // Verificar que el usuario es admin del equipo
        if (!$equipo->esAdmin(Auth::user())) {
            return back()->with('error', 'Solo los administradores pueden editar tareas.');
        }

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'estado' => 'required|in:por_hacer,en_progreso,completada',
            'prioridad' => 'required|in:baja,media,alta',
            'asignado_a' => 'nullable|exists:users,id',
            'fecha_vencimiento' => 'nullable|date',
            'puntos' => 'nullable|integer|min:0|max:1000',
        ]);

        // Verificar que el usuario asignado pertenece al equipo
        if ($validated['asignado_a']) {
            $usuarioAsignado = $equipo->usuarios()->where('user_id', $validated['asignado_a'])->first();
            if (!$usuarioAsignado) {
                return back()->with('error', 'El usuario asignado no pertenece a este equipo.');
            }
        }

        try {
            DB::beginTransaction();

            $estadoAnterior = $tarea->estado;
            
            $tarea->update($validated);

            // Si la tarea se completó, otorgar puntos al usuario asignado
            if ($estadoAnterior !== 'completada' && $validated['estado'] === 'completada' && $tarea->asignado_a) {
                $equipo->usuarios()->updateExistingPivot($tarea->asignado_a, [
                    'puntos' => DB::raw('puntos + ' . $tarea->puntos)
                ]);
            }

            // Si la tarea se descompletó, quitar puntos
            if ($estadoAnterior === 'completada' && $validated['estado'] !== 'completada' && $tarea->asignado_a) {
                $equipo->usuarios()->updateExistingPivot($tarea->asignado_a, [
                    'puntos' => DB::raw('puntos - ' . $tarea->puntos)
                ]);
            }

            DB::commit();

            return back()->with('success', 'Tarea actualizada exitosamente! ✏️');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error al actualizar tarea: ' . $e->getMessage());
            return back()->with('error', 'Hubo un error al actualizar la tarea.');
        }
    }

    /**
     * Cambia el estado de una tarea (para drag & drop)
     */
    public function cambiarEstado(Request $request, $tareaId)
    {
        $tarea = Tarea::findOrFail($tareaId);
        $equipo = $tarea->equipo;

        // Verificar que el usuario pertenece al equipo
        if (!$equipo->tieneUsuario(Auth::user())) {
            return response()->json(['error' => 'No tienes permiso para modificar esta tarea.'], 403);
        }

        // Solo el usuario asignado o los admins pueden mover la tarea
        $esAdmin = $equipo->esAdmin(Auth::user());
        $esUsuarioAsignado = $tarea->asignado_a === Auth::id();

        if (!$esAdmin && !$esUsuarioAsignado) {
            return response()->json(['error' => 'Solo el usuario asignado o un administrador pueden mover esta tarea.'], 403);
        }

        $validated = $request->validate([
            'estado' => 'required|in:por_hacer,en_progreso,completada',
        ]);

        try {
            DB::beginTransaction();

            $estadoAnterior = $tarea->estado;
            $tarea->estado = $validated['estado'];
            $tarea->save();

            // Si la tarea se completó, otorgar puntos
            if ($estadoAnterior !== 'completada' && $validated['estado'] === 'completada' && $tarea->asignado_a) {
                $equipo->usuarios()->updateExistingPivot($tarea->asignado_a, [
                    'puntos' => DB::raw('puntos + ' . $tarea->puntos)
                ]);
            }

            // Si la tarea se descompletó, quitar puntos
            if ($estadoAnterior === 'completada' && $validated['estado'] !== 'completada' && $tarea->asignado_a) {
                $equipo->usuarios()->updateExistingPivot($tarea->asignado_a, [
                    'puntos' => DB::raw('puntos - ' . $tarea->puntos)
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Estado actualizado exitosamente'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error al cambiar estado de tarea: ' . $e->getMessage());
            return response()->json(['error' => 'Hubo un error al cambiar el estado.'], 500);
        }
    }

    /**
     * Elimina una tarea
     */
    public function destroy($tareaId)
    {
        $tarea = Tarea::findOrFail($tareaId);
        $equipo = $tarea->equipo;

        // Verificar que el usuario es admin del equipo
        if (!$equipo->esAdmin(Auth::user())) {
            return back()->with('error', 'Solo los administradores pueden eliminar tareas.');
        }

        try {
            DB::beginTransaction();

            // Si la tarea estaba completada y tenía usuario asignado, restar puntos
            if ($tarea->estado === 'completada' && $tarea->asignado_a) {
                $equipo->usuarios()->updateExistingPivot($tarea->asignado_a, [
                    'puntos' => DB::raw('GREATEST(puntos - ' . $tarea->puntos . ', 0)')
                ]);
            }

            $tarea->delete();

            DB::commit();

            return back()->with('success', 'Tarea eliminada exitosamente! 🗑️');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error al eliminar tarea: ' . $e->getMessage());
            return back()->with('error', 'Hubo un error al eliminar la tarea.');
        }
    }
}