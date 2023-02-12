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
            <form method="POST" action="{{route('update_img_save')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @error('image')
                    <div class="alerta error">{{$message}}</div>
                @enderror
                <input type="file" name="image" accept="image/*" required>
                <input type="submit" value="Aceptar">
            </form>
        </div>
    </div>
</body>
    <?php require_once "../resources/views/includes/footer.blade.php";?>
</html>

{{-- {{Auth::user()}}  --}}