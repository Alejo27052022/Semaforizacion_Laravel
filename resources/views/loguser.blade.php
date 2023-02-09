
<?php
  session_start();

  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login User</title>
	<link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>

	<style>
		.contenedor-botones{
			justify-content: space-between;
			align-items: center;
			display: flex;
			text-align: center;
			padding-left: 80px;
			padding-right: 80px;
			font-size: 18px;
		}

		a{
			color: white;
            text-decoration: none;
		}

		a:hover{
			color: white;
		}
	</style>

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

			.fa-solid{
				color: red;
				font-size: 90px;
				box-shadow: 5px 5px #888;
				border-radius: 60px;
				margin-bottom: 10px;
			}

			.bnt-cerrar{
				background-color: red;
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
			<p><i class="fa-solid fa-circle-exclamation"></i></p>
			<p>¡Usuario o Contraseña está </p>
			<p> ingresado incorrectamente!</p>
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

	  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
	  	<form class="p-5 rounded shadow"
	  	      action=""
	  	      method="get"
	  	      style="width: 30rem"
			  id= formLogin>
	  		<h1 class="text-center pb-5 display-4">LOGIN</h1>
	  		<?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1"
		           class="form-label">Usuario
		    </label>
		    <input type="text" placeholder = "Usuario"
		           name="nom_user"
		           value="<?php if(isset($_GET['nom_user']))echo(htmlspecialchars($_GET['nom_user'])) ?>"
		           class="form-control"
		           id="exampleInputEmail1" aria-describedby="emailHelp" required>
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1"
		           class="form-label">Password
		    </label>
		    <input type="password" placeholder= "Password"
		           class="form-control"
		           name="pass"
		           id="exampleInputPassword1" required>
		  </div>
		  <div class="contenedor-botones">
			<div>
				<button type="submit"
						class="btn btn-primary">LOGIN
				</button>
			</div>
			<div>
				<a href="{{ route('regisuser') }}" class="btn btn-register btn-danger">
					REGISTER
				</a>
				</button>
			</div>
		  </div>


		</form>
	  </div>


	  <?php

		$sName = "localhost:3307";
		$uName = "root";
		$pass = "";
		$db_name = "proyecto";

		try {
			$conn = new PDO("mysql:host=$sName;dbname=$db_name",
							$uName, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
		echo "Connection failed : ". $e->getMessage();
		}

		if (isset($_GET['nom_user']) && isset($_GET['pass'])) {

			$nombre = $_GET['nom_user'];
			$password = $_GET['pass'];

			if (empty($nombre)) {
				header("Location: loguser.php?error=Usuario is required");
			}else if (empty($password)){
				header("Location: loguser.php?error=Password is required&nom_user=$nombre");
			}else {
				$stmt = $conn->prepare("SELECT * FROM usuarios WHERE nom_user=?");
				$stmt->execute([$nombre]);

				if ($stmt->rowCount() === 1) {
					$usuario = $stmt-> fetch();

					$usuario_cod = $usuario['codigo'];
					$usuario_ced_user = $usuario['ced_user'];
					$usuario_nom_user = $usuario['nom_user'];
					$usuario_last_user = $usuario['last_user'];
					$usuario_direc = $usuario['direc'];
					$usuario_telefono = $usuario['telefono'];
					$usuario_email = $usuario['email'];
					$usuario_pass = $usuario['pass'];

					if($nombre === $usuario_nom_user){
							$_SESSION['usuario_cod'] = $usuario_cod;
							$_SESSION['usuario_ced_user'] = $usuario_ced_user;
							$_SESSION['usuario_nom_user'] = $usuario_nom_user;
							$_SESSION['usuario_last_user'] = $usuario_last_user;
							$_SESSION['usuario_direc'] = $usuario_direc;
							$_SESSION['usuario_telefono'] = $usuario_telefono;
							$_SESSION['usuario_email'] = $usuario_email;
							$_SESSION['usuario_pass'] = $usuario_pass;

							echo "<script> location.href= 'info'; </script>";
					}else{
					}
				}else {
				}
				echo '<script language="javascript"> showDialog(); </script>';

			}
		}


		?>



	<script src="alerta.js"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="sweetalert2.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php
}else {
	echo "<script> location.href= 'indexprofile'; </script>";
}
 ?>




