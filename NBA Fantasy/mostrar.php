<?php 

    $inc = include("../php/conexion_be.php");
    if ($inc) {
        $consulta = "SELECT * FROM usuarios"; // Falta el punto y coma
        $resultado = mysqli_query($conexion, $consulta); // Falta el punto y coma
        if ($resultado) {
            while($row = $resultado->fetch_array()){
                $id = $row['id'];
                $nombre_completo = $row['nombre_completo'];
                $usuario = $row['usuario'];
                $contrasena = $row['contrasena'];
                $correo = $row['correo'];
                ?>
                <div>
                    <h2><?php echo $nombre_completo; ?></h2> <!-- Cambiado de $nombre a $nombre_completo -->
                    <div>
                        <p>
                            <b>ID: </b> <?php echo $id ?> <br>
                            <b>Nombre: </b> <?php echo $nombre_completo ?> <br>
                            <b>Usuario: </b> <?php echo $usuario ?> <br>
                            <b>Contraseña: </b> <?php echo $contrasena ?> <br>
                            <b>Correo: </b> <?php echo $correo ?>
                        </p>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Error en la consulta"; // En caso de error con la consulta
        }
    } else {
        echo "No se pudo conectar a la base de datos"; // En caso de error con la conexión
    }

?>
