<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

// ========================================
// PÁGINA PRINCIPAL (PÚBLICA - Todos pueden verla)
// ========================================
Route::get('/', [UserController::class, 'index'])->name('home');

// ========================================
// AUTENTICACIÓN - GUEST (solo no autenticados)
// ========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// ========================================
// RUTAS PROTEGIDAS (solo autenticados)
// ========================================
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Perfil de usuario
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
});
// 

// Route::get("/read",function()
// {
//     //forma de obtener registros usando el ORM y no SQL puro
//     $user=App\Models\User::all();

//     foreach($user as $users)
//     {
//             echo $users->name;
//             echo "<br>";
//             echo $users->email;
//             echo "<br>";
//             echo $users->password;
//             echo "<br>";
//             echo "<br>";
//    }
// });

// Route::get("/filtro",function()
// {
//     //consulta con filtro
//     $user=App\Models\User::where("id",3)->get();
    
//     return $user;
// });


// Route::get("/insertar",function()
// {
//     //forma de obtener insertar registros usando el ORM y no SQL puro
//     $user=new App\Models\User;

//     $user->name ="Nine rodriguez";
//     $user->email ="rodriguez9@gmail.com";
//     $user->password ="MorettiCasla";
//     $user->equipo_id=1;

//     $user->save();

//     echo "registro insertado";
// });

// Route::get("/update",function()
// {
//     //forma de obtener insertar registros usando el ORM y no SQL puro
//     $user=App\Models\User::find(5);

//     $user->name ="matiassss";
//     $user->email ="maraujo@hotmail.com";
//     $user->password ="123457864";

//     $user->save();

//     echo "registro actualizado";
// });

// // Route::get('/actualizar',function()
// // {
// //     $user=DB::update('update users set email = "ftucci278@alumnos.utn.edu.ar" where id = ?', [1]);

   
// // });

// Route::get('/borrar',function()
// {
//    $user=App\Models\User::find(6);
//    $user->delete();

//    echo "registro borrado";
   
// });

// Route::get('/softdelete',function()
// {
//    $user=App\Models\User::find(3)->delete();

//    echo "registro desactivado";
   
// });

// route::get('/equipo/{id}/users/',function($id)
// {
//    return App\Models\Equipo::find($id)->user;
// });

// route::get('/user/{id}/equipo',function($id)
// {
//     //me retorna el equipo asociado a ese usuario
//    return App\Models\User::find($id)->equipo;
// });

// route::get('/equipo/{id}/usuarios',function($id)
// {
//     $usuarios=App\Models\Equipo::find($id);

//     foreach($usuarios->usuarios as $user)
//     {
//         echo $user->name;
        
//         echo "<br>";
//     }
// });

