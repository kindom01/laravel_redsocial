<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/app.css">
    <title>Login</title>
</head>
<body>
    <div class="contenido">
        <div class="formulario">
            <h1>Login</h1>
            @error('llenado')
                <div class="alerta error">{{$message}}</div>
            @enderror
            <form method="POST" action="{{action([App\Http\Controllers\LoginController::class,'verify'])}}">
                {{ csrf_field() }}
                <label for="correo">Correo:</label>
                <input type="email" name="email" required/>
                
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required/>
        
                <input type="submit" value="Enviar">
            </form>
            <ul>
                <li><a href="{{action([App\Http\Controllers\RegisterController::class,'index'])}}">¿No tienes cuenta? registrate</a></li>
            </ul>
        </div>
    </div>
</body>
<?php
    require_once "../resources/views/includes/footer.blade.php";
?>
</html>