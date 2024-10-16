<?php
// Configuración de la base de datos
$db_config = [
    'host' => 'localhost',
    'user' => 'root', // Cambia a tu usuario de MySQL
    'password' => '', // Cambia a tu contraseña de MySQL
    'database' => 'login_register_db'
];

// Crear conexión a la base de datos
$conn = new mysqli($db_config['host'], $db_config['user'], $db_config['password'], $db_config['database']);

// Verificar conexión
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Consulta para obtener las posiciones de los equipos de la primera tabla
$sql_primera_tabla = "SELECT nombre, ganados, perdidos FROM posiciones WHERE nombre = 'mavericks' OR nombre = 'pelicans' OR nombre = 'grizzlies' OR nombre = 'rockets' OR nombre = 'spurs' OR nombre = 'lakers' OR nombre = 'warriors' OR nombre = 'kings' OR nombre = 'suns' OR nombre = 'clippers' OR nombre = 'thunder' OR nombre = 'trail blazers' OR nombre = 'jazz' OR nombre = 'nuggets' OR nombre = 'timberwolves' ORDER BY ganados DESC, nombre ASC"; // Ordenar por ganados y luego por nombre
$result_primera = $conn->query($sql_primera_tabla);

// Consulta para obtener las posiciones de los equipos de la segunda tabla (todos menos los de la primera)
$sql_segunda_tabla = "SELECT nombre, ganados, perdidos FROM posiciones WHERE nombre NOT IN ('mavericks', 'pelicans', 'grizzlies', 'rockets', 'spurs', 'lakers', 'warriors', 'kings', 'suns', 'clippers', 'thunder', 'trail blazers', 'jazz', 'nuggets', 'timberwolves') ORDER BY ganados DESC, nombre ASC"; 
$result_segunda = $conn->query($sql_segunda_tabla);

// Comprobar si hay resultados en la primera tabla
if ($result_primera->num_rows > 0) {
    // Estilo para la tabla
    echo '<style>
    table {
        background-color: #333333; /* Color de fondo de la tabla */
        border-collapse: collapse; /* Para que las celdas no tengan espacios */
        margin-right: 20px; /* Espacio entre las tablas */
        display: inline-block; /* Permitir que las tablas estén lado a lado */
    }
    th, td {
        text-align: center;
        color: white; /* Color del texto */
        font-family: "Saira Condensed", sans-serif;
        font-size: 20px;
        padding: 2px; /* Espaciado interno */
    }
    tr:nth-child(even) {
        background-color: #4B4B4B; /* Color para las filas pares */
    }
    </style>';
    
    // Primera tabla
    echo '<table border="0">';
    echo '<tr><th>EQUIPO</th><th>RACHA&nbsp;&nbsp;</th></tr>';
    
    // Mostrar los datos en la primera tabla
    while ($row = $result_primera->fetch_assoc()) {
        echo '<tr>';
        // Mostrar la imagen en lugar del nombre
        echo '<td><img src="escudos/equipo 1 ' . htmlspecialchars($row['nombre']) . '.png" alt="' . htmlspecialchars($row['nombre']) . '" style="height: 35px; width: auto;"></td>';
        echo '<td>' . htmlspecialchars($row['ganados']) . '-' . htmlspecialchars($row['perdidos']) . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';

    // Comprobar si hay resultados en la segunda tabla
    if ($result_segunda->num_rows > 0) {
        // Segunda tabla
        echo '<table border="0">';
        echo '<tr><th>EQUIPO</th><th>RACHA&nbsp;&nbsp;</th></tr>';

        // Mostrar los datos en la segunda tabla
        while ($row = $result_segunda->fetch_assoc()) {
            echo '<tr>';
            // Mostrar la imagen en lugar del nombre
            echo '<td><img src="escudos/equipo 1 ' . htmlspecialchars($row['nombre']) . '.png" alt="' . htmlspecialchars($row['nombre']) . '" style="height: 35px; width: auto;"></td>';
            echo '<td>' . htmlspecialchars($row['ganados']) . '-' . htmlspecialchars($row['perdidos']) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No hay datos disponibles para los otros equipos.';
    }
} else {
    echo 'No hay datos disponibles para la primera tabla.';
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos de la NBA</title>
    <link rel="icon" type="image/png" href="favicon_logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200..700&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Aquí puedes incluir otros elementos de HTML si lo deseas -->
</body>
</html>
