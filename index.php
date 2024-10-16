<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: NBA Fantasy/principal.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Y Registro</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" type="image/png" href="favicon_logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200..700&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3 style="font-family: saira condensed; font-weight: bold; font-size: 30px">¿YA TIENES UNA CUENTA?</h3>
                    <p style="font-family: saira condensed; font-size: 20px">Inicia sesión para entrar a la página</p>
                    <button id="btn__iniciar-sesion" style="font-family: saira condensed">Iniciar sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3 style="font-family: saira condensed; font-weight: bold; font-size: 30px">¿AUN NO TIENES UNA CUENTA?</h3>
                    <p style="font-family: saira condensed; font-size: 20px">Regístrate para poder iniciar sesión</p>
                    <button id="btn__registrarse" style="font-family: saira condensed">Registrarse</button>
                </div>
                <img src="NBA Fantasy/custom_logo.png" alt="" style="position: absolute; top: 550px; left:-309px">
            </div>
            
            <div class="contenedor__login-register">

                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">

                    <h2 style="font-family: saira condensed; font-weight: bold; font-size: 30px">INICIAR SESIÓN</h2>
                    <input style="font-family: saira condensed; font-size: 20px" type="text" placeholder="Correo electrónico" name="correo">
                    <input style="font-family: saira condensed; font-size: 20px" type="password" placeholder="Contraseña" name="contrasena">
                    <button style="font-family: saira condensed; font-size: 20px">Entrar</button>

                </form>
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2 style="font-family: saira condensed; font-weight: bold; font-size: 30px">REGISTRARSE</h2>
                    <input style="font-family: saira condensed; font-size: 20px" type="text" placeholder="Nombre completo" name="nombre_completo">
                    <input style="font-family: saira condensed; font-size: 20px" type="text" placeholder="Correo electrónico" name="correo">
                    <input style="font-family: saira condensed; font-size: 20px" type="text" placeholder="Usuario" name="usuario">
                    <input style="font-family: saira condensed; font-size: 20px" type="password" placeholder="Contraseña" name="contrasena">
                    <button style="font-family: saira condensed; font-size: 20px">Registrarse</button>
                </form>
            </div>
        </div>

        

    </main>

    <script>
        document.getElementById("btn__registrarse").addEventListener("click", register)
        document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion)
        window.addEventListener("resize", anchoPagina)

        var contenedor_login_register = document.querySelector(".contenedor__login-register");
        var formulario_login = document.querySelector(".formulario__login");
        var formulario_register = document.querySelector(".formulario__register");
        var caja_trasera_login = document.querySelector(".caja__trasera-login");
        var caja_trasera_register = document.querySelector(".caja__trasera-register");

        function anchoPagina(){
            if(window.innerWidth > 850){
                caja_trasera_login.style.display = "block";
                caja_trasera_register.style.display = "block";
            }else{
                caja_trasera_register.style.display = "block";
                caja_trasera_register.style.opacity = "1";
                caja_trasera_login.style.display = "none";
                formulario_login.style.display = "block";
                formulario_register.style.display = "none";
                contenedor_login_register.style.left = "0px"
            }
        }

        anchoPagina();
        
        function register(){
            if(window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px"
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
            }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px"
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block"; 
            caja_trasera_login.style.opacity = "1"
            }
        }
        
        function iniciarSesion(){
            if(window.innerWidth > 850){
            formulario_register.style.display = "none";
            contenedor_login_register.style.left = "10px"
            formulario_login.style.display = "block";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
            }else{
            formulario_register.style.display = "none";
            contenedor_login_register.style.left = "0px"
            formulario_login.style.display = "block";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
            }
        }

    </script>
</body>
</html>