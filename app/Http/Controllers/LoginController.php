<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function verify(Request $request){

        $credenciales = $request->validate([
            'email' => ['required','string','email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credenciales)) {
            # code...
            return redirect("/inicio");
        }
        
        return redirect("/login")->withErrors([
            "llenado" => "Los datos que ingresaste son erroneos"
        ]);
    }
}
