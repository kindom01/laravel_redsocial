<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/app.css">
    <title>Registro</title>
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h1>Registro</h1>

            <form method="POST" action="{{action([App\Http\Controllers\RegisterController::class,'registro'])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required/>
            @error('nombre')
                <div class="alerta error">{{$message}}</div>
            @enderror
                
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" required/>
            @error('apellidos')
                <div class="alerta error">{{$message}}</div>
            @enderror
                
                <label for="nickname">Nick:</label>
                <input type="text" name="nick" required/>
            @error('nick')
                <div class="alerta error">{{$message}}</div>
            @enderror

                <label for="correo">Correo:</label>
                <input type="email" name="correo" required/>
            @error('correo')
                <div class="alerta error">{{$message}}</div>
            @enderror
                
                <label for="password">Contraseña:</label>
                <input type="password" name="contraseña" required/>
            @error('password')
                <div class="alerta error">{{$message}}</div>
            @enderror
                
                <label for="imagen">Foto de perfil:</label>
                <input type="file" name="imagen" accept="image/*">
        
                <input type="submit" value="Enviar">
            </form>
            <ul>
                <li><a href="{{action([App\Http\Controllers\LoginController::class,'index'])}}">¿Ya tienes cuenta? logueate</a></li>
            </ul>
        </div>
    </div>
    <?php
        require_once "../resources/views/includes/footer.blade.php";
    ?>
</body>
</html>