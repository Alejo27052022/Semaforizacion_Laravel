<?php
    $conexion = mysqli_connect("localhost:3307", "root", "", "proyecto");

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$consulta = "SELECT codigo FROM usuarios WHERE codigo  = 'cod_user'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $data = $row["codigo"];
} else {
    $data = "No se encontraron resultados";
}

?>

<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/static/assets_home/css/main.css">
        <link rel="stylesheet" href="/static/assets_home/css/semaforo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


        <!-- GOOGLE FONTs -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="/usuario/css/style.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- ANIMATE CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

        <title>Denuncias</title>

        <style>
            .boton2{
                width: 220px;
                height: 40px;
                position: relative;
                display: block;
                text-align: right;
                justify-content: right;
                align-items: right;
            }

            .text{
                color: black;
                font-size: 30px;
                font-weight: bold;
                font-family: 'DM Serif Display';
                margin-left: 230px;
            }

            #map{
                height: 400px;
                width: 700px;
            }

            label{
                color: black;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top: 10px
            }
        </style>

</head>


<script>

</script>

<div class="box box-info padding-1  contact-wrapper animated bounceInUp contact-form" >
    <div class="box-body">
        <div>
            <p class="text" id="Solicitud"> Solicitud de Denuncias </p>
        </div>
        <label> Denunciante </label>
        <div class="form-group" id="Audio_ced_denunciante">
                {{ Form::text('ced_denunciante', $denuncium->ced_denunciante, ['class' => 'form-control' . ($errors->has('ced_denunciante') ? ' is-invalid' : ''), 'placeholder' => 'Cedula del Denunciante']) }}
                {!! $errors->first('ced_denunciante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> Caso de Denuncia </label>
        <div class="form-group" id="Audio_Caso">
            {!! Form::select('casos_id', $options, null, ['class' => 'form-control' . ($errors->has('casos_id') ? ' is-invalid' : ''), 'required'])  !!}
            {!! $errors->first('casos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> ¿Quien es Usted? </label>
        <div class="form-group" id="Audio_Rol">
            {!! Form::select('rol', $rol, null, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'required'])  !!}
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> ¿Quién fue la Victima? </label>
        <div class="form-group" id="Audio_Victima">
            {{ Form::text('victima', $denuncium->victima, ['class' => 'form-control' . ($errors->has('victima') ? ' is-invalid' : ''), 'placeholder' => 'Victima', 'required']) }}
            {!! $errors->first('victima', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> ¿Quién fue el Agresor? </label>
        <div class="form-group" id="Audio_Victimario">
            {{ Form::text('victimario', $denuncium->victimario, ['class' => 'form-control' . ($errors->has('victimario') ? ' is-invalid' : ''), 'placeholder' => 'Victimario', 'required']) }}
            {!! $errors->first('victimario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> Email de Contacto </label>
        <div class="form-group" id="Audio_Email">
            {{ Form::text('email_contacto', $denuncium->email_contacto, ['class' => 'form-control' . ($errors->has('email_contacto') ? ' is-invalid' : ''), 'placeholder' => 'Email Contacto']) }}
            {!! $errors->first('email_contacto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> Numero de Contacto </label>
        <div class="form-group" id="Audio_Contacto">
            {{ Form::text('num_contacto', $denuncium->num_contacto, ['class' => 'form-control' . ($errors->has('num_contacto') ? ' is-invalid' : ''), 'placeholder' => 'Numero Contacto', 'required']) }}
            {!! $errors->first('num_contacto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <label> Direccion de Contacto </label>
        <div class="form-group" id="select-direccion">
        {{ Form::text('direccion', '', ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'id' => 'direccion', 'required']) }}
        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        {{ Form::hidden('latitud', '', ['id' => 'latitud']) }}
        {{ Form::hidden('longitud', '', ['id' => 'longitud']) }}
        </div>

        <br>
        <div class="form-group boton2" id="Enviar">
            {{ Form::submit('Enviar Denuncia', ['class' => 'btn btn-success']) }}
        </div>


        <?php
        function validar_ecuador($ced_denunciante) {
          if (strlen($ced_denunciante) != 10) {
              return false;
          }

          $provincia = intval(substr($ced_denunciante, 0, 2));
          if ($provincia < 1 || $provincia > 24) {
              return false;
          }

          $tercer_digito = intval(substr($ced_denunciante, 2, 1));
          if ($tercer_digito < 0 || $tercer_digito > 6) {
              return false;
          }

          $coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
          $total = 0;
          for ($i = 0; $i < 9; $i++) {
              $val = intval(substr($ced_denunciante, $i, 1)) * $coeficientes[$i];
              $val = $val > 9 ? $val - 9 : $val;
              $total += $val;
          }

          $ultimo_digito = intval(substr($ced_denunciante, 9, 1));
          $validacion = 10 - ($total % 10);
          if ($validacion != $ultimo_digito) {
              return false;
          }

          return true;
        }
        ?>

        </div>
            <div class="contact-info">
                <div class="container">
                    <div class="semaforo">
                        <div id="Amarillo"><span class="luces-circulo yellow" color = "yellow" id="mybuttony"></span></div>
                        <div id="Verde"><span class="luces-circulo green" color="green" id="mybuttong"></span></div>
                        <div id="Rosa"><span class="luces-circulo rose" color="rose" id="mybuttonr"></span></div>
                        <div id="Naranja"><span class="luces-circulo orange" color="orange" id="mybuttono" ></span></div>
                        <div id="Rojo"><span class="luces-circulo red" color="red" id="mybuttone" ></span></div>
                        <div id="Violeta"><span class="luces-circulo purple" color="purple" id="mybuttonp" ></span></div>
                    </div>
                <div class="stick"></div>
                <div class="floor"></div>
            </div>
            </div>
        </div>

        <script>
            var text = document.getElementById("Solicitud");
            text.addEventListener("mouseover", function (){
                var audio = new Audio("/static/assets_audio/Denuncia/Solicitud.wav")
                audio.play();
            });
            var label = document.getElementById("Audio_ced_denunciante");
            label.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Cedula.wav");
                audio.play();
            });
            var label1 = document.getElementById("Audio_Caso");
            label1.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Caso.wav");
                audio.play();
            });
            var label2 = document.getElementById("Audio_Rol");
            label2.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Rol.wav");
                audio.play();
            });
            var label3 = document.getElementById("Audio_Victima");
            label3.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Victima.wav");
                audio.play();
            });
            var label4 = document.getElementById("Audio_Victimario");
            label4.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Victimario.wav");
                audio.play();
            });
            var label5 = document.getElementById("Audio_Email");
            label5.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Email.wav");
                audio.play();
            });
            var label6 = document.getElementById("Audio_Contacto");
            label6.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Contacto.wav");
                audio.play();
            });
            var label7 = document.getElementById("select-direccion");
            label7.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Direccion.wav");
                audio.play();
            });
            var button = document.getElementById("Enviar");
            button.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Denuncia/Enviar.wav");
                audio.play();
            });
        </script>

        <script>
            var label8 = document.getElementById("Amarillo");
            label8.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Semaforo/AMARILLO.mp3");
                audio.play();
            });
            var verde = document.getElementById("Verde");
            verde.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Semaforo/VERDE.mp3");
                audio.play();
            });
            var rosa = document.getElementById("Rosa");
            rosa.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Semaforo/ROSA.mp3");
                audio.play();
            });
            var naranja = document.getElementById("Naranja");
            naranja.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Semaforo/NARANJA.mp3");
                audio.play();
            });
            var rojo = document.getElementById("Rojo");
            rojo.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Semaforo/ROJO.mp3");
                audio.play();
            });
            var violeta = document.getElementById("Violeta");
            violeta.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Semaforo/VIOLETA.mp3");
                audio.play();
            });
        </script>


        <div class="clearfix"></div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCktZgO4Z9LiB1xCIvW4lmwTKGZXAz6VkM"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   	crossorigin=""></script>

    <script>
        $(document).ready(function(){
            var autocomplete;
            var to = 'direccion';
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)),{
                types: ['geocode'],
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {

                var near_place = autocomplete.getPlace();

                jQuery("#latitud").val(near_place.geometry.location.lat());
                jQuery("#longitud").val(near_place.geometry.location.lng());

            });
        });

    </script>
    <script src="/static/login/Register User/assets/js/mapa.js"></script>
    <script src="/static/login/Register User/assets/js/maps.js"></script>
</div>
