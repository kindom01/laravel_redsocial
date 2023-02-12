

<style>

    *{
        font-family: system-ui;
        margin:0;
    }

    p{
        font-size: 17px;
        color: #222;
        text-shadow: 0px 0px 1px #333;
    }

    .imagen{
        display: inline-block;
        width: 55%;
        height: 95%;
        padding: 0.9%;
        float: left;
        box-shadow: 3px 3px 3px #222;
        text-align: center;
    }
    .imagen img{
        max-height: 100%;
        max-width: 100%;
        min-height: 75%;
        min-width: 65%;
    }

    .contenido{
        display: inline-block;
        width: 41.3%;
        height: 96%;
        padding: 0.9%;
        border-left: solid 1px #444;
        overflow: auto;
    }

    #comentarios{
        margin-top: 5%;
        border-top: solid 1px #444;
    }

    textarea{
        resize: none;
        width: 100%;
        height: 15%;
        font-size: 15px;
        padding: 1%;
    }

    #user{
        text-align: left;
    }
    #user img{
        border-radius: 100%;
        box-shadow: 3px 3px 3px #222;
        width: 40px;
        height: 40px;
        display: inline;
    }
    #user h2{
        display: inline;
        margin-left: 2%;
        color: rgb(255, 82, 82);
        text-shadow: 1px 1px 0 #222;
    }
    #user a{
        text-decoration: none;
    }

    #comentar input{
        padding: 1%;
        min-width: 90px;
        font-size: 17px;
        border: solid 1px #555;
        box-shadow: 0px 0px 2px #333;
        margin-top: 1%;
        color: #222;
        text-shadow: 0px 0px 1px #333;
        border-radius: 5px;
        transition: all 400ms;
        cursor: pointer;
    }

    #comentar input:hover{
        color: #ffffff;
        background: #333;
    }

    #comentario{
        margin-top:6%;
        margin-bottom: 2%;
    }
    
    #comentario p{
        margin-top:1%;
        margin-left: 1%;
    }

</style>


<!DOCTYPE html>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comentarios</title>
</head>
<body>
    <?php $__currentLoopData = $informacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="imagen">
            <img src="<?php echo e(URL::asset('images/'.$info->image_path)); ?>">
        </div>

        <div class="contenido">
            <h2>Informacion</h2>
            <div id="descripcion">
                <p><?php echo e($info->description); ?></p>
            </div>

            <div id="comentarios">
                <div id="comentar">
                    <div id="user">
                        <a href="<?php echo e(route('perfil',['id' => Auth::user()['id']])); ?>">
                        <img src="<?php echo e(URL::asset('images/'.Auth::user()['image'])); ?>">
                        <h2>@ <?php echo e(Auth::user()['nick']); ?></h2>
                        </a>
                    </div>
                    <form id="formulario" method="POST" action="">
                        <?php echo e(csrf_field()); ?>

                        <textarea name="comentario" value="Escribe un comentario" id="texto_comentario" required></textarea>
                        <input type="button" value="Enviar" id="registrar" data-id="<?php echo e($info->id); ?>">
                    </form>         
                </div>
                
                <div id="comentarios">
                    <h2>Comentarios: </h2>

                    <div id="comentario_resiente">
                    </div>

                    <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="comentario">
                            <div id="user">
                                <a href="<?php echo e(route('perfil',['id' => $comentario->user_id])); ?>">
                                <img src="<?php echo e(URL::asset('images/'.$comentario->image)); ?>">
                                <h2>@ <?php echo e($comentario->nick); ?></h2>
                                </a>
                            </div>
                            <p><?php echo e($comentario->content); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    <?php
        $contenido = "<div id='comentario'>"
                        ."<div id='user'>"
                            ."<a href='".route('perfil',['id' => Auth::user()['id']])."'>"
                                ."<img src='".URL::asset('images/'.Auth::user()['image'])."'>"
                                 ."<h2>@ ".Auth::user()['nick']."</h2>"
                            ."</a>"
                            ."</div>"
    ?>
    <script>
        registrar.addEventListener("click",() => {
            var url = "http://localhost/master_de_php/proyecto_laravel/proyecto/public/inicio/comentarios_upload/<?= $info->id ;?>";
            fetch(url,{
                method: "POST",
                body: new FormData(formulario)
            }).then(response => {
                var text = texto_comentario.value;
                var comentario = "<?= $contenido ;?><p>"+text+"</p></div>";
                comentario_resiente.innerHTML = comentario; 
            });
        });
    
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</body>
</html>
<?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/user/comentarios.blade.php ENDPATH**/ ?>