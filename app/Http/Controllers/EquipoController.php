<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EquipoController extends Controller
{
    /**
     * Constructor - requiere autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el dashboard con todos los equipos del usuario
     */
    public function index()
    {
        $user = Auth::user();
        
        // Obtener equipos del usuario con información adicional
        $equipos = $user->equipos()
            ->with(['usuarios', 'creador'])
            ->withCount('usuarios as total_miembros')
            ->get()
            ->map(function ($equipo) use ($user) {

                 $tareasNuevasSinVer = $equipo->tareas()
                ->where('asignado_a', $user->id)
                ->where('vista_por_asignado', false)
                ->count();

                return [
                    'id' => $equipo->id,
                    'nombre' => $equipo->nombre,
                    'descripcion' => $equipo->descripcion,
                    'icono' => $equipo->icono,
                    'color' => $equipo->color,
                    'imagen_url' => $equipo->imagen_url, // ✅ AGREGADO
                    'rol' => $equipo->pivot->rol,
                    'es_admin' => $equipo->pivot->rol === 'admin',
                    'favorito' => $equipo->pivot->favorito,
                    'puntos' => $equipo->pivot->puntos,
                    'total_miembros' => $equipo->total_miembros,
                    'total_tareas' => $equipo->cantidadTareas(),
                    'tareas_completadas' => $equipo->tareasCompletadas(),
                    'tareas_nuevas' => $tareasNuevasSinVer,
                    'miembros' => $equipo->usuarios->take(3)->map(function ($usuario) {
                        return [
                            'iniciales' => $usuario->initials,
                            'nombre' => $usuario->full_name,
                            'avatar_url' => $usuario->ruta_img 
                            ? asset($usuario->ruta_img) 
                            : null,
                        ];
                    }),
                    'mas_miembros' => max(0, $equipo->total_miembros - 3),
                ];
            });

        return view('dashboard', compact('equipos'));
    }

    /**
     * Muestra el formulario para crear un equipo
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Almacena un nuevo equipo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'icono' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:7',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ AGREGADO
        ], [
            'nombre.required' => 'El nombre del equipo es obligatorio',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres',
            'descripcion.max' => 'La descripción no puede tener más de 1000 caracteres',
            'imagen.image' => 'El archivo debe ser una imagen',
            'imagen.mimes' => 'La imagen debe ser formato: jpeg, png, jpg o gif',
            'imagen.max' => 'La imagen no puede pesar más de 2MB',
        ]);

        try {
            DB::beginTransaction();

            // Procesar imagen si existe
            $imagenPath = null;
            if ($request->hasFile('imagen')) {
                $imagenPath = $request->file('imagen')->store('equipos', 'public');
            }

            // Crear el equipo
            $equipo = Equipo::create([
                'nombre' => $validated['nombre'],
                'descripcion' => $validated['descripcion'] ?? null,
                'icono' => $validated['icono'] ?? 'bi-people',
                'color' => $validated['color'] ?? '#667eea',
                'imagen' => $imagenPath, // ✅ AGREGADO
                'codigo_invitacion' => Equipo::generarCodigoInvitacion(),
                'creador_id' => Auth::id(),
                'activo' => true,
            ]);

            // Agregar al creador como admin
            $equipo->agregarUsuario(Auth::user(), 'admin');

            DB::commit();

            return redirect()
                ->route('equipos.show', $equipo->id)
                ->with('success', '¡Equipo creado exitosamente! 🎉');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log del error para debugging
            \Log::error('Error al crear equipo: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->with('error', 'Hubo un error al crear el equipo: ' . $e->getMessage());
        }
    }

    /**
     * Muestra un equipo específico
     */
    public function show($id)
    {
        $equipo = Equipo::with(['usuarios', 'creador', 'tareas.asignado'])
            ->withCount('usuarios as total_miembros')
            ->findOrFail($id);

        // Verificar que el usuario pertenece al equipo
        if (!$equipo->tieneUsuario(Auth::user())) {
            abort(403, 'No tienes permiso para ver este equipo.');
        }

        $user = Auth::user();
        $esAdmin = $equipo->esAdmin($user);

        // Obtener información del usuario en el equipo
        $miembroActual = $equipo->usuarios()
            ->where('user_id', $user->id)
            ->first();

        $rolUsuario = $miembroActual->pivot->rol;
        $puntosUsuario = $miembroActual->pivot->puntos;

        // Obtener miembros con su información y cantidad de tareas
        $miembros = $equipo->usuarios()
            ->orderByRaw("CASE WHEN equipo_usuario.rol = 'admin' THEN 0 ELSE 1 END")
            ->orderByDesc('equipo_usuario.puntos')
            ->get()
            ->map(function ($usuario) use ($equipo) {
                $tareasAsignadas = $equipo->tareas()
                    ->where('asignado_a', $usuario->id)
                    ->count();
                
                $tareasCompletadas = $equipo->tareas()
                    ->where('asignado_a', $usuario->id)
                    ->where('estado', 'completada')
                    ->count();

                $tareasActivas = $equipo->tareas()
                    ->where('asignado_a', $usuario->id)
                    ->whereIn('estado', ['por_hacer', 'en_progreso'])
                    ->count();

                return [
                    'id' => $usuario->id,
                    'nombre' => $usuario->full_name,
                    'username' => $usuario->username,
                    'email' => $usuario->email,
                    'avatar_url' => $usuario->avatar_url,
                    'iniciales' => $usuario->initials,
                    'rol' => $usuario->pivot->rol,
                    'puntos' => $usuario->pivot->puntos,
                    'es_admin' => $usuario->pivot->rol === 'admin',
                    'tareas_asignadas' => $tareasAsignadas,
                    'tareas_completadas' => $tareasCompletadas,
                    'tareas_activas' => $tareasActivas,
                ];
            });

        // Filtrar tareas según rol del usuario
        if ($esAdmin) {
        // Admin ve TODAS las tareas
        $tareasPorHacer = $equipo->tareas()
            ->with('asignado')
            ->where('estado', 'por_hacer')
            ->orderBy('prioridad', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $tareasEnProgreso = $equipo->tareas()
            ->with('asignado')
            ->where('estado', 'en_progreso')
            ->orderBy('prioridad', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $tareasCompletadas = $equipo->tareas()
            ->with('asignado')
            ->where('estado', 'completada')
            ->orderBy('updated_at', 'desc')
            ->get();
    } else {
        // Miembro solo ve SUS tareas
        $tareasPorHacer = $equipo->tareas()
            ->with('asignado')
            ->where('asignado_a', Auth::id())
            ->where('estado', 'por_hacer')
            ->orderBy('prioridad', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $tareasEnProgreso = $equipo->tareas()
            ->with('asignado')
            ->where('asignado_a', Auth::id())
            ->where('estado', 'en_progreso')
            ->orderBy('prioridad', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $tareasCompletadas = $equipo->tareas()
            ->with('asignado')
            ->where('asignado_a', Auth::id())
            ->where('estado', 'completada')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

        return view('equipos.show', compact(
            'equipo',
            'esAdmin',
            'rolUsuario',
            'puntosUsuario',
            'miembros',
            'tareasPorHacer',
            'tareasEnProgreso',
            'tareasCompletadas'
        ));
    }

    /**
     * Muestra el formulario para unirse a un equipo
     */
    public function showJoinForm()
    {
        return view('equipos.join');
    }

    /**
     * Unirse a un equipo mediante código de invitación
     */
    public function join(Request $request)
    {
        $validated = $request->validate([
            'codigo_invitacion' => 'required|string|size:8|exists:equipos,codigo_invitacion',
        ], [
            'codigo_invitacion.required' => 'El código de invitación es obligatorio',
            'codigo_invitacion.size' => 'El código debe tener exactamente 8 caracteres',
            'codigo_invitacion.exists' => 'El código de invitación no es válido',
        ]);

        $codigo = strtoupper($validated['codigo_invitacion']);
        $equipo = Equipo::where('codigo_invitacion', $codigo)->firstOrFail();

        // Verificar si el usuario ya pertenece al equipo
        if ($equipo->tieneUsuario(Auth::user())) {
            return redirect()
                ->route('equipos.show', $equipo->id)
                ->with('info', 'Ya eres miembro de este equipo.');
        }

        try {
            // Agregar al usuario como miembro
            $equipo->agregarUsuario(Auth::user(), 'miembro');

            return redirect()
                ->route('equipos.show', $equipo->id)
                ->with('success', '¡Te has unido al equipo exitosamente! 🎉');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Hubo un error al unirse al equipo. Por favor, intenta nuevamente.');
        }
    }

    /**
     * Muestra el formulario de edición
     */
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);

        // Verificar que el usuario es admin
        if (!$equipo->esAdmin(Auth::user())) {
            abort(403, 'No tienes permiso para editar este equipo.');
        }

        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Actualiza un equipo
     */
    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        // Verificar que el usuario es admin
        if (!$equipo->esAdmin(Auth::user())) {
            abort(403, 'No tienes permiso para editar este equipo.');
        }

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'icono' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:7',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ AGREGADO
        ], [
            'nombre.required' => 'El nombre del equipo es obligatorio',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres',
            'descripcion.max' => 'La descripción no puede tener más de 1000 caracteres',
            'imagen.image' => 'El archivo debe ser una imagen',
            'imagen.mimes' => 'La imagen debe ser formato: jpeg, png, jpg o gif',
            'imagen.max' => 'La imagen no puede pesar más de 2MB',
        ]);

        try {
            // Procesar nueva imagen si existe
            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior
                $equipo->eliminarImagenAnterior();
                
                // Guardar nueva imagen
                $validated['imagen'] = $request->file('imagen')->store('equipos', 'public');
            }

            $equipo->update($validated);

            return redirect()
                ->route('equipos.show', $equipo->id)
                ->with('success', 'Equipo actualizado exitosamente.');

        } catch (\Exception $e) {
            \Log::error('Error al actualizar equipo: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->with('error', 'Hubo un error al actualizar el equipo.');
        }
    }

    /**
     * Elimina un equipo (solo el creador puede hacerlo)
     */
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);

        // Solo el creador puede eliminar el equipo
        if ($equipo->creador_id !== Auth::id()) {
            abort(403, 'Solo el creador del equipo puede eliminarlo.');
        }

        try {
            $equipo->delete();

            return redirect()
                ->route('dashboard')
                ->with('success', 'Equipo eliminado exitosamente.');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Hubo un error al eliminar el equipo.');
        }
    }

    /**
     * Salir de un equipo
     */
    public function leave($id)
    {
        $equipo = Equipo::findOrFail($id);
        $user = Auth::user();

        // Verificar que el usuario pertenece al equipo
        if (!$equipo->tieneUsuario($user)) {
            abort(403, 'No perteneces a este equipo.');
        }

        // El creador no puede salir de su propio equipo
        if ($equipo->creador_id === $user->id) {
            return back()->with('error', 'Como creador, no puedes salir del equipo. Debes eliminarlo o transferir la propiedad.');
        }

        // Si es admin, verificar que haya otro admin
        if ($equipo->esAdmin($user)) {
            $cantidadAdmins = $equipo->usuarios()
                ->wherePivot('rol', 'admin')
                ->count();
            
            if ($cantidadAdmins <= 1) {
                return back()->with('error', '⚠️ Eres el único administrador. Debes nombrar a otro administrador antes de salir del equipo.');
            }
        }

        try {
            $equipo->removerUsuario($user);

            return redirect()
                ->route('dashboard')
                ->with('success', 'Has salido del equipo exitosamente.');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Hubo un error al salir del equipo.');
        }
    }

    /**
     * Remover un miembro del equipo (solo admins)
     */
    public function removeMember($equipoId, $userId)
    {
        $equipo = Equipo::findOrFail($equipoId);
        $user = User::findOrFail($userId);

        // Verificar que el usuario actual es admin
        if (!$equipo->esAdmin(Auth::user())) {
            abort(403, 'No tienes permiso para remover miembros.');
        }

        // No se puede remover al creador
        if ($equipo->creador_id === $userId) {
            return back()->with('error', 'No puedes remover al creador del equipo.');
        }

        // No se puede remover a sí mismo
        if (Auth::id() === $userId) {
            return back()->with('error', 'Usa la opción "Salir del equipo" para abandonar el equipo.');
        }

        try {
            $equipo->removerUsuario($user);

            return back()->with('success', 'Miembro removido exitosamente.');

        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al remover al miembro.');
        }
    }

    /**
     * Cambiar el rol de un miembro (solo admins)
     */
    public function changeRole($equipoId, $userId, Request $request)
    {
        $equipo = Equipo::findOrFail($equipoId);
        $user = User::findOrFail($userId);

        // Verificar que el usuario actual es admin
        if (!$equipo->esAdmin(Auth::user())) {
            abort(403, 'No tienes permiso para cambiar roles.');
        }

        $validated = $request->validate([
            'rol' => 'required|in:admin,miembro',
        ]);

        // No se puede cambiar el rol del creador
        if ($equipo->creador_id === $userId) {
            return back()->with('error', 'No puedes cambiar el rol del creador del equipo.');
        }

        try {
            $equipo->usuarios()->updateExistingPivot($userId, [
                'rol' => $validated['rol']
            ]);

            return back()->with('success', 'Rol actualizado exitosamente.');

        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al cambiar el rol.');
        }
    }
}