<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Perfil de Usuario</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
    .fa-solid{
        font-size:25px;
        text-align: right;
        cursor: pointer;
        padding-left: 850px;
    }

    .estilo-enlace{
        color: white;
        text-decoration: none;
    }

    .estilo-enlace:hover{
        color: #fff;
        cursor: pointer;

    }

    .btn-cerrar{
        width : 75px;
        height: 40px;
        color: #fff;
        border-radius: 10px;
        background: #B70E21;
        margin-left: 15px;
        border: none;
        box-shadow: 0 10px 15px;
    }

    .btn-cerrar:hover{
        background: #FE8062;
    }

</style>



<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('info') }}">{{ __('Informacion') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('denuncias_user') }}">{{ __('Denuncias') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexprofile') }}"><i class="us fa-solid fa-user"></i></a>
                        </li>

                        <li class="nav-item">
                            <button class="btn-cerrar"><a class="estilo-enlace" href="{{route ('index') }}" id="cerrar">Cerrar</a></button>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <?php

        if(isset($_GET['#cerrar'])) {

        //Vaciamos y destruimos las variables de sesión
        $_SESSION['nom_user'] = NULL;
        $_SESSION['pass'] = NULL;
        unset($_SESSION['nom_user']);
        unset($_SESSION['pass']);

        //Redireccionamos a la pagina index.php
        header('Location: index.php');
        }

    ?>
</body>
</html>
