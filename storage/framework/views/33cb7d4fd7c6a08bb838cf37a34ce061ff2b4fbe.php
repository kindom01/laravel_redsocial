<!DOCTYPE html>
<html lang="en">

<style>

    *{
        font-family: system-ui;
        text-align: center;
        margin:0;
    }

    body{
        background: rgb(175, 175, 175);
    }

    h1{
        color: rgb(158, 9, 9);
        font-size: 50px;
        text-shadow: 0px 0px 1px rgb(59, 59, 59);
    }

    .contenido{
        min-height: 517px;
    }

    .titulo{
        width: 30%;
        margin: 0 auto;
        margin-top: 8%;
        background: rgb(250, 250, 250);
        padding: 4%;
        border-radius: 8px;
        box-shadow: 3px 3px 3px #333;
    }

    a{
        text-decoration: none;
        color: #555;
        text-shadow: 0px 0px 1px rgb(102, 102, 102);
        transition: all 300ms;
    }

    a:hover{
        text-decoration: none;
        color: rgb(151, 48, 48);
    }
    
    h2{
        margin-top: 25px;
    }

    h3{
        margin-top: 25px;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <div class="contenido">
        <div class="titulo">
            <h1>¡Bienvenido!</h1>
            <h2>Conectate con el mundo</h2>
            <h3><a href="<?php echo e(action([App\Http\Controllers\LoginController::class,'index'])); ?>">Logueate</a></h3>
            <h3><a href="<?php echo e(action([App\Http\Controllers\RegisterController::class,'index'])); ?>">Registrate</a></h3>
        </div>
    </div>
</body>
<?php require_once "../resources/views/includes/footer.blade.php";?>
</html><?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/welcome.blade.php ENDPATH**/ ?>