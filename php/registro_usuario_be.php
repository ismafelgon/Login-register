<?php   

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$perfil = "1";

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena, perfil) 
          VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena', '$perfil')";

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

if(mysqli_num_rows($verificar_correo) > 0){
    echo '
        <script>
            alert("El correo ya está en uso, intenta nuevamente");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script>
            alert("El nombre de usuario ya está en uso, intenta nuevamente");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error al insertar registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
