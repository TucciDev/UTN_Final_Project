<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUsersRequest; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view("welcome", compact('users'));
    }

    
    public function create()
    {
        return view("layouts.insert");
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     *
     * @param  \App\Http\Requests\createUsersRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(createUsersRequest $request) 
    {
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

       
        return redirect()->route('home')->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id)
    {

     $user=user::findOrFail($id);
     return view("layouts.show",compact('user'));
       
    }

    public function edit($id)
    {
        $user=user::findOrFail($id);
        return view("layouts.edit",compact('user'));
    }

    public function perfil()
    {
        $user = Auth::user();
        $equipos = [];
        return view('perfil', compact('user', 'equipos'));
    }

    public function destroyPerfil(Request $request)
    {
    $user = Auth::user();

    Auth::logout(); // cerrar la sesión antes de eliminar

    $user->delete(); // eliminar el usuario de la base de datos

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }

    public function updatePerfil(Request $request)
    {
        $user = Auth::user();

        if ($request->has('delete_avatar')) {
            if ($user->ruta_img) {
                Storage::disk('public')->delete($user->ruta_img);
                $user->ruta_img = null;
                $user->save();
            }
        return redirect()->route('perfil')->with('success', 'Foto de perfil eliminada correctamente.');
    }

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'ruta_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->has('delete_avatar')) {
            if ($user->ruta_img) {
                Storage::disk('public')->delete($user->ruta_img);
            }
        }

        if ($request->hasFile('ruta_img')) {
            // Borra el avatar anterior si existe
            if ($user->ruta_img) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $user->ruta_img));
            }

            // Almacena el nuevo avatar
            $path = $request->file('ruta_img')->store('avatars', 'public');
            $user->ruta_img = '/storage/' . $path;
        }

        $user->nombre = $request->name;
        $user->apellido = $request->surname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'], // valida la contraseña actual
            'password' => ['required', 'string', 'confirmed', Password::min(8)], // valida la nueva contraseña
        ]);

        // Guardar la nueva contraseña
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('perfil')->with('success', 'Contraseña actualizada correctamente.');
    }
}