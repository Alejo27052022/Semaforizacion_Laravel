@extends('adminlte::page')

<?php
  session_start();

  if (isset($_SESSION['usuario_cod']) && isset($_SESSION['usuario_nom_user'])) {
?>

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

$consulta = "SELECT codigo, ced_user, nom_user, last_user, direc, telefono, email FROM usuarios";
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
                                <th>Codigo</th>
								<th>Cedula Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
								<th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($data as $dat) {
                            ?>
                            <tr>
                                <td><?php echo $dat['codigo'] ?></td>
                                <td><?php echo $dat['ced_user'] ?></td>
                                <td><?php echo $dat['nom_user'] ?></td>
                                <td><?php echo $dat['last_user'] ?></td>
								<td><?php echo $dat['direc'] ?></td>
                                <td><?php echo $dat['telefono'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
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

<?php
}else {
   echo "<script> location.href= 'loguser'; </script>";
}
 ?>

@endsection
