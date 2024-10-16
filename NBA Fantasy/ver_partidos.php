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

$fechaFiltro = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');

// Función para obtener el mejor jugador del equipo visitante
function mejorJugadorEntreEquipos($conn, $equipoLocal, $equipoVisitanteDiminutivo, $jugadorDestacando2) {
    $sql = "SELECT nombre FROM jugadores WHERE equipoDiminutivo = ? AND nombre != ? ORDER BY valor DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $equipoVisitanteDiminutivo, $jugadorDestacando2);
    $stmt->execute();
    $result = $stmt->get_result();
    $jugador = $result->fetch_assoc();
    
    // Si el jugador destacado es igual al mejor jugador, busca el siguiente
    if ($jugador && $jugador['nombre'] === $jugadorDestacando2) {
        $jugador = $result->fetch_assoc(); // Obtener el siguiente jugador
    }

    return $jugador ? $jugador['nombre'] : 'No hay jugadores';
}

// Función para obtener el mejor jugador del equipo local
function mejorJugador2EntreEquipos($conn, $equipoLocal, $jugadorDestacando, $jugadorDestacando2) {
    $sql = "SELECT nombre FROM jugadores WHERE equipo = ? AND nombre != ? ORDER BY valor DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $equipoLocal, $jugadorDestacando);
    $stmt->execute();
    $result = $stmt->get_result();
    $jugador = $result->fetch_assoc();

    // Si el jugador destacado es igual al mejor jugador, busca el siguiente
    if ($jugador && $jugador['nombre'] === $jugadorDestacando) {
        $jugador = $result->fetch_assoc(); // Obtener el siguiente jugador
    }

    return $jugador ? $jugador['nombre'] : 'No hay jugadores';
}

// Función para obtener el mejor jugador por equipo
function jugadorDestacando($conn, $equipo) {
    $sql = "SELECT nombre FROM jugadores WHERE equipo = ? ORDER BY puntosUltimoPartido DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $equipo);
    $stmt->execute();
    $result = $stmt->get_result();
    $jugador = $result->fetch_assoc();
    return $jugador ? $jugador['nombre'] : 'No hay jugadores';
}

// Función para obtener el mejor jugador por equipoDiminutivo
function jugadorDestacando2($conn, $equipoDiminutivo) {
    $sql = "SELECT nombre FROM jugadores WHERE equipoDiminutivo = ? ORDER BY puntosUltimoPartido DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $equipoDiminutivo);
    $stmt->execute();
    $result = $stmt->get_result();
    $jugador = $result->fetch_assoc();
    return $jugador ? $jugador['nombre'] : 'No hay jugadores';
}

// Función para obtener el tercer mejor jugador entre ambos equipos
function mejorJugador3EntreEquipos($conn, $equipoLocal, $equipoVisitanteDiminutivo, $jugadorDestacando, $jugadorDestacando2, $mejorJugador, $mejorJugador2) {
    $sql = "SELECT nombre FROM jugadores WHERE (equipo = ? OR equipoDiminutivo = ?) 
            AND nombre NOT IN (?, ?, ?, ?) ORDER BY valor DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $equipoLocal, $equipoVisitanteDiminutivo, $jugadorDestacando, $jugadorDestacando2, $mejorJugador, $mejorJugador2);
    $stmt->execute();
    $result = $stmt->get_result();
    $jugador = $result->fetch_assoc();

    return $jugador ? $jugador['nombre'] : 'No hay jugadores';
}

// Obtener la fecha actual
$fechaActual = date('Y-m-d');

// Verificar si se presionó el botón de "Ver todos los partidos futuros"
if (isset($_POST['ver_todos'])) {
    // Si se presionó el botón, mostrar todos los partidos a partir de hoy o en el futuro
    $fechaFiltro = $fechaActual;
    $sql = "SELECT local, visitante, hora, dia, mes, anio
            FROM partidos 
            WHERE CONCAT(anio, '-', LPAD(mes, 2, '0'), '-', LPAD(dia, 2, '0')) >= ?";
} else {
    // Si no se presionó el botón, usar la fecha seleccionada en el filtro
    $fechaSeleccionada = isset($_POST['fecha']) ? $_POST['fecha'] : $fechaActual;
    $fechaFiltro = $fechaSeleccionada;
    $sql = "SELECT local, visitante, hora, dia, mes, anio
            FROM partidos 
            WHERE CONCAT(anio, '-', LPAD(mes, 2, '0'), '-', LPAD(dia, 2, '0')) = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $fechaFiltro);
