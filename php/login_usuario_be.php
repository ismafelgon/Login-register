<?php

session_start();

include 'conexion_be.php'; // Añadir el punto y coma al final de la línea

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena']; // Añadir el punto y coma al final de la línea

// Validar el login
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'");

// Comprobar si el usuario existe
if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $correo;
    header("Location: ../NBA Fantasy/principal.php"); // Corrección en la redirección
    exit;
} else {
    echo '
        <script>
            alert("Usuario inexistente");
            window.location = "../principal.php";
        </script>
    ';
    exit;
}

?>
