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
            <?php $__errorArgs = ['llenado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alerta error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <form method="POST" action="<?php echo e(action([App\Http\Controllers\LoginController::class,'verify'])); ?>">
                <?php echo e(csrf_field()); ?>

                <label for="correo">Correo:</label>
                <input type="email" name="email" required/>
                
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required/>
        
                <input type="submit" value="Enviar">
            </form>
            <ul>
                <li><a href="<?php echo e(action([App\Http\Controllers\RegisterController::class,'index'])); ?>">¿No tienes cuenta? registrate</a></li>
            </ul>
        </div>
    </div>
</body>
<?php
    require_once "../resources/views/includes/footer.blade.php";
?>
</html><?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/login.blade.php ENDPATH**/ ?>