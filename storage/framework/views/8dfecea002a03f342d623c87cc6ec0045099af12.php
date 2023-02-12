<!-- styles -->

<style>
    *{
        margin: 0%;
        font-family: system-ui;
    }

    aside{
        width: 15%;
        min-height: 93%;
        float: left;
        border-right: solid 1px #444;
    }

    .side_bar{
        font-size: 20px;
        padding: 7%;
    }

    .side_bar a{
        text-decoration: none;
        color: rgb(58, 58, 58);
        text-shadow: 1px 1px 0 #555;
        transition: all 300ms;
    }

    .side_bar a:hover{
        color: rgb(15, 15, 15);
    }

    .side_bar ul{
        list-style: none;
    }

    .side_bar li{
        margin-top: 5%;
    }

    .side_bar img{
        border-radius: 100%;
        box-shadow: 3px 3px 3px #222;
        width: 40px;
        height: 40px;
        display: inline;
    }

</style>


<!-- html -->
<aside>
    <div class="side_bar">  
        <ul>
            <img src="<?=URL::asset('images/'.Auth::user()['image']);?>">
            <li><a href="<?= route('inicio') ;?>">Inicio</a></li>
            <li><a href="<?= route('perfil',['id' => Auth::user()['id']]) ;?>">Perfil</a></li>
            <li><a href="<?= route('logout') ;?>">Logout</a></li>
        </ul>
    </div>
</aside><?php /**PATH C:\wamp64\www\master_de_php\proyecto_laravel\proyecto\resources\views/includes/lateral_bar.blade.php ENDPATH**/ ?>