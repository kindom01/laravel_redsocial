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

            <form method="POST" action="<?php echo e(action([App\Http\Controllers\RegisterController::class,'registro'])); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required/>
            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alerta error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" required/>
            <?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alerta error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="nickname">Nick:</label>
                <input type="text" name="nick" required/>
            <?php $__errorArgs = ['nick'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alerta error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <label for="correo">Correo:</label>
                <input type="email" name="correo" required/>
            <?php $__errorArgs = ['correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alerta error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="password">Contraseña:</label>
                <input type="password" name="contraseña" required/>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alerta error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <label for="imagen">Foto de perfil:</label>
                <input type="file" name="imagen" accept="image/*">
        
                <input type="submit" value="Enviar">
            </form>
            <ul>
                <li><a href="<?php echo e(action([App\Http\Controllers\LoginController::class,'index'])); ?>">¿Ya tienes cuenta? logueate</a></li>
            </ul>
        </div>
    </div>
    <?php
        require_once "../resources/views/includes/footer.blade.php";
    ?>
</body>
</html><?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/register.blade.php ENDPATH**/ ?>