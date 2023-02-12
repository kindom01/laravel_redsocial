<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //inicio
    public function index(){
        $publicaciones = DB::table('users')
            ->join('images','users.id','=','images.user_id')
            ->orderBy('images.id','desc')
            ->get();


        return view('user.inicio',[
            'publicaciones' => $publicaciones,
        ]);
    }
    
    public function logout(){
        Auth::guard('web')->logout();

        return redirect("/");
    }

    public function perfil($id){

        $informacion = DB::table('users')
            ->where('id', $id)
            ->get();

        $publicaciones = DB::table('images')
            ->where('user_id', $id)
            ->get();


        return view('user.perfil',[
            'publicaciones' => $publicaciones,
            'informacion' => $informacion,
        ]);
    }

    public function comentarios($id){

        $informacion = DB::table('images')
            ->where('id',$id)
            ->get();

        $comentarios = DB::table('comments')
            ->where('image_id',$id)
            ->join('users','comments.user_id','=','users.id')
            ->orderBy('comments.id','desc')
            ->get();

        // var_dump($comentarios);
        // die();

        return view('user.comentarios',[
            'informacion' => $informacion,
            'comentarios' => $comentarios,
        ]);
    }
    
    
    /* actualizar imagen de perfil */
    public function update_img(){
        return view('user.update');
    }
    
    public function update_img_save(Request $request){

        $validacion = $request->validate([
            'image' => ['required'],
        ]);

        /* get id */
        $id = Auth::user()['id'];

        /* subir imagen */
        $file = $request->file('image');
        $file_name = time()."-".$file->getClientOriginalName();
        $dir = "images/";

        $uploadSuccess = $request->file('image')->move($dir, $file_name);

        /* cifrar clave */

        DB::statement("UPDATE users SET image =? WHERE id =? ",[
            $file_name,
            $id,
        ]);
        
        return redirect('inicio/perfil');
        
    }
    

    /* subir publicacion */
    public function upload(){
        return view('user.upload');
    }
    
    public function upload_save(Request $request){

        $validacion = $request->validate([
            'image' => ['required'],
            'descripcion' => ['required'],
        ]);

        /* get id */
        $id = Auth::user()['id'];

        /* descripcion */
        $descripcion = $request['descripcion'];

        /* subir imagen */
        $file = $request->file('image');
        $file_name = time()."-".$file->getClientOriginalName();
        $dir = "images/";

        $uploadSuccess = $request->file('image')->move($dir, $file_name);

        /* cifrar clave */

        DB::statement("INSERT INTO images VALUES(NULL,?,?,?,?,?)",[
            $id,
            $file_name,
            $descripcion,
            now(),
            now(),
        ]);

        return redirect('inicio');

    }


    /* like */
    public function like($image_id){
        $user_id = Auth::user()['id'];

        DB::statement("INSERT INTO likes VALUES(NULL,?,?,?,?)",[
            $user_id,
            $image_id,
            now(),
            now(),
        ]);
        
        return redirect('inicio');
    }
    
    public function dislike($image_id){
        $user_id = Auth::user()['id'];

        DB::table('likes')
            ->where('image_id',$image_id)
            ->where('user_id',$user_id)
            ->delete();
        
        return redirect('inicio');
    }
    
    /* comentarios_upload */
    public function comentarios_upload(Request $request, $id){
        $user_id = Auth::user()['id'];
        $descripcion = $request['comentario'];

        DB::statement("INSERT INTO comments VALUES(NULL,?,?,?,?,?)",[
            $user_id,
            $id,
            $descripcion,
            now(),
            now(),
        ]);
    
        return redirect('inicio/comentarios/'.$id);
    }
}
