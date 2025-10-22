<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUsersRequest; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view("layouts.index", compact('users'));
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

}