$stmt->execute();
$result = $stmt->get_result();

// Array para almacenar los partidos
$partidos = [];
if ($result->num_rows > 0) {
    // Agregar cada fila al array
    while ($row = $result->fetch_assoc()) {
        $row['jugador_destacando'] = jugadorDestacando($conn, $row['local']); // Mejor jugador del local
        $row['jugador_destacando2'] = jugadorDestacando2($conn, $row['visitante']); // Mejor jugador del visitante
        $row['mejor_jugador'] = mejorJugadorEntreEquipos($conn, $row['local'], $row['visitante'], $row['jugador_destacando2']); // Mejor jugador del visitante
        $row['mejor_jugador2'] = mejorJugador2EntreEquipos($conn, $row['local'], $row['jugador_destacando'], $row['jugador_destacando2']); // Mejor jugador del local
        $row['mejor_jugador3'] = mejorJugador3EntreEquipos($conn, $row['local'], $row['visitante'], $row['jugador_destacando'], $row['jugador_destacando2'], $row['mejor_jugador'], $row['mejor_jugador2']); // Tercer mejor jugador
        $partidos[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Array de nombres de meses en español
$meses = [
    1 => 'Enero',
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Septiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre'
];
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #0F0F1A;
        }
        #partidos-container {
            margin-left: 200px; /* Margen de 200 píxeles desde la izquierda */
        }
        .partido {
            background-color: #333333;
            border: 1px solid #333333;
            border-radius: 25px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: calc(100% - 1000px); /* Ancho máximo 200 píxeles menos */
            width: auto; /* Dejar que el ancho se ajuste automáticamente */
        }
        .partido h2 {
            margin: 0 0 10px;
        }
        .partido p {
            margin: 5px 0;
            color: white;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="date"] {
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>Lista de Partidos de la NBA</h1>

<!-- Formulario para seleccionar la fecha -->
<form method="post" action="">
    <label for="fecha">Selecciona una fecha:</label>
    <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($fechaFiltro); ?>" required>
    &nbsp;&nbsp;<input type="submit" value="Filtrar">
    &nbsp;&nbsp;<input type="submit" name="ver_todos" value="Volver a hoy">
</form>

<div id="partidos-container">
    <?php if (empty($partidos)): ?>
        <div class="partido">
            <p>No hay partidos disponibles.</p>
        </div>
    <?php else: ?>
        <?php foreach ($partidos as $partido): ?>
            <div class="partido" style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
                <span style="font-weight: bold; color: white; font-family: saira condensed; font-size: 30px; margin-bottom: -18px">
                    <?php echo htmlspecialchars($partido['dia']) . ' de ' . htmlspecialchars($meses[(int)$partido['mes']]) . ' del ' . htmlspecialchars($partido['anio']) . ' - ' . htmlspecialchars($partido['hora']); ?>
                </span>
                
                <div style="display: flex; align-items: center; margin-top: 10px;">
                    <img src="escudos/equipo 1 <?php echo htmlspecialchars($partido['local'])?>.png" alt="">
                    <span style="color: white; font-family: saira condensed; font-size: 30px; font-weight: bold; margin: 0 10px; vertical-align: super; display: inline-block; line-height: 80px;"> VS </span>
                    <img src="escudos/equipo 2 <?php echo htmlspecialchars($partido['visitante'])?>.png" alt="">
                </div>
                
                <div style="display: flex; align-items: center; margin-top: 10px;">
                    <img style="height: 130px; margin-top: 10px;" src="jugadores/<?php echo htmlspecialchars($partido['mejor_jugador2']); ?>.png" alt="Segundo Mejor Jugador">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <img style="height: 130px; margin-top: 10px;" src="jugadores/<?php echo htmlspecialchars($partido['jugador_destacando']); ?>.png" alt="Jugador Destacando">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <img style="height: 130px; margin-top: 10px;" src="jugadores/<?php echo htmlspecialchars($partido['mejor_jugador3']); ?>.png" alt="Tercer Mejor Jugador">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <img style="height: 130px; margin-top: 10px;" src="jugadores/<?php echo htmlspecialchars($partido['jugador_destacando2']); ?>.png" alt="Jugador Destacando 2">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <img style="height: 130px; margin-top: 10px;" src="jugadores/<?php echo htmlspecialchars($partido['mejor_jugador']); ?>.png" alt="Mejor Jugador">
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    
</div>
</body>
</html>