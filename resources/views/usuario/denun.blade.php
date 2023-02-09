<br>
@extends('layouts.app_profile')

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

$consulta = "SELECT cod_denuncia, ced_denunciante, casos_id, victima, victimario, estatus, direccion, created_at FROM denuncia";
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

</head>
<body>

    @section('content')
        <div class="container">
            </div>
                <br>
            <div class="container">
        </div>

    <div class="content">
        <h1 class="logo"><span>Denuncias</span></h1>
    </div>

        <div class="container">
        </div>
            <br>
        <div class="container">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <div class="card-header">
                                    <button class="btn btn-danger" data-placement="right">
                                        <a class="enlace" href="denuncia/create">
                                            {{ __('Realizar una nueva Denuncia') }}
                                        </a>
                                    </button>
                                </div>

                                <br>

                            </div>
                        </div>
                </div>

            </div>


</body>
</html>

@endsection
