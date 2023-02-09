    <!--Base de Datos PHP - Registro Usuario -->
    <?php
        $database = "proyecto";
        $host = "localhost:3307";
        $user = "root";
        $pass = "";

        $conex = mysqli_connect($host, $user, $pass);
        $data = mysqli_select_db($conex, $database);

        if(isset($_GET['almacenar'])){

            if(!empty($_GET['ced_denunciante']) && !empty($_GET['victima']) && !empty($_GET['victimario']) && !empty($_GET['email_contacto'])
            && !empty($_GET['num_contacto']) && !empty($_GET['casos_id']) && !empty($_GET['direccion']))
            {
                $cedula = $_GET['ced_denunciante'];
                $nombre = $_GET['victima'];
                $agresor = $_GET['victimario'];
                $email = $_GET['email_contacto'];
                $contacto = $_GET['num_contacto'];
                $casos = $_GET['casos_id'];
                $direccion = $_GET['direccion'];

                $sql = "INSERT INTO denuncia(ced_denunciante, casos_id, victima, victimario, email_contacto, num_contacto, direccion)
                VALUES('$cedula', '$casos', '$nombre', '$agresor', '$email', '$contacto', '$direccion)";
                $stmt = $conex->prepare($sql);
                if($stmt->execute()){
                    echo '<script> alert("Se ha realizado correctamente"); </script>';
                }else{
                    print("Error en la Consulta");
                }
            }
        }
    ?>
