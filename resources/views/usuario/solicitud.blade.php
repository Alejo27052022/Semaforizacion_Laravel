<br>
@extends('layouts.app_profile')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/assets_home/css/main.css">
    <link rel="stylesheet" href="/static/assets_home/css/semaforo.css">


    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <title>Denuncias</title>

</head>
<body>

    @section('content')
        <div class="container">
            </div>
                <br>
            <div class="container">
        </div>

    <div class="content">
        <h1 class="logoo">Solicitud de Denuncia</h1>

    </div>

    <br>

    <div class="contact-wrapper animated bounceInUp">
        <div class="contact-form">
                <form action="" method='HEAD'>
                    <p>
                        <label>Cedula del Denunciante</label>
                        <input type="text" name="ced_denunciante" required>
                        {{ Form::label('cod_denuncia') }}
                        {{ Form::text('cod_denuncia', $denuncium->cod_denuncia, ['class' => 'form-control' . ($errors->has('cod_denuncia') ? ' is-invalid' : ''), 'placeholder' => 'Cod Denuncia']) }}
                        {!! $errors->first('cod_denuncia', '<div class="invalid-feedback">:message</div>') !!}
                    </p>
                    <p>
                        <label>Nombre de la Victima</label>
                        <input type="text" name="victima" required>
                    </p>
                    <p>
                        <label>Nombre del Agresor</label>
                        <input type="text" name="victimario" required>
                    </p>
                    <p>
                        <label>Email de contacto</label>
                        <input type="email" name="email_contacto">
                    </p>
                    <p>
                        <label>Número de contacto</label>
                        <input type="text" name="num_contacto" required>
                    </p>
                    <p>
                        <label>Caso</label>
                        <input type="text" name="casos_id" required>

                    </p>
                    <p>
                        <label>Latitud y Longitud</label>
                            <input type="text" name="direccion" id="nlat nlon">
                    </p>
                    <p class="block">
                        <button name="guardar" type="submit">
                            Enviar
                        </button>
                    </p>

                </form>
                <article id="mapa" class="maps">
                    </article>
                    <div class="clearfix"></div>
        </div>
            <div class="contact-info">
                <div class="container">
                    <div class="semaforo">
                        <span class="luces-circulo yellow" color = "yellow"></span>
                        <span class="luces-circulo green" color="green"></span>
                        <span class="luces-circulo rose" color="rose"></span>
                        <span class="luces-circulo orange" color="orange"></span>
                        <span class="luces-circulo red" color="red" id="open"></span>
                        <span class="luces-circulo purple" color="purple"></span>
                    </div>
                <div class="stick"></div>
                <div class="floor"></div>
            </div>
            </div>
        </div>

    <!--Base de Datos PHP - Registro Usuario -->
    <?php
    session_start();
        $database = "proyecto";
        $host = "localhost:3307";
        $user = "root";
        $pass = "";

        $conex = mysqli_connect($host, $user, $pass);
        $data = mysqli_select_db($conex, $database);

        if(isset($_HEAD['guardar'])){
            if(strlen($_HEAD['ced_denunciante']) >=1 && strlen($_HEAD['victima']) >=1 && strlen($_HEAD['victimario']) >=1 && strlen($_HEAD['email_contacto']) >=1 && strlen($_HEAD['num_contacto']) >= 1 && strlen($_HEAD['casos_id']) >=1 && strlen($_HEAD['direccion']) >=1 ){
                $cedula = trim($_HEAD['ced_denunciante']);
                $victima = trim($_HEAD['victima']);
                $agresor = trim($_HEAD['victimario']);
                $email = trim($_HEAD['email_contacto']);
                $num_contacto = trim($_HEAD['num_contacto']);
                $casos = trim($_HEAD['casos_id']);
                $direccion = trim($_HEAD['direccion']);
                $fecha_reg = date("d/m/y");
                $insertar = "INSERT INTO denuncia(ced_denunciante, victima, victimario, email_contacto, num_contacto, casos_id, direccion, created_at) VALUES ('$cedula','$victima','$agresor','$email','$num_contacto','$casos','$direccion','$fecha_reg')";
                $resultado = mysqli_query($conex, $insertar);
            }

        }
    ?>

        <script>
            $(document).ready(function () {
                //Click al boton para pedir permisos
                $("#pedirvan").click(function () {
                    //Si el navegador soporta geolocalizacion
                    if (!!navigator.geolocation) {
                        //Pedimos los datos de geolocalizacion al navegador
                        navigator.geolocation.HEADCurrentPosition(
                                //Si el navegador entrega los datos de geolocalizacion los imprimimos
                                function (position) {
                                    $("#nlat").text(position.coords.latitude);
                                    $("#nlon").text(position.coords.longitude);
                                },
                        );
                    }
                });

            });
        </script>



        <script src="poppus.js"></script>
        <script src="/static/login/Register User/assets/js/maps.js"></script>



</body>
</html>

@endsection

