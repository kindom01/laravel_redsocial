<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }

    public function registro(Request $request){

        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $nick = $request->input('nick');
        $correo = $request->input('correo');
        $contraseña = $request->input('contraseña');
        $token = $request->input('_token');

        /* subir imagen */
        $file = $request->file('imagen');
        $file_name = time()."-".$file->getClientOriginalName();
        $dir = "images/";

        $uploadSuccess = $request->file('imagen')->move($dir, $file_name);

        /* cifrar clave */
        $password_cifrado = password_hash($contraseña, PASSWORD_BCRYPT, ['cost'=>4]);

        DB::statement("INSERT INTO users VALUES(NULL,'usuario',?,?,?,?,?,?,?,?,?)",[
            $nombre,
            $apellidos,
            $nick,
            $correo,
            $password_cifrado,
            $file_name,
            now(),
            now(),
            $token,
        ]);

        // $usuario = DB::table('users')->insert(array(
        //     'id' => NULL,
        //     'role' => "usuario",
        //     'name' => $nombre,
        //     'surname' => $apellidos,
        //     'nick' => $nick,
        //     'email' => $correo,
        //     'password' => $contraseña,
        //     'image' => $imagen,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'remember_token' => $token,
        // ));
        
        return redirect('/login');
    }
}
