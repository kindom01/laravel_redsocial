<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class registerverify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $filtro = true;

        $name = $request->input('nombre');
        $surname = $request->input('apellidos');
        $nick = $request->input('nick');
        $email = $request->input('correo');
        $password = $request->input('contraseña');
        $image = $request->input('imagen');

        $nombre_error = '';
        $apellidos_error = '';
        $nickname_error = '';
        $correo_error = '';
        $constraseña_error = '';

        if (empty($name) || $name == null || is_numeric($name)) {
            # code...

            $filtro = false;
            $nombre_error = "Error al ingresar el nombre, este no debe de contener numeros";
        }

        if (empty($surname) || $surname == null || is_numeric($surname)) {
            # code...

            $filtro = false;
            $apellidos_error = "Error al ingresar el apellidos, este no debe de contener numeros";
        }
        
        if (empty($nick) || $nick == null) {
            # code...

            $filtro = false;
            $nickname_error = "Error al ingresar el nickname";
        }
        
        if (empty($email) || $email == null) {
            # code...

            $filtro = false;
            $correo_error = "Error al ingresar el correo";
        }
        
        if (empty($password) || $password == null) {
            # code...

            $filtro = false;
            $constraseña_error = "Error al ingresar la constraseña";
        }


        /* redirecciones */
        if ($filtro == false) {
            # code...


            return redirect("/register")->withErrors([
                "nombre" => $nombre_error,
                "apellidos" => $apellidos_error,
                "nick" => $nickname_error,
                "correo" => $correo_error,
                "password" => $constraseña_error
            ]);
        }

        


        return $next($request);
    }
}
