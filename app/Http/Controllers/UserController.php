<?php

namespace App\Http\Controllers;

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
        // return view("layouts.create");
        
        return view("layouts.insert");
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
            
    }
    
    public function show($id)
    {
     
      //este metodo muestra un registro en particular

     $user=user::findOrFail($id);
     return view("layouts.show",compact('user'));
       
    }

    public function edit($id)
    {
        $user=user::findOrFail($id);
        return view("layouts.edit",compact('user'));
    }

}
