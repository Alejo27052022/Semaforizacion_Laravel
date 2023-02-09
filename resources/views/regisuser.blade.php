<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <link rel="stylesheet" type="text/css" href="/static/login/Register User/assets/css/styles.css">
    <link rel="stylesheet" href="/static/login/Register User/assets/css/mapa.css">

    <style>
			#dialog {
				display: none;
				background-color: #fff;
				border: 1px #000;
				box-shadow: 2px 2px 3px 3px black;
				border-radius: 10px;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 20px;
				text-align: center;
				font-weight: bold;
			}

            .fa-sharp{
                color: green;
				font-size: 90px;
				box-shadow: 5px 5px #888;
				border-radius: 60px;
				margin-bottom: 10px;
            }
			.fa-solid{
				color: green;
				font-size: 90px;
				box-shadow: 5px 5px #888;
				border-radius: 60px;
				margin-bottom: 10px;
			}

			.bnt-cerrar{
				background-color: green;
				color: white;
				border-radius: 10px;
				border: none;
				width: 80px;
				height: 35px;
				margin-top:15px;
				box-shadow: 5px 5px #888;
			}
		</style>

		<div id="dialog">
			<p><i class="fa-solid fa-circle-check"></i></p>
			<p> ¡Se ha registrado Correctamente! </p>
			<button class="bnt-cerrar" onclick="closeDialog()">Cerrar</button>
		</div>

		<script>
			function showDialog() {
				document.getElementById("dialog").style.display = "block";
			}

			function closeDialog() {
				document.getElementById("dialog").style.display = "none";
			}
		</script>

    <title>Formulario de Registro de Usuario</title>
</head>

<body>


    <div class="container" id="advanced-search-form">
        <h2>Datos Personales</h2>
        <form action="" method= get>
            <div class="form-group">
                <label for="dni">Cédula</label>
                <input type="text" class="form-control" placeholder="Cédula" name="ced_user" required>
            </div>
            <div class="form-group">
                <label for="first-name">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nom_user" required>
            </div>
            <div class="form-group">
                <label for="last-name">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido" name="last_user" required>
            </div>
            <div class="form-group">
                <label for="number">Telefono</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" placeholder="Direccion" name="direc" required>
            </div>


            <div class="clearfix"></div>
            <button class="btn btn-info btn-lg btn-responsive" name="guardar"> <span class="glyphicon glyphicon-search"></span> Guardar</button>
        </form>
    </div>
    <script src="/static/login/Register User/assets/js/maps.js"></script>


    <!--Base de Datos PHP - Registro Usuario -->
    <?php
    session_start();
        $database = "proyecto";
        $host = "localhost:3307";
        $user = "root";
        $pass = "";

        $conex = mysqli_connect($host, $user, $pass);
        $data = mysqli_select_db($conex, $database);

        if(isset($_GET['guardar'])){
            if(
            strlen($_GET['ced_user'])>=1 &&
            strlen($_GET['nom_user'])>=1 &&
            strlen($_GET['last_user'])>=1 &&
            strlen($_GET['direc'])>=1 &&
            strlen($_GET['telefono'])>=1 &&
            strlen($_GET['email'])>=1 &&
            strlen($_GET['pass'])>=1)

            {
                $cedula = trim($_GET['ced_user']);
                $nombre = trim($_GET['nom_user']);
                $apellido = trim($_GET['last_user']);
                $direc = trim($_GET['direc']);
                $telefono = trim($_GET['telefono']);
                $email = trim($_GET['email']);
                $pass = trim($_GET['pass']);
                $fecha = date("d/m/y");
                $insertar = "INSERT INTO usuarios(ced_user, nom_user, last_user, direc, telefono, email, pass, created_at)
                VALUES ('$cedula','$nombre','$apellido', '$direc', '$telefono','$email','$pass', '$fecha')";
                $resultado = mysqli_query($conex, $insertar);

                echo '<script language="javascript"> showDialog(); </script>';
                echo "<script> location.href= 'info'; </script>";


            }
        }
    ?>
</body>

</html>

