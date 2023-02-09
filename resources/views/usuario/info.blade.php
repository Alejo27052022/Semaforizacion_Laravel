@extends('layouts.app_profile');

@section('plugins.Sweetalert2', true)


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--**Ingreso de Estilos CSS**-->
    <!--Ingreso de FontAwesome Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Glider CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <!--Carousel CSS-->
    <link rel="stylesheet" href="/static/assets_home/css/carousel.css">
    <!--Link Fonts Google-->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    <title>Informacion</title>

</head>
<body>
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    @section('content')
        <div class="container">
        </div>
            <br>
        <div class="container">

        </div>

    <div class="carousel">
        <div class="carousel__contenedor">
            <button aria-label="Anterior" class="carousel__anterior">
                <i class="ic fa-solid fa-chevron-left"></i>
            </button>

            <div class="carousel__lista">
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen6.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen7.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen8.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen9.jpg" alt="">
                </div>
            </div>

            <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="ic fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div role="tablist" class="carousel__indicadores"></div>
    </div>

    <script src="glider.js"></script>
    <!--Script Glider.JS-->
    <script src="/static/assets_home/js/poppus.js"></script>
    <script src="/static/assets_home/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
</body>
</html>


@endsection
