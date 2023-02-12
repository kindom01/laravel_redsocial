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
        overflow: auto;
    }

    #usuario_info{
        width: 13%;
        margin: 0 auto;
        text-align: center;
    }

    #usuario_info img{
        border-radius: 100%;
        box-shadow: 3px 3px 3px #222;
        width: 140px;
        height: 140px;
    }
    
    #usuario_info h2{
        color: rgb(255, 82, 82);
        text-shadow: 1px 1px 0 #222;
    }
    
    #usuario_info p{
        color: rgb(82, 82, 82);
        text-shadow: 1px 1px 0 #222;
    }
    
    #usuario_info a{
        color: rgb(253, 103, 103);
        text-shadow: 1px 1px 0 #222;
        text-decoration: none;
        transition: all 400ms;
    }
    
    #usuario_info a:hover{
        color: rgb(73, 73, 73);
    }
    
    #usuario_info ul{
        list-style: none;
        padding: 0;
        margin-top: 8%;
    }
    
    #usuario_info li{
        margin-top: 8px;
    }

    #publicaciones h2{
        text-align: center;
        margin-top: 3%;
        color: #333;
        text-shadow: 1px 1px 0 #222;
    }
    
    #publicaciones img{
        width: 300px;
        height: 360px;
        margin-left: 6%;
        margin-top:3%;
        box-shadow: 0px 0px 4px #222;
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
            @foreach ($informacion as $info)

            <div id="usuario_info">    
                <img src="{{URL::asset('images/'.$info->image)}}">
                <h2>@ {{$info->nick}}</h2>
                <p>{{$info->name}} {{$info->surname}}</p>
                @if ($info->id == Auth::user()['id'])      
                    <ul>
                        <li><a href="{{route('update_img')}}">-Cambiar foto-</a></li>
                        <li><a href="{{route('upload')}}">-Subir publicacion-</a></li>
                    </ul>
                @endif
            </div>
            
            @endforeach

            <div id="publicaciones">
                <h2>Publicaciones</h2>

                @foreach ($publicaciones as $publicacion)
                    <a href="{{route('comentarios',['id' => $publicacion->id])}}"><img src="{{URL::asset('images/'.$publicacion->image_path)}}"></a>
                @endforeach
            </div>
        </div>
    </div>
</body>
    <?php require_once "../resources/views/includes/footer.blade.php";?>
</html>

{{-- {{Auth::user()}}  --}}