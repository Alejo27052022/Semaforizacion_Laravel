<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--**Ingreso de Estilos CSS**-->
    <link rel="stylesheet" href="/static/assets_home/css/style_home.css">
    <!--Ingreso de FontAwesome Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Glider CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <!--Carousel CSS-->
    <link rel="stylesheet" href="/static/assets_home/css/carousel.css">
    <!--Link Fonts Google-->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    <title>Consejo de la Judicatura</title>

</head>
<body>
    <!--Parte de la Cabecera de la Seccion del Logo y Redes-->
    <header class="header">
        <div>
            <label class="nav-space" for="">
                <img id="Judicatura" class="imagen" src="/static/assets_home/img/logo.jpg" alt="">
                <hr class="y">
                <hr class="yellow"> <hr class="blue"> <hr class="red">
                <div id="Icono_facebook"><a href="https://www.facebook.com/CJudicaturaEc/"><i class="fa fa-brands fa-square-facebook"></i></a></div>
                <div id="Icono_Instagram"><a href="https://www.instagram.com/cjudicaturaec/"><i class="ga fa-brands fa-square-instagram"></i></a></div>
                <a href="https://twitter.com/CJudicaturaEc"><i id="Icono_Twitter" class="tw fa-brands fa-twitter"></i></a>
            </label>
        </div>
    </header>
    <!--Parte de la Cabecera de la Seccion de Navegacion-->
    <header class="header-nav">
        <nav class="nav-menu">
            <ul class="navv">
                <li><a class="in" href="" id="Icono_inicio">Inicio</a></li>
                <button class="btn-user" id="open"><li><i id="Iniciar_sesion" class="us fa-solid fa-user"></i></button>
                </li>
            </ul>
        </nav>
    </header>

    <br>

    <div class="carousel">
        <div class="carousel__contenedor">
            <button aria-label="Anterior" class="carousel__anterior">
                <i class="ic fa-solid fa-chevron-left"></i>
            </button>

            <div class="carousel__lista">
                <div class="carousel__elemento">
                    <img id="Imagen1" class="imgg" src="/static/assets_home/img/imagen1.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img id="Imagen2" class="imgg" src="/static/assets_home/img/imagen2.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen3.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen4.jpg" alt="">
                </div>
                <div class="carousel__elemento">
                    <img class="imgg" src="/static/assets_home/img/imagen5.jpg" alt="">
                </div>
            </div>

            <button aria-label="Siguiente" class="carousel__siguiente">
                <i class="ic fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div role="tablist" class="carousel__indicadores"></div>
    </div>
    <br>
    <footer class="footer-nav">
        <div class="nav-marg">
            <iframe id="Mapa" class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.6943705413755!2d-78.13597958532831!3d-2.2674693983473513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d20fc20777d6e5%3A0x8173f4cb82ce5f9e!2sConsejo%20de%20la%20Judicatura%20de%20Morona%20Santiago!5e0!3m2!1ses!2sec!4v1674019663721!5m2!1ses!2sec" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br>
            <div>
                <form class="right" action="" method=get>
                    <h3 class="section-title"> SUGERENCIAS </h3>
                    <hr class="section-title-divider"></hr>
                    <div class="contenedor">
                        <div>
                            <input type="text" class="tex-cuadro" placeholder="Ingresa tu Nombre" name="name" required>
                        </div>
                        <div>
                            <input type="text" class="tex-cuadro" placeholder="Email" name="email" required>
                        </div>
                        <div>
                            <input type="text" class="tex-cuadro" placeholder="Tema" name="subject" required>
                        </div>
                        <div>
                            <input type="text" class="tex-cuadro msgg" placeholder="Mensaje" name="message" required>
                        </div>
                        <div>
                            <button class="btn-submt" value="" name="guardar">Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </footer>

    <div id="modal_container" class="modal-container">
        <div class="modal">
            <div class="margin-modal">
                <div>
                    <button class="btn-usuario" value="Usuario"><a href="{{ route('loguser') }}"><i class="usfa fa-solid fa-users"></i></a></button>
                    <p class="text-mod"> Usuario </p>
                </div>
                <div>
                    <button class="btn-admin"><a href="{{ route('home') }}"><i class="usfai fa-solid fa-user-secret"></i></a></button>
                    <p class="text-mod" > Administrador </p>
                </div>
            </div>
          <button class="btn-close" id="close">Cerrar</button>
        </div>
    </div>

    <script>
            var text = document.getElementById("Icono_facebook");
            text.addEventListener("mouseover", function (){
                var audio = new Audio("/static/assets_audio/Index/Facebook.wav")
                audio.play();
            });
            var label = document.getElementById("Icono_Twitter");
            label.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/Twitter.wav");
                audio.play();
            });
            var label = document.getElementById("Icono_Instagram");
            label.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/Instagram.wav");
                audio.play();
            });
            var label1 = document.getElementById("Judicatura");
            label1.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/Consejo.wav");
                audio.play();
            });
            var label2 = document.getElementById("Imagen1");
            label2.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/imagen1.wav");
                audio.play();
            });
            var label3 = document.getElementById("Imagen2");
            label3.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/imagen2.wav");
                audio.play();
            });
            var label4 = document.getElementById("Mapa");
            label4.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/Mapa.wav");
                audio.play();
            });
            var label5 = document.getElementById("Icono_inicio");
            label5.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/Icono_inicio.wav");
                audio.play();
            });
            var label6 = document.getElementById("Iniciar_sesion");
            label6.addEventListener("mouseover", function() {
                var audio = new Audio("/static/assets_audio/Index/Iniciar_sesion.wav");
                audio.play();
            });
    </script>

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
            strlen($_GET['name'])>=1 &&
            strlen($_GET['email'])>=1 &&
            strlen($_GET['subject'])>=1 &&
            strlen($_GET['message'])>=1)

            {
                $nombre = trim($_GET['name']);
                $email = trim($_GET['email']);
                $tema = trim($_GET['subject']);
                $mensaje = trim($_GET['message']);
                $insertar = "INSERT INTO sugerencias(name, email, subject, message)
                VALUES ('$nombre','$email','$tema', '$mensaje')";
                $resultado = mysqli_query($conex, $insertar);
                if ($resultado) {
                    echo "<script> window.location.href = 'index.php'; </script>";
                }

            }
        }
    ?>



    <script src="glider.js"></script>
    <!--Script Glider.JS-->
    <script src="/static/assets_home/js/poppus.js"></script>
    <script src="/static/assets_home/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
</body>
</html>
