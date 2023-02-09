<br>
@extends('adminlte::page')

<?php
	class Conexion{
		public static function Conectar() {
			define('servidor', 'localhost:3307');
			define('nombre_bd', 'proyecto');
			define('usuario', 'root');
			define('password', '');
			$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
			try{
				$conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);
				return $conexion;
			}catch (Exception $e){
				die("El error de Conexión es: ". $e->getMessage());
			}
		}
	}
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT cod_denuncia, ced_denunciante, casos_id, Rol, victima, victimario, email_contacto, num_contacto, direccion, latitud, longitud, created_at FROM denuncia";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/assets_home/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <title>Denuncias</title>

    <style>
        .tabla{
            color: darkblue;
            background: none;
        }
        .borde{
            border-color: black;
        }
        .text{
            color: black;
        }
    </style>

</head>
<body>

    @section('content')
        <div class="container">
            </div>
                <br>
            <div class="container">
        </div>

    <div>
        <h1 class="logo"><span>Mapa de Denuncias</span></h1>
    </div>
    <br>

            <!--Google Maps-->
                <div id="map" style="width:100%;height:500px;"></div>

            <!--Codigo Mapa-->
            <script>
                function showMap(lat, long)
                {
                    var coord = { lat:lat, lng:long};

                    new google.maps.Map(
                        document.getElementById("map"),
                        {
                            zoom: 13,
                            center: coord,
                        }
                    );
                }

                showMap(0,0);
            </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCktZgO4Z9LiB1xCIvW4lmwTKGZXAz6VkM&v=3.exp&libraries=places&callback=showMap"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   	crossorigin=""></script>

</body>
</html>

@endsection

