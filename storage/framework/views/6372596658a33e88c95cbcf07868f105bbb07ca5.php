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
        width: 84.677%;
        height: 93%;
        overflow: auto;
    }
    
    .contenido h1{
        text-align: center;
        color: #333;
        text-shadow: 1px 1px 0 #222;
    }

    #publicacion{
        width: 38%;
        text-align: center;
        margin: 0 auto;
        margin-top: 3%;
        margin-bottom: 1%;
        padding: 3%;
    }

    #publicacion a{
        text-decoration: none;
    }

    #publicacion img{
        max-width: 435px;
        max-height: 451px;
    }

    #imagen{
        width: 435px;
        height: 451px;
        box-shadow: 0px 0px 2px #222;
    }

    #publicacion p{
        text-align: justify;
        color: rgb(70, 70, 70);
        text-shadow: 0px 0px 1px rgb(59, 59, 59);
    }
    
    .boton{
        display: inline-block;
        padding: 1%;
        min-width: 90px;
        font-size: 18px;
        border: solid 1px #555;
        box-shadow: 0px 0px 2px #333;
        margin-left: 6%;
        margin-right: 6%;
        margin-top: 4%;
        color: #222;
        text-shadow: 0px 0px 1px #333;
        border-radius: 5px;
        transition: all 400ms;
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

    #cantidades{
        box-shadow: 0px 0px 2px #222;
    }
    #cantidades p{
        margin-left: 2%;
        color: rgb(37, 37, 37);
        text-shadow: 1px 1px 0 #222;
    }

    /* botones */
    .boton:hover{
        color: #ffffff;
        background: #333;
    }
    
    .boton.like{
        color: #ffffff;
        background: rgb(238, 74, 74);
        transition: all 400ms;
    }

    .boton.dislike{
        color: #222;
        transition: all 400ms;
    }
    
    .boton.like:hover,.boton.dislike:hover{
        color: #ffffff;
        background: rgb(211, 76, 76);
    }

</style>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    window.addEventListener("load", function(){
	
    var url = "http://localhost/master_de_php/proyecto_laravel/proyecto/public";

	$('.like').css('cursor', 'pointer');
	$('.dislike').css('cursor', 'pointer');
	
	// Botón de like
	function like(){
		$('.dislike').unbind('click').click(function(){
			console.log('like');
			$(this).addClass('like').removeClass('dislike');
						
            $.ajax({
				url: url+'/inicio/like/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
                        console.log('Error al dar like');
					}else{
						console.log('Has dado like a la publicacion');
					}
				}
			});

			dislike();
		});
	}
	like();
	
	// Botón de dislike
	function dislike(){
		$('.like').unbind('click').click(function(){
			console.log('dislike');
			$(this).addClass('dislike').removeClass('like');
			
			$.ajax({
				url: url+'/inicio/dislike/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Error al dar like');
                    }else{
						console.log('Has dado like a la publicacion');
					}
				}
			});

			like();
		});
	}
	dislike();
});

</script>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
    <div class="contenedor">

        <?php echo $__env->make('includes.lateral_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="contenido">
            <h1>Lo mas reciente</h1>

            <?php $__currentLoopData = $publicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="publicacion">
                    <div id="user">
                        <a href="<?php echo e(route('perfil',['id' => $publicacion->user_id])); ?>">
                        <img src="<?php echo e(URL::asset('images/'.$publicacion->image)); ?>">
                        <h2>@ <?php echo e($publicacion->nick); ?></h2>
                        </a>
                    </div>
                    <div id="imagen">
                        <img src="<?php echo e(URL::asset('images/'.$publicacion->image_path)); ?>">
                    </div>
                    <div id="cantidades">


                        
                        <?php
                           $comentarios = DB::table('comments')
                                        ->where('image_id',$publicacion->id)
                                        ->count();
                           
                            $likes = DB::table('likes')
                                        ->where('image_id',$publicacion->id)
                                        ->count();

                            $my_like = DB::table('likes')
                                        ->where('image_id',$publicacion->id)
                                        ->where('user_id',Auth::user()['id'])
                                        ->count();
                        ?>

                        <p>LIKES: <?php echo e($likes); ?></p>
                        <p>COMENTARIOS: <?php echo e($comentarios); ?></p>
                    </div>
                    <p><?php echo e($publicacion->description); ?>.</p>

                    <?php if($my_like == 1): ?>
                    <button class="boton like" data-id = "<?php echo e($publicacion->id); ?>">Like</button>
                    <?php else: ?>
                    <button class="boton dislike" data-id = "<?php echo e($publicacion->id); ?>">Like</button>
                    <?php endif; ?>

                    <a href="<?php echo e(route('comentarios',['id' => $publicacion->id])); ?>"><div class="boton">Comentar</div></a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</body>
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>




<?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/user/inicio.blade.php ENDPATH**/ ?>