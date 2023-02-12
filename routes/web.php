<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* inicio_no_sesion */
Route::get('/', function () {
    return view('welcome');
})->middleware('offSesion');

/* logueo */
Route::group(['prefix'=>'login'],function(){
    Route::get('', [App\Http\Controllers\LoginController::class,'index'])->middleware('offSesion');
    Route::post('verify', [App\Http\Controllers\LoginController::class,'verify'])->middleware('offSesion');
})->middleware('offSesion');


/* register */
Route::group(['prefix'=>'register'],function(){
    Route::get('', [App\Http\Controllers\RegisterController::class,'index'])->middleware('offSesion');
    Route::post('save', [App\Http\Controllers\RegisterController::class,'registro'])->middleware('registerverify');
})->middleware('offSesion');

/* inicio_con_sesion */
Route::group(['prefix'=>'inicio'],function(){
    
    /* inicio */
    Route::get('', [App\Http\Controllers\UsuarioController::class,'index'])->name('inicio')->middleware('onSesion');
    Route::get('/logout', [App\Http\Controllers\UsuarioController::class,'logout'])->name('logout')->middleware('onSesion');
    Route::get('/perfil/{id}', [App\Http\Controllers\UsuarioController::class,'perfil'])->name('perfil')->middleware('onSesion');
    
    /* cambiar foto de perfil */
    Route::get('/update', [App\Http\Controllers\UsuarioController::class,'update_img'])->name('update_img')->middleware('onSesion');
    Route::post('/update_save', [App\Http\Controllers\UsuarioController::class,'update_img_save'])->name('update_img_save')->middleware('onSesion');
    
    /* subir publicacion */
    Route::get('/upload', [App\Http\Controllers\UsuarioController::class,'upload'])->name('upload')->middleware('onSesion');
    Route::post('/upload_save', [App\Http\Controllers\UsuarioController::class,'upload_save'])->name('upload_save')->middleware('onSesion');
    
    /* comentarios */
    Route::get('/comentarios/{id}', [App\Http\Controllers\UsuarioController::class,'comentarios'])->name('comentarios')->middleware('onSesion');
    Route::post('/comentarios_upload/{id}', [App\Http\Controllers\UsuarioController::class,'comentarios_upload'])->name('comentarios_upload')->middleware('onSesion');
    
    /* like */
    Route::get('/like/{id}', [App\Http\Controllers\UsuarioController::class,'like'])->name('like')->middleware('onSesion');
    Route::get('/dislike/{id}', [App\Http\Controllers\UsuarioController::class,'dislike'])->name('dislike')->middleware('onSesion');

});
