<!-- styles -->

<style>

    body{
        margin-top: 1%;       
    }

    .contenedor{
        margin-bottom: 1%;
        overflow: hidden;
    }

    .contenido{
        display: inline-block;
        background: rgb(255, 255, 255);
        width: 84.677%;
        height: 93%;
    }

    form{
        margin-top: 20%;
        margin-left: 27%;
    }
    input{
        display: block;
        padding: 1%;
        min-width: 90px;
        font-size: 15px;
        border: solid 1px #555;
        box-shadow: 0px 0px 2px #333;
        margin-left: 6%;
        margin-right: 6%;
        margin-top: 2%;
        color: #222;
        text-shadow: 0px 0px 1px #333;
        border-radius: 5px;
        cursor: pointer;
        transition: all 400ms;
    }

    input:hover{
        color: #ffffff;
        background: #333;
    }

    input[type="file"]{
        border: none;
        font-size: 20px;
    }

    .contenido h1{
        text-align: center;
        color: #333;
        text-shadow: 1px 1px 0 #222;
    }

    .alerta{
    background-color: rgb(30, 167, 30);
    color: white;
    width: 30%;
    font-size: 15px;
    margin-top: 5px;
    border-radius: 4px;
    }

    .alerta.error{
        background-color: red;
    }

</style>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="sytlesheet" href="../resources/css/sesion.css">
    <title>Perfil</title>
</head>
<body>
    <div class="contenedor">

        <?php require_once "../resources/views/includes/lateral_bar.blade.php";?>

        <div class="contenido">
            <h1>Cambia tu foto de perfil</h1>
            <form method="POST" action="<?php echo e(route('update_img_save')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alerta error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="file" name="image" accept="image/*" required>
                <input type="submit" value="Aceptar">
            </form>
        </div>
    </div>
</body>
    <?php require_once "../resources/views/includes/footer.blade.php";?>
</html>

<?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/user/update.blade.php ENDPATH**/ ?>