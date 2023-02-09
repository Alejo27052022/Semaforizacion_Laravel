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

$consulta = "SELECT cod_asistente, nom_asistente, last_asistente, cargo, email, pass, created_at FROM asistentes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

@section('content')
    <div class="container">
    </div>
        <br>
    <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Codigo Asistente</th>
                                    <th>Nombre del Asistente</th>
                                    <th>Apellido del Asistente</th>
                                    <th>Cargo</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Fecha Creada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data as $dat) {
                                ?>
                                <tr>
                                    <td><?php echo $dat['cod_asistente'] ?></td>
                                    <td><?php echo $dat['nom_asistente'] ?></td>
                                    <td><?php echo $dat['last_asistente'] ?></td>
                                    <td><?php echo $dat['cargo'] ?></td>
                                    <td><?php echo $dat['email'] ?></td>
                                    <td><?php echo $dat['pass'] ?></td>
                                    <td><?php echo $dat['created_at'] ?></td>
                                    <td></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
            </div>
        </div>

@endsection

