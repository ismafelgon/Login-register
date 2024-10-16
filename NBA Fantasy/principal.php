<?php

session_start();

if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Inicia sesión para poder hacer eso");
        </script>
    ';
    header("location: index.php");
    session_destroy();
    die();
}

$inc = include("../php/conexion_be.php");


if ($inc) {
    // Obtener el nombre de usuario desde la sesión
    $usuario_sesion = $_SESSION['usuario'];

    // Consulta SQL para obtener el usuario que coincida con el valor de $_SESSION['usuario']
    $consulta = "SELECT * FROM usuarios WHERE correo = '$usuario_sesion'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && $resultado->num_rows > 0) {
        while ($row = $resultado->fetch_array()) {
            $id = $row['id'];
            $nombre_completo = $row['nombre_completo'];
            $usuario = $row['usuario'];
            $contrasena = $row['contrasena'];
            $correo = $row['correo'];
            $base = $row['base'];
            $escolta = $row['escolta'];
            $alero = $row['alero'];
            $alapivot = $row['alapivot'];
            $pivot = $row['pivot'];
            $manager = $row['manager'];
            $reserva = $row['reserva'];
            $dinero = $row['dinero'];
            $puntos = $row['puntos'];
            $perfil = $row['perfil'];
            $recompensa = $row['recompensa'];
           
        }
    } else {
        echo "No se encontró el usuario en la base de datos.";
    }
} else {
    echo "No se pudo conectar a la base de datos.";
}

if ($inc) {
    $consulta = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conexion, $consulta);
    $usuarios = [];

    if ($resultado) {
        while ($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row; // Agregar cada usuario al array
        }
    }

    $usuarios_json = json_encode($usuarios); // Convertir el array a JSON
}

 // Verificar si se recibe el parámetro 'base'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['base'])) {
    $base_actualizado = $_POST['base']; // Captura el valor del parámetro 'base'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET base = ? WHERE id = ?");
    $query->bind_param("si", $base_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "Base actualizada correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

 // Verificar si se recibe el parámetro 'escolta'
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['escolta'])) {
    $escolta_actualizado = $_POST['escolta']; // Captura el valor del parámetro 'escolta'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET escolta = ? WHERE id = ?");
    $query->bind_param("si", $escolta_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "escolta actualizada correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

// Verificar si se recibe el parámetro 'alero'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alero'])) {
   $alero_actualizado = $_POST['alero']; // Captura el valor del parámetro 'alero'

   // Consulta SQL preparada
   $query = $conexion->prepare("UPDATE usuarios SET alero = ? WHERE id = ?");
   $query->bind_param("si", $alero_actualizado, $id);
   
   // Ejecutar la consulta
   if ($query->execute()) {
       echo "alero actualizada correctamente";
   } else {
       echo "Error al actualizar: " . $conexion->error;
   }

   // Cerrar la consulta
   $query->close();
}

// Verificar si se recibe el parámetro 'alapivot'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alapivot'])) {
   $alapivot_actualizado = $_POST['alapivot']; // Captura el valor del parámetro 'alapivot'

   // Consulta SQL preparada
   $query = $conexion->prepare("UPDATE usuarios SET alapivot = ? WHERE id = ?");
   $query->bind_param("si", $alapivot_actualizado, $id);
   
   // Ejecutar la consulta
   if ($query->execute()) {
       echo "alapivot actualizada correctamente";
   } else {
       echo "Error al actualizar: " . $conexion->error;
   }

   // Cerrar la consulta
   $query->close();
}


// Verificar si se recibe el parámetro 'pivot'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pivot'])) {
    $pivot_actualizado = $_POST['pivot']; // Captura el valor del parámetro 'pivot'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET pivot = ? WHERE id = ?");
    $query->bind_param("si", $pivot_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "pivot actualizada correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

// Verificar si se recibe el parámetro 'manager'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['manager'])) {
    $manager_actualizado = $_POST['manager']; // Captura el valor del parámetro 'manager'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET manager = ? WHERE id = ?");
    $query->bind_param("si", $manager_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "manager actualizada correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

// Verificar si se recibe el parámetro 'reserva'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reserva'])) {
    $reserva_actualizado = $_POST['reserva']; // Captura el valor del parámetro 'reserva'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET reserva = ? WHERE id = ?");
    $query->bind_param("si", $reserva_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "reserva actualizada correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

// Verificar si se recibe el parámetro 'dinero'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dinero'])) {
    $dinero_actualizado = $_POST['dinero']; // Captura el valor del parámetro 'manager'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET dinero = ? WHERE id = ?");
    $query->bind_param("si", $dinero_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "dinero actualizada correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

class Jugador {
    public $nombre;
    public $nombreCompleto;
    public $equipo;
    public $posicion;
    public $valor;
    public $imagen;
    public $puntosUltimoPartido;
    public $puntosDosPartidosAtras;
    public $puntosTresPartidosAtras;
    public $disponible;
    public $clausula;
    public $lesionado;

    // Constructor
    public function __construct($nombre, $nombreCompleto, $equipo, $posicion, $valor, $imagen, $puntosUltimoPartido, $puntosDosPartidosAtras, $puntosTresPartidosAtras, $disponible, $clausula, $lesionado) {
        $this->nombre = $nombre;
        $this->nombreCompleto = $nombreCompleto;
        $this->equipo = $equipo;
        $this->posicion = $posicion;
        $this->valor = $valor;
        $this->imagen = $imagen;
        $this->puntosUltimoPartido = $puntosUltimoPartido;
        $this->puntosDosPartidosAtras = $puntosDosPartidosAtras;
        $this->puntosTresPartidosAtras = $puntosTresPartidosAtras;
        $this->disponible = $disponible;
        $this->clausula = $valor * 2; // Ejemplo de cláusula
        $this->lesionado = $lesionado;
    }
}

// Lista de jugadores
$jugadores = [
    //ATLANTA HAWKS
    new Jugador('snyder','Quin Snyder','Hawks','HC',75,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('trae','Trae Young','Hawks','PG',137,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('daniels','Dyson Daniels','Hawks','SG',84,'jugadores/daniels.png',30,25,18,true,' ',' '),
    new Jugador('risacher','Zaccharie Risacher','Hawks','SF',90,'jugadores/risacher.png',30,25,18,true,' ',' '),
    new Jugador('johnson','Jalen Johnson','Hawks','PF',123,'jugadores/johnson.png',30,25,18,true,' ',' '),
    new Jugador('capela','Clint Capela','Hawks','C',115,'jugadores/capela.png',30,25,18,true,' ',' '),
    new Jugador('hunter','De´Andre Hunter','Hawks','SF',115,'jugadores/hunter.png',30,25,18,true,' ',' '),
    new Jugador('bogdanovic','Bogdan Bogdanovic','Hawks','SG',119,'jugadores/bogdanovic.png',30,25,18,true,' ',' '),
    new Jugador('okongwu','Onyeka Okongwu','Hawks','PF',105,'jugadores/okongwu.png',30,25,18,true,' ',' '),
    new Jugador('nance jr','Larry Nance Jr','Hawks','PF',86,'jugadores/nance jr.png',30,25,18,true,' ',' '),
    new Jugador('bufkin','Kobe Bufkin','Hawks','PG',68,'jugadores/bufkin.png',30,25,18,true,' ',' '),
    new Jugador('zeller','Cody Zeller','Hawks','C',52,'jugadores/zeller.png',30,25,18,true,' ',' '),
    new Jugador('mathews','Garrison Mathews','Hawks','SG',66,'jugadores/mathews.png',30,25,18,true,' ',' '),

    //BOSTON CELTICS
    new Jugador('mazzulla','Joe Mazzulla','Celtics','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('holiday','Jrue Holiday','Celtics','PG',114,'jugadores/holiday.png',30,25,18,true,' ',' '),
    new Jugador('white','Derrick White','Celtics','SG',120,'jugadores/white.png',30,25,18,true,' ',' '),
    new Jugador('brown','Jaylen Brown','Celtics','SF',135,'jugadores/brown.png',30,25,18,true,' ',' '),
    new Jugador('tatum','Jayson Tatum','Celtics','PF',145,'jugadores/tatum.png',30,25,18,true,' ',' '),
    new Jugador('porzingis','Kristaps Porzingis','Celtics','C',132,'jugadores/porzingis.png',30,25,18,true,' ','| 🚨 Vuelta esperada: Diciembre'),
    new Jugador('pritchard','Payton Pritchard','Celtics','PG',101,'jugadores/pritchard.png',30,25,18,true,' ',' '),
    new Jugador('springer','Jaden Springer','Celtics','SG',57,'jugadores/springer.png',30,25,18,true,' ',' '),
    new Jugador('hauser','Sam Hauser','Celtics','SF',99,'jugadores/hauser.png',30,25,18,true,' ',' '),
    new Jugador('tillman','Xavier Tillman','Celtics','PF',78,'jugadores/tillman.png',30,25,18,true,' ',' '),
    new Jugador('kornet','Luke Kornet','Celtics','C',83,'jugadores/kornet.png',30,25,18,true,' ',' '),
    new Jugador('queta','Neemias Queta','Celtics','C',86,'jugadores/queta.png',30,25,18,true,' ',' '),
    new Jugador('horford','Al Horford','Celtics','PF',104,'jugadores/horford.png',30,25,18,true,' ',' '),

    //BROOKLYN NETS
    new Jugador('fernandez','Jordi Fernandez','Nets','HC',70,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('schroder','Dennis Schroder','Nets','PG',111,'jugadores/schroder.png',30,25,18,true,' ',' '),
    new Jugador('thomas','Cam Thomas','Nets','SG',128,'jugadores/thomas.png',30,25,18,true,' ',' '),
    new Jugador('bogdanovic2','Bojan Bogdanovic','Nets','SF',109,'jugadores/bogdanovic2.png',30,25,18,true,' ',' '),
    new Jugador('johnson2','Cameron Johnson','Nets','PF',110,'jugadores/johnson2.png',30,25,18,true,' ',' '),
    new Jugador('claxton','Nic Claxton','Nets','C',113,'jugadores/claxton.png',30,25,18,true,' ',' '),
    new Jugador('simmons','Ben Simmons','Nets','PG',95,'jugadores/simmons.png',30,25,18,true,' ',' '),
    new Jugador('finneysmith','Dorian Finney-Smith','Nets','PF',94,'jugadores/finneysmith.png',30,25,18,true,' ',' '),
    new Jugador('williams2','Ziaire Williams','Nets','SF',88,'jugadores/williams2.png',30,25,18,true,' ',' '),
    new Jugador('sharpe','Day´Ron Sharpe','Nets','C',94,'jugadores/sharpe.png',30,25,18,true,' ',' '),
    new Jugador('clowney','Noah Clowney','Nets','SF',78,'jugadores/sharpe.png',30,25,18,true,' ',' '),
    new Jugador('whitehead','Dariq Whitehead','Nets','SF',50,'jugadores/whitehead.png',30,25,18,true,' ',' '),
    new Jugador('milton','Shake Milton','Nets','SG',66,'jugadores/whitehead.png',30,25,18,true,' ',' '),

    //CHARLOTTE HORNETS
    new Jugador('lee2','Charles Lee','Hornets','HC',58,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('ball','Lamelo Ball','Hornets','PG',134,'jugadores/ball.png',30,25,18,true,' ',' '),
    new Jugador('mann','Tre Mann','Hornets','SG',96,'jugadores/mann.png',30,25,18,true,' ',' '),
    new Jugador('bridges','Miles Bridges','Hornets','SF',128,'jugadores/bridges.png',30,25,18,true,' ',' '),
    new Jugador('miller','Brandon Miller','Hornets','PF',117,'jugadores/miller.png',30,25,18,true,' ',' '),
    new Jugador('williams3','Mark Williams','Hornets','C',116,'jugadores/williams3.png',30,25,18,true,' ',' '),
    new Jugador('williams4','Grant Williams','Hornets','PF',99,'jugadores/williams4.png',30,25,18,true,' ',' '),
    new Jugador('green2','Josh Green','Hornets','SF',90,'jugadores/green2.png',30,25,18,true,' ',' '),
    new Jugador('martin2','Cody Martin','Hornets','SF',87,'jugadores/martin2.png',30,25,18,true,' ',' '),
    new Jugador('micic','Vasilije Micic','Hornets','PG',83,'jugadores/micic.png',30,25,18,true,' ',' '),
    new Jugador('richards','Nick Richards','Hornets','C',102,'jugadores/richards.png',30,25,18,true,' ',' '),
    new Jugador('curry2','Seth Curry','Hornets','SG',72,'jugadores/curry2.png',30,25,18,true,' ',' '),
    new Jugador('salaun','Tidjane Salaun','Hornets','SF',85,'jugadores/salaun.png',30,25,18,true,' ',' '),

    //CHICAGO BULLS
    new Jugador('donovan','Billy Donovan','Bulls','HC',77,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('giddey','Josh Giddey','Bulls','PG',115,'jugadores/giddey.png',30,25,18,true,' ',' '),
    new Jugador('white2','Coby White','Bulls','SG',125,'jugadores/white2.png',30,25,18,true,' ',' '),
    new Jugador('lavine','Zach Lavine','Bulls','SF',125,'jugadores/lavine.png',30,25,18,true,' ',' '),
    new Jugador('williams5','Patrick Williams','Bulls','PF',99,'jugadores/williams5.png',30,25,18,true,' ',' '),
    new Jugador('vucevic','Nikola Vucevic','Bulls','C',129,'jugadores/vucevic.png',30,25,18,true,' ',' '),
    new Jugador('buzelis','Matas Buzelis','Bulls','SF',75,'jugadores/buzelis.png',30,25,18,true,' ',' '),
    new Jugador('ball2','Lonzo Ball','Bulls','PG',61,'jugadores/ball2.png',30,25,18,true,' ',' '),
    new Jugador('smith','Jalen Smith','Bulls','PF',101,'jugadores/smith.png',30,25,18,true,' ',' '),
    new Jugador('dosunmu','Ayo Dosunmu','Bulls','SF',104,'jugadores/dosunmu.png',30,25,18,true,' ',' '),
    new Jugador('carter2','Jevon Carter','Bulls','PG',68,'jugadores/carter2.png',30,25,18,true,' ',' '),
    new Jugador('duarte','Chris Duarte','Bulls','SG',61,'jugadores/duarte.png',30,25,18,true,' ',' '),
    new Jugador('sanogo','Adama Sanogo','Bulls','C',76,'jugadores/sanogo.png',30,25,18,true,' ',' '),

    //CLEVELAND CAVALIERS
    new Jugador('atkinson','Kenny Atkinson','Cavaliers','HC',90,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('garland','Darius Garland','Cavaliers','PG',122,'jugadores/garland.png',30,25,18,true,' ',' '),
    new Jugador('mitchell','Donovan Mitchell','Cavaliers','SG',141,'jugadores/mitchell.png',30,25,18,true,' ',' '),
    new Jugador('strus','Max Strus','Cavaliers','SF',111,'jugadores/strus.png',30,25,18,true,' ',' '),
    new Jugador('mobley','Evan Mobley','Cavaliers','PF',124,'jugadores/mobley.png',30,25,18,true,' ',' '),
    new Jugador('allen2','Jarrett Allen','Cavaliers','C',128,'jugadores/allen2.png',30,25,18,true,' ',' '),
    new Jugador('levert','Caris Levert','Cavaliers','SG',114,'jugadores/levert.png',30,25,18,true,' ',' '),
    new Jugador('niang','Georges Niang','Cavaliers','SF',96,'jugadores/niang.png',30,25,18,true,' ',' '),
    new Jugador('wade','Dean Wade','Cavaliers','PF',83,'jugadores/wade.png',30,25,18,true,' ',' '),
    new Jugador('merrill','Sam Merrill','Cavaliers','SG',87,'jugadores/merrill.png',30,25,18,true,' ',' '),
    new Jugador('thor','JT Thor','Cavaliers','SF',58,'jugadores/thor.png',30,25,18,true,' ',' '),
    new Jugador('thompson2','Tristan Thompson','Cavaliers','C',66,'jugadores/thompson2.png',30,25,18,true,' ',' '),
    new Jugador('tyson','Jaylon Tyson','Cavaliers','SF',60,'jugadores/tyson.png',30,25,18,true,' ',' '),

    //DALLAS MAVERICKS
    new Jugador('kidd','Jason Kidd','Mavericks','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('doncic','Luka Doncic','Mavericks','PG',150,'jugadores/doncic.png',27,23,20,true,' ',' '),
    new Jugador('irving','Kyrie Irving','Mavericks','PG',139,'jugadores/irving.png',27,23,20,true,' ',' '),
    new Jugador('thompson','Klay Thompson','Mavericks','SG',120,'jugadores/thompson.png',27,23,20,true,' ',' '),
    new Jugador('washington','PJ Washington','Mavericks','PF',110,'jugadores/washington.png',27,23,20,true,' ',' '),
    new Jugador('gafford','Daniel Gafford','Mavericks','C',108,'jugadores/gafford.png',27,23,20,true,' ',' '),
    new Jugador('lively','Dereck Lively II','Mavericks','C',102,'jugadores/lively.png',27,23,20,true,' ',' '),
    new Jugador('dinwiddie','Spencer Dinwiddie','Mavericks','PG',101,'jugadores/dinwiddie.png',27,23,20,true,' ',' '),
    new Jugador('grimes','Quentin Grimes','Mavericks','SG',82,'jugadores/grimes.png',27,23,20,true,' ',' '),
    new Jugador('marshall','Naji Marshall','Mavericks','SF',90,'jugadores/marshall.png',27,23,20,true,' ',' '),
    new Jugador('kleber','Maxi Kleber','Mavericks','PF',77,'jugadores/kleber.png',27,23,20,true,' ',' '),
    new Jugador('powell','Dwight Powell','Mavericks','C',66,'jugadores/powell.png',27,23,20,true,' ',' '),
    new Jugador('exum','Dante Exum','Mavericks','PG',93,'jugadores/exum.png',27,23,20,true,' ',' '),

    //DENVER NUGGETS
    new Jugador('malone','Michael Malone','Nuggets','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('murray2','Jamal Murray','Nuggets','PG',131,'jugadores/murray2.png',27,23,20,true,' ',' '),
    new Jugador('braun','Christian Braun','Nuggets','SG',88,'jugadores/braun.png',27,23,20,true,' ',' '),
    new Jugador('porter jr','Michael Porter Jr','Nuggets','SF',125,'jugadores/porter jr.png',27,23,20,true,' ',' '),
    new Jugador('gordon2','Aaron Gordon','Nuggets','PF',119,'jugadores/gordon2.png',27,23,20,true,' ',' '),
    new Jugador('jokic','Nikola Jokic','Nuggets','C',150,'jugadores/jokic.png',27,23,20,true,' ',' '),
    new Jugador('westbrook','Russell Westbrook','Nuggets','PG',107,'jugadores/westbrook.png',27,23,20,true,' ',' '),
    new Jugador('nnaji','Zeke Nnaji','Nuggets','PF',55,'jugadores/nnaji.png',27,23,20,true,' ',' '),
    new Jugador('saric','Dario Saric','Nuggets','PF',93,'jugadores/saric.png',27,23,20,true,' ',' '),
    new Jugador('jordan','DeAndre Jordan','Nuggets','C',70,'jugadores/jordan.png',27,23,20,true,' ',' '),
    new Jugador('strawther','Julian Strawther','Nuggets','SG',63,'jugadores/strawther.png',27,23,20,true,' ',' '),
    new Jugador('watson','Peyton Watson','Nuggets','SF',83,'jugadores/watson.png',27,23,20,true,' ',' '),
    new Jugador('holmes ii','DaRon Holmes II','Nuggets','C',50,'jugadores/holmes ii.png',27,23,20,true,' ','| 🚨 Vuelta esperada: Julio 2025'),

    //DETROIT PISTONS
    new Jugador('bickerstaff','JB Bickerstaff','Pistons','HC',52,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('cunningham','Cade Cunningham','Pistons','PG',131,'jugadores/cunningham.png',27,23,20,true,' ',' '),
    new Jugador('ivey','Jaden Ivey','Pistons','SG',113,'jugadores/ivey.png',27,23,20,true,' ',' '),
    new Jugador('thompson3','Ausar Thompson','Pistons','SF',98,'jugadores/thompson3.png',27,23,20,true,' ',' '),
    new Jugador('harris','Tobias Harris','Pistons','PF',124,'jugadores/thompson3.png',27,23,20,true,' ',' '),
    new Jugador('duren','Jalen Duren','Pistons','C',120,'jugadores/duren.png',27,23,20,true,' ',' '),
    new Jugador('hardaway','Tim Hardaway Jr','Pistons','SG',111,'jugadores/hardaway.png',27,23,20,true,' ',' '),
    new Jugador('stewart','Isaiah Stewart','Pistons','C',105,'jugadores/stewart.png',27,23,20,true,' ',' '),
    new Jugador('sasser','Marcus Sasser','Pistons','PG',86,'jugadores/sasser.png',27,23,20,true,' ',' '),
    new Jugador('reed','Paul Reed','Pistons','SG',95,'jugadores/reed.png',27,23,20,true,' ',' '),
    new Jugador('fontecchio','Simone Fontecchio','Pistons','SF',100,'jugadores/fontecchio.png',27,23,20,true,' ',' '),
    new Jugador('beasley','Malik Beasley','Pistons','SG',105,'jugadores/beasley.png',27,23,20,true,' ',' '),
    new Jugador('holland','Ron Holland II','Pistons','SF',85,'jugadores/holland.png',27,23,20,true,' ',' '),

    //GOLDEN STATE WARRIORS
    new Jugador('kerr','Steve Kerr','Warriors','HC',86,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('curry','Stephen Curry','Warriors','PG',139,'jugadores/curry.png',27,23,20,true,' ',' '),
    new Jugador('podziemski','Brandin Podziemski','Warriors','SG',104,'jugadores/podziemski.png',27,23,20,true,' ',' '),
    new Jugador('wiggins','Andrew Wiggins','Warriors','SF',110,'jugadores/wiggins.png',27,23,20,true,' ',' '),
    new Jugador('green3','Draymond Green','Warriors','PF',106,'jugadores/green3.png',27,23,20,true,' ',' '),
    new Jugador('looney','Kevon Looney','Warriors','C',82,'jugadores/looney.png',27,23,20,true,' ',' '),
    new Jugador('kuminga','Jonathan Kuminga','Warriors','PF',119,'jugadores/kuminga.png',27,23,20,true,' ',' '),
    new Jugador('jacksondavis','Trayce Jackson-Davis','Warriors','C',94,'jugadores/jacksondavis.png',27,23,20,true,' ',' '),
    new Jugador('melton','De´Anthony Melton','Warriors','SG',107,'jugadores/melton.png',27,23,20,true,' ',' '),
    new Jugador('payton','Gary Payton II','Warriors','SG',78,'jugadores/payton.png',27,23,20,true,' ',' '),
    new Jugador('hield','Buddy Hield','Warriors','SG',106,'jugadores/hield.png',27,23,20,true,' ',' '),
    new Jugador('anderson','Kyle Anderson','Warriors','SF',88,'jugadores/anderson.png',27,23,20,true,' ',' '),
    new Jugador('santos','Gui Santos','Warriors','SF',63,'jugadores/santos.png',27,23,20,true,' ',' '),

    //HOUSTON ROCKETS
    new Jugador('udoka','Ime Udoka','Rockets','HC',81,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('vanvleet','Fred VanVleet','Rockets','PG',123,'jugadores/vanvleet.png',27,23,20,true,' ',' '),
    new Jugador('green4','Jalen Green','Rockets','SG',127,'jugadores/green4.png',27,23,20,true,' ',' '),
    new Jugador('brooks','Dillon Brooks','Rockets','SF',107,'jugadores/brooks.png',27,23,20,true,' ',' '),
    new Jugador('smith jr','Jabari Smith Jr','Rockets','PF',116,'jugadores/smith jr.png',27,23,20,true,' ',' '),
    new Jugador('sengun','Alperen Sengun','Rockets','C',135,'jugadores/sengun.png',27,23,20,true,' ',' '),
    new Jugador('adams','Steven Adams','Rockets','C',64,'jugadores/adams.png',27,23,20,true,' ',' '),
    new Jugador('thompson4','Amen Thompson','Rockets','SF',104,'jugadores/thompson4.png',27,23,20,true,' ',' '),
    new Jugador('landale','Jock Landale','Rockets','C',78,'jugadores/landale.png',27,23,20,true,' ',' '),
    new Jugador('green5','Jeff Green','Rockets','PF',79,'jugadores/green5.png',27,23,20,true,' ',' '),
    new Jugador('tate','Jae´Sean Tate','Rockets','SF',71,'jugadores/tate.png',27,23,20,true,' ',' '),
    new Jugador('holiday2','Aaron Holiday','Rockets','PG',83,'jugadores/holiday2.png',27,23,20,true,' ',' '),
    new Jugador('sheppard','Reed Sheppard','Rockets','SG',90,'jugadores/sheppard.png',27,23,20,true,' ',' '),

    //INDIANA PACERS
    new Jugador('carlisle','Rick Carlisle','Pacers','HC',93,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('haliburton','Tyrese Haliburton','Pacers','PG',131,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('nembhard','Andrew Nembhard','Pacers','SG',95,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('nesmith','Aaron Nesmith','Pacers','SF',107,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('siakam','Pascal Siakam','Pacers','PF',133,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('turner','Myles Turner','Pacers','C',124,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('toppin','Obi Toppin','Pacers','PF',101,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('mcconnell','T.J. McConnell','Pacers','PG',101,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('mathurin','Bennedict Mathurin','Pacers','SG',112,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('walker','Jarace Walker','Pacers','SF',63,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('jackson2','Isaiah Jackson','Pacers','SF',85,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('sheppard2','Ben Sheppard','Pacers','PG',67,'jugadores/sheppard.png',27,23,20,true,' ',' '),
    new Jugador('wiseman','James Wiseman','Pacers','C',87,'jugadores/sheppard.png',27,23,20,true,' ',' '),

    //LOS ANGELES CLIPPERS
    new Jugador('lue','Tyronn Lue','Clippers','HC',91,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('harden','James Harden','Clippers','PG',124,'jugadores/harden.png',27,23,20,true,' ',' '),        
    new Jugador('mann2','Terance Mann','Clippers','SG',94,'jugadores/mann2.png',27,23,20,true,' ',' '),        
    new Jugador('leonard','Kawhi Leonard','Clippers','SF',137,'jugadores/leonard.png',27,23,20,true,' ',' '),        
    new Jugador('jones jr','Derrick Jones Jr','Clippers','PF',93,'jugadores/jones jr.png',27,23,20,true,' ',' '),        
    new Jugador('zubac','Ivica Zubac','Clippers','C',115,'jugadores/zubac.png',27,23,20,true,' ',' '),        
    new Jugador('powell2','Norman Powell','Clippers','PG',110,'jugadores/powell2.png',27,23,20,true,' ',' '),        
    new Jugador('tucker','PJ Tucker','Clippers','PF',58,'jugadores/tucker.png',27,23,20,true,' ',' '),        
    new Jugador('dunn2','Kris Dunn','Clippers','SG',80,'jugadores/dunn2.png',27,23,20,true,' ',' '),        
    new Jugador('batum','Nicolas Batum','Clippers','PF',84,'jugadores/batum.png',27,23,20,true,' ',' '),        
    new Jugador('hyland','Bones Hyland','Clippers','PG',80,'jugadores/hyland.png',27,23,20,true,' ',' '),        
    new Jugador('coffey','Amir Coffey','Clippers','SG',79,'jugadores/coffey.png',27,23,20,true,' ',' '),        
    new Jugador('bamba','Mo Bamba','Clippers','C',74,'jugadores/bamba.png',27,23,20,true,' ',' '),        

    //LOS ANGELES LAKERS
    new Jugador('redick','JJ Redick','Lakers','HC',88,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('lebron','LeBron James','Lakers','SF',142,'jugadores/reaves.png',23,28,37,true,' ',' '),
    new Jugador('russell','D´Angelo Russell','Lakers','PG',123,'jugadores/davis.png',23,28,37,true,' ',' '),
    new Jugador('reaves','Austin Reaves','Lakers','SG',118,'jugadores/reaves.png',23,28,37,true,' ',' '),
    new Jugador('davis','Anthony Davis','Lakers','C',143,'jugadores/davis.png',23,28,37,true,' ',' '),
    new Jugador('hachimura','Rui Hachimura','Lakers','SF',111,'jugadores/hachimura.png',23,28,37,true,' ',' '),
    new Jugador('vincent','Gabe Vincent','Lakers','PG',59,'jugadores/vincent.png',23,28,37,true,' ',' '),
    new Jugador('james jr','Bronny James Jr','Lakers','PG',72,'jugadores/james jr.png',23,28,37,true,' ',' '),
    new Jugador('christie','Max Christie','Lakers','SG',67,'jugadores/christie.png',23,28,37,true,' ',' '),
    new Jugador('reddish','Cam Reddish','Lakers','SF',73,'jugadores/reddish.png',23,28,37,true,' ',' '),
    new Jugador('knecht','Dalton Knecht','Lakers','SF',65,'jugadores/knecht.png',23,28,37,true,' ',' '),
    new Jugador('vanderbilt','Jarred Vanderbilt','Lakers','PF',83,'jugadores/vanderbilt.png',23,28,37,true,' ',' '),
    new Jugador('wood','Christian Wood','Lakers','SF',90,'jugadores/wood.png',23,28,37,true,' ','| 🚨 Vuelta esperada: Noviembre'),

    //MEMPHIS GRIZZLIES
    new Jugador('jenkins','Taylor Jenkins','Grizzlies','HC',65,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('morant','Ja Morant','Grizzlies','PG',139,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('smart','Marcus Smart','Grizzlies','SG',111,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('bane','Desmond Bane','Grizzlies','SF',132,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('jackson3','Jaren Jackson Jr','Grizzlies','PF',130,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('edey','Zach Edey','Grizzlies','C',90,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('clarke','Brandon Clarke','Grizzlies','PF',105,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('kennard','Luke Kennard','Grizzlies','SG',98,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('konchar','John Konchar','Grizzlies','SG',74,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('aldama','Santi Aldama','Grizzlies','PF',103,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('williams9','Vince Williams Jr','Grizzlies','PG',78,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('laravia','Jake LaRavia','Grizzlies','SF',99,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('jackson4','GG Jackson II','Grizzlies','SF',111,'jugadores/wood.png',23,28,37,true,' ','| 🚨 Vuelta esperada: Diciembre'),

    //MIAMI HEAT
    new Jugador('spoelstra','Eric Spoelstra','Heat','HC',86,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('rozier','Terry Rozier','Heat','PG',124,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('herro','Tyler Herro','Heat','SG',130,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('jovic','Nikola Jovic','Heat','SF',94,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('butler','Jimmy Butler','Heat','PF',131,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('adebayo','Bam Adebayo','Heat','C',132,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('robinson2','Duncan Robinson','Heat','SF',107,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('highsmith','Haywood Highsmith','Heat','SF',81,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('love','Kevin Love','Heat','PF',101,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('jaquez','Jaime Jaquez Jr','Heat','PG',106,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('richardson','Josh Richardson','Heat','SG',95,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('bryant','Thomas Bryant','Heat','C',81,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('ware','Kel´El Ware','Heat','C',70,'jugadores/wood.png',23,28,37,true,' ',' '),

    //MILWAUKEE BUCKS
    new Jugador('rivers','Doc Rivers','Bucks','HC',90,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('lillard','Damian Lillard','Bucks','PG',137,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('trent jr','Gary Trent Jr','Bucks','SG',107,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('middleton','Khris Middleton','Bucks','SF',118,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('giannis','Giannis Antetokounmpo','Bucks','PF',150,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('lopez','Brook Lopez','Bucks','C',111,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('portis','Bobby Portis','Bucks','SF',116,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('connaughton','Pat Connaughton','Bucks','SG',80,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('johnson4','AJ Johnson','Bucks','PG',50,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('beauchamp','MarJon Beauchamp','Bucks','SF',67,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('green','AJ Green','Bucks','PG',65,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('prince','Taurean Prince','Bucks','PF',92,'jugadores/wood.png',23,28,37,true,' ',' '),
    new Jugador('wright','Delon Wright','Bucks','SG',70,'jugadores/wood.png',23,28,37,true,' ',' '),

    //MINNESOTA TIMBERWOLVES
    new Jugador('finch','Chris Finch','Timberwolves','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('conley','Mike Conley','Timberwolves','PG',107,'jugadores/conley.png',27,23,20,true,' ',' '),        
    new Jugador('edwards','Anthony Edwards','Timberwolves','SG',140,'jugadores/edwards.png',27,23,20,true,' ',' '),        
    new Jugador('mcdaniels2','Jaden McDaniels','Timberwolves','SF',101,'jugadores/mcdaniels2.png',27,23,20,true,' ',' '),      
    new Jugador('gobert','Rudy Gobert','Timberwolves','C',126,'jugadores/gobert.png',27,23,20,true,' ',' '),        
    new Jugador('reid','Naz Reid','Timberwolves','C',113,'jugadores/reid.png',27,23,20,true,' ',' '),        
    new Jugador('alexanderwalker','Nickeil Alexander-Walker','Timberwolves','SG',91,'jugadores/alexanderwalker.png',27,23,20,true,' ',' '),        
    new Jugador('garza','Luka Garza','Timberwolves','C',61,'jugadores/garza.png',27,23,20,true,' ',' '),        
    new Jugador('ingles','Joe Ingles','Timberwolves','SG',73,'jugadores/ingles.png',27,23,20,true,' ',' '),        
    new Jugador('minott','Josh Minott','Timberwolves','SF',50,'jugadores/minott.png',27,23,20,true,' ',' '),        
    new Jugador('dillingham','Rob Dillingham','Timberwolves','PG',80,'jugadores/dillingham.png',27,23,20,true,' ',' '),        
    new Jugador('shannon jr','Terrence Shannon Jr','Timberwolves','SF',50,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('divincenzo','Donte DiVincenzo','Timberwolves','SG',116,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('randle','Julius Randle','Timberwolves','PF',140,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

    //NEW ORLEANS PELICANS
    new Jugador('green6','Willie Green','Pelicans','HC',87,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('murray3','Dejounte Murray','Pelicans','PG',132,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('ingram','Brandon Ingram','Pelicans','SG',131,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('jones2','Herbert Jones','Pelicans','SF',104,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('williamson','Zion Williamson','Pelicans','PF',135,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('missi','Yves Missi','Pelicans','C',60,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('mccollum','CJ McCollum','Pelicans','SG',128,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('murphy','Trey Murphy III','Pelicans','SG',117,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('hawkins','Jordan Hawkins','Pelicans','PG',86,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('ryan','Matt Ryan','Pelicans','SF',72,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('r-earl','Jeremiah Robinson-Earl','Pelicans','SF',55,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('theis','Daniel Theis','Pelicans','C',85,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('alvarado','Jose Alvarado','Pelicans','PG',88,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

    //NEW YORK KNICKS
    new Jugador('thibodeau','Tom Thibodeau','Knicks','HC',87,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('brunson','Jalen Brunson','Knicks','PG',143,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('bridges2','Mikal Bridges','Knicks','SG',125,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('anunoby','OG Anunoby','Knicks','SF',117,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('robinson','Mitchell Robinson','Knicks','C',94,'jugadores/shannon jr.png',27,23,20,true,' ','| 🚨 Vuelta esperada: Diciembre'),
    new Jugador('hart','Josh Hart','Knicks','SG',110,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('achiuwa','Precious Achiuwa','Knicks','PF',96,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('mcbride','Miles McBride','Knicks','PG',87,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('batesdiop','Keita Bates-Diop','Knicks','SF',62,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('payne','Cameron Payne','Knicks','PG',84,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('dadiet','Pacome Diadet','Knicks','SF',50,'jugadores/shannon jr.png',27,23,20,true,' ',' '),        
    new Jugador('towns','Karl-Anthony Towns','Knicks','PF',136,'jugadores/towns.png',27,23,20,true,' ',' '),  

   //OKLAHOMA CITY THUNDER
    new Jugador('daigneault','Mark Daigneault','Thunder','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('shai','Shai Gilgeous-Alexander','Thunder','PG',147,'jugadores/shai.png',27,23,20,true,' ',' '),
    new Jugador('caruso','Alex Caruso','Thunder','SG',101,'jugadores/caruso.png',27,23,20,true,' ',' '),
    new Jugador('williams6','Jalen Williams','Thunder','SF',127,'jugadores/williams6.png',27,23,20,true,' ',' '),
    new Jugador('holmgren','Chet Holmgren','Thunder','PF',125,'jugadores/holmgren.png',27,23,20,true,' ',' '),
    new Jugador('hartenstein','Isaiah Hartenstein','Thunder','C',105,'jugadores/hartenstein.png',27,23,20,true,' ',' '),
    new Jugador('dort','Luguentz Dort','Thunder','SF',104,'jugadores/dort.png',27,23,20,true,' ',' '),
    new Jugador('joe','Isaiah Joe','Thunder','SG',92,'jugadores/joe.png',27,23,20,true,' ',' '),
    new Jugador('wiggins2','Aaron Wiggins','Thunder','SG',84,'jugadores/wiggins2.png',27,23,20,true,' ',' '),
    new Jugador('williams7','Kenrich Williams','Thunder','SF',76,'jugadores/williams7.png',27,23,20,true,' ',' '),
    new Jugador('wallace','Cason Wallace','Thunder','PG',84,'jugadores/wallace.png',27,23,20,true,' ',' '),
    new Jugador('topic','Nikola Topic','Thunder','PG',75,'jugadores/topic.png',27,23,20,true,' ','| 🚨 Vuelta esperada: Julio 2025'),
    new Jugador('jones','Dillon Jones','Thunder','SF',50,'jugadores/jones.png',27,23,20,true,' ',' '),

    //ORLANDO MAGIC
    new Jugador('mosley','Jamahl Mosley','Magic','HC',89,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('suggs','Jalen Suggs','Magic','PG',107,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('caldwellpope','Kentavious Caldwell-Pope','Magic','SG',102,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('wagner','Franz Wagner','Magic','SF',128,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('banchero','Paolo Banchero','Magic','PF',135,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('carter3','Wendell Carter Jr','Magic','C',108,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('isaac','Jonathan Isaac','Magic','PF',90,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('anthony','Cole Anthony','Magic','PG',106,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('wagner2','Moritz Wagner','Magic','C',103,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('bitadze','Goga Bitadze','Magic','C',81,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('black','Anthony Black','Magic','PG',69,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('harris2','Gary Harris','Magic','SG',83,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('da silva','Tristan Da Silva','Magic','PF',65,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

    //PHILADELPHIA 76ERS
    new Jugador('nurse','Nick Nurse','76ers','HC',88,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('maxey','Tyrese Maxey','76ers','PG',139,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('oubre','Kelly Oubre Jr','76ers','SG',116,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('george3','Paul George','76ers','SF',134,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('martin','Caleb Martin','76ers','PF',101,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('embiid','Joel Embiid','76ers','C',150,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('lowry','Kyle Lowry','76ers','PG',93,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('jackson','Reggie Jackson','76ers','PG',98,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('mccain','Jared McCain','76ers','SG',65,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('gordon','Eric Gordon','76ers','SG',100,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('drummond','Andre Drummond','76ers','C',103,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('martin jr','KJ Martin','76ers','SF',63,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
    new Jugador('yabusele','Guerchson Yabusele','76ers','PF',83,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

    //PHOENIX SUNS
    new Jugador('budenholzer','Mike Budenholzer','Suns','HC',89,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('jones','Tyus Jones','Suns','PG',102,'jugadores/jones.png',30,25,18,true,' ',' '),
    new Jugador('beal','Bradley Beal','Suns','SG',124,'jugadores/beal.png',30,25,18,true,' ',' '),
    new Jugador('booker','Devin Booker','Suns','SF',141,'jugadores/booker.png',30,25,18,true,' ',' '),
    new Jugador('durant','Kevin Durant','Suns','PF',142,'jugadores/durant.png',30,25,18,true,' ',' '),
    new Jugador('nurkic','Jusuf Nurkic','Suns','C',118,'jugadores/nurkic.png',30,25,18,true,' ',' '),
    new Jugador('morris','Monté Morris','Suns','PG',74,'jugadores/morris.png',30,25,18,true,' ',' '),
    new Jugador('allen','Grayson Allen','Suns','SG',124,'jugadores/allen.png',30,25,18,true,' ',' '),
    new Jugador('lee','Damion Lee','Suns','SG',82,'jugadores/lee.png',30,25,18,true,' ',' '),
    new Jugador('okogie','Josh Okogie','Suns','SF',71,'jugadores/okogie.png',30,25,18,true,' ',' '),
    new Jugador('oneale','Royce O´Neale','Suns','PF',95,'jugadores/oneale.png',30,25,18,true,' ',' '),
    new Jugador('plumlee','Mason Plumlee','Suns','C',83,'jugadores/plumlee.png',30,25,18,true,' ',' '),
    new Jugador('bolbol','Bol Bol','Suns','C',76,'jugadores/bolbol.png',30,25,18,true,' ',' '),

    //PORTLAND TRAIL BLAZERS
    new Jugador('billups','Chauncey Billups','Blazers','HC',58,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('henderson','Scoot Henderson','Blazers','PG',108,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('simons','Anfernee Simons','Blazers','SG',129,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('avdija','Deni Avdija','Blazers','SF',117,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('grant','Jerami Grant','Blazers','PF',124,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('ayton','Deandre Ayton','Blazers','C',125,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('graham','Devonte Graham','Blazers','PG',72,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('williams8','Robert Williams III','Blazers','C',88,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('thybulle','Matisse Thybulle','Blazers','SF',70,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('sharpe2','Shaedon Sharpe','Blazers','SG',115,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('moore','Taze Moore','Blazers','PF',61,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('murray4','Kris Murray','Blazers','SF',80,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('clingan','Donovan Clingan','Blazers','C',80,'jugadores/bolbol.png',30,25,18,true,' ',' '),

    //SACRAMENTO KINGS
    new Jugador('brown3','Mike Brown','Kings','HC',84,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('fox','De´Aaron Fox','Kings','PG',140,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('carter','Devin Carter','Kings','PG',70,'jugadores/bolbol.png',30,25,18,true,' ','| 🚨 Vuelta esperada: Enero 2025'),
    new Jugador('jones4','Colby Jones','Kings','PG',50,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('ellis','Keon Ellis','Kings','SG',77,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('monk','Malik Monk','Kings','SG',115,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('huerter','Kevin Huerter','Kings','SG',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('murray','Keegan Murray','Kings','SF',118,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('derozan','DeMar DeRozan','Kings','PF',134,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('lyles','Trey Lyles','Kings','PF',92,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('mcdaniels','Jalen McDaniels','Kings','PF',53,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('sabonis','Domantas Sabonis','Kings','C',137,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('alex len','Alex Len','Kings','C',61,'jugadores/bolbol.png',30,25,18,true,' ',' '),

    //SAN ANTONIO SPURS
    new Jugador('popovich','Gregg Popovich','Spurs','HC',61,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('paul','Chris Paul','Spurs','PG',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('vassell','Devin Vassell','Spurs','SG',123,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('barnes','Harrison Barnes','Spurs','SF',104,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('sochan','Jeremy Sochan','Spurs','PF',107,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('wemby','Victor Wembanyama','Spurs','C',135,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('castle','Stephon Castle','Spurs','SG',85,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('johnson3','Keldon Johnson','Spurs','SF',116,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('collins','Zach Collins','Spurs','PF',103,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('jones3','Tre Jones','Spurs','PG',102,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('branham','Malaki Branham','Spurs','SG',88,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('champagnie','Julian Champagnie','Spurs','SF',82,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('wesley','Blake Wesley','Spurs','SG',65,'jugadores/bolbol.png',30,25,18,true,' ',' '),

    //TORONTO RAPTORS
    new Jugador('rajakovic','Darko Rajakovic','Raptors','HC',65,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('quickley','Immanuel Quickley','Raptors','PG',120,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('dick','Gradey Dick','Raptors','SG',84,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('barrett','RJ Barrett','Raptors','SF',127,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('barnes2','Scottie Barnes','Raptors','PF',131,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('poeltl','Jakob Poeltl','Raptors','C',111,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('brown2','Bruce Brown','Raptors','SF',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('olynyk','Kelly Olynyk','Raptors','PF',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('boucher','Chris Boucher','Raptors','PF',85,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('mitchell2','Davion Mitchell','Raptors','PG',71,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('agbaji','Ochai Agbaji','Raptors','PG',75,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('temple','Garrett Temple','Raptors','SF',53,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('walter','Ja´Kobe Walter','Raptors','SF',60,'jugadores/bolbol.png',30,25,18,true,' ',' '),

    //UTAH JAZZ
    new Jugador('hardy','Will Hardy','Jazz','HC',70,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('george2','Keyonte George','Jazz','PG',105,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('sexton','Collin Sexton','Jazz','SG',121,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('markkanen','Lauri Markkanen','Jazz','SF',136,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('hendricks','Taylor Hendricks','Jazz','PF',87,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('collins2','John Collins','Jazz','C',118,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('clarkson','Jordan Clarkson','Jazz','PG',118,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('eubanks','Drew Eubanks','Jazz','PF',77,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('mykhailiuk','Svi Mykhailiuk','Jazz','SG',66,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('kessler','Walker Kessler','Jazz','C',98,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('mills','Patty Mills','Jazz','PG',61,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('collier','Isaiah Collier','Jazz','PG',50,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('williams','Cody Williams','Jazz','SF',75,'jugadores/bolbol.png',30,25,18,true,' ',' '),

    //WASHINGTON WIZARDS
    new Jugador('keefe','Brian Keefe','Wizards','HC',54,'jugadores/trae.png',30,25,18,true,' ',' '),
    new Jugador('poole','Jordan Poole','Wizards','PG',116,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('kispert','Corey Kispert','Wizards','SG',105,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('kuzma','Kyle Kuzma','Wizards','SF',130,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('sarr','Alex Sarr','Wizards','PF',90,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('valanciunas','Jonas Valanciunas','Wizards','C',115,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('brogdon','Malcolm Brogdon','Wizards','PG',116,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('holmes','Richaun Holmes','Wizards','SG',77,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('bagley','Marvin Bagley III','Wizards','PF',107,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('coulibaly','Bilal Coulibaly','Wizards','SG',89,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('bey','Saddiq Bey','Wizards','SF',114,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('baldwin','Patrick Baldwin Jr','Wizards','SF',71,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('carringhton','Bub Carringhton','Wizards','SG',70,'jugadores/bolbol.png',30,25,18,true,' ',' '),
    new Jugador('george','Kyshawn George','Wizards','SG',50,'jugadores/bolbol.png',30,25,18,true,' ',' '),




];



// Consulta SQL para obtener el nombre completo y la posición
$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

$valor_para_mostrar = 0;
$valor_para_mostrar2 = 0;
$valor_para_mostrar3 = 0;
$valor_para_mostrar4 = 0;
$valor_para_mostrar5 = 0;
$valor_para_mostrar6 = 0;
$valor_para_mostrar7 = 0;
if ($stmt) {
    $stmt->bind_param("s", $base); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar = $fila['nombreCompleto'];
        $posicion_para_mostrar = $fila['posicion'];
        $equipo_para_mostrar = $fila['equipo'];
        $valor_para_mostrar = $fila['valor'];
        $dueño_para_mostrar = $fila['dueño'];
        $lesion_para_mostrar = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar = $fila['contrincante'];
        $proximoPartido_para_mostrar = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar = $fila['fechaProximoPartido'];
        $puntos_para_mostrar = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

if ($stmt) {
    $stmt->bind_param("s", $escolta); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar2 = $fila['nombreCompleto'];
        $posicion_para_mostrar2 = $fila['posicion'];
        $equipo_para_mostrar2 = $fila['equipo'];
        $valor_para_mostrar2 = $fila['valor'];
        $estado_para_mostrar2 = $fila['disponible'];
        $lesion_para_mostrar2 = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar2 = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar2 = $fila['contrincante'];
        $proximoPartido_para_mostrar2 = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar2 = $fila['fechaProximoPartido'];
        $puntos_para_mostrar2 = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

if ($stmt) {
    $stmt->bind_param("s", $alero); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar3 = $fila['nombreCompleto'];
        $posicion_para_mostrar3 = $fila['posicion'];
        $equipo_para_mostrar3 = $fila['equipo'];
        $valor_para_mostrar3 = $fila['valor'];
        $estado_para_mostrar3 = $fila['disponible'];
        $lesion_para_mostrar3 = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar3 = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar3 = $fila['contrincante'];
        $proximoPartido_para_mostrar3 = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar3 = $fila['fechaProximoPartido'];
        $puntos_para_mostrar3 = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

if ($stmt) {
    $stmt->bind_param("s", $alapivot); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar4 = $fila['nombreCompleto'];
        $posicion_para_mostrar4 = $fila['posicion'];
        $equipo_para_mostrar4 = $fila['equipo'];
        $valor_para_mostrar4 = $fila['valor'];
        $estado_para_mostrar4 = $fila['disponible'];
        $lesion_para_mostrar4 = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar4 = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar4 = $fila['contrincante'];
        $proximoPartido_para_mostrar4 = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar4 = $fila['fechaProximoPartido'];
        $puntos_para_mostrar4 = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

if ($stmt) {
    $stmt->bind_param("s", $pivot); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar5 = $fila['nombreCompleto'];
        $posicion_para_mostrar5 = $fila['posicion'];
        $equipo_para_mostrar5 = $fila['equipo'];
        $valor_para_mostrar5 = $fila['valor'];
        $estado_para_mostrar5 = $fila['disponible'];
        $lesion_para_mostrar5 = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar5 = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar5 = $fila['contrincante'];
        $proximoPartido_para_mostrar5 = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar5 = $fila['fechaProximoPartido'];
        $puntos_para_mostrar5 = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

if ($stmt) {
    $stmt->bind_param("s", $manager); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar6 = $fila['nombreCompleto'];
        $posicion_para_mostrar6 = $fila['posicion'];
        $equipo_para_mostrar6 = $fila['equipo'];
        $valor_para_mostrar6 = $fila['valor'];
        $estado_para_mostrar6 = $fila['disponible'];
        $lesion_para_mostrar6 = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar6 = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar6 = $fila['contrincante'];
        $proximoPartido_para_mostrar6 = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar6 = $fila['fechaProximoPartido'];
        $puntos_para_mostrar6 = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$query = "SELECT nombreCompleto, posicion, equipo, valor, disponible, lesionado, puntosUltimoPartido, contrincante, proximoPartido, fechaProximoPartido, dueño, puntos FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query); // Prepara la consulta

if ($stmt) {
    $stmt->bind_param("s", $reserva); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Obtiene el resultado
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    // Verifica si se encontró un jugador
    if ($resultado->num_rows > 0) {
        // Asigna el valor de nombreCompleto y posición a las variables
        $fila = $resultado->fetch_assoc(); // Obtiene la fila como un array asociativo
        $nombre_para_mostrar7 = $fila['nombreCompleto'];
        $posicion_para_mostrar7 = $fila['posicion'];
        $equipo_para_mostrar7 = $fila['equipo'];
        $valor_para_mostrar7 = $fila['valor'];
        $estado_para_mostrar7 = $fila['disponible'];
        $lesion_para_mostrar7 = $fila['lesionado'];
        $puntos_ultimo_partido_para_mostrar7 = $fila['puntosUltimoPartido'];
        $contrincante_para_mostrar7 = $fila['contrincante'];
        $proximoPartido_para_mostrar7 = $fila['proximoPartido'];
        $fechaProximoPartido_para_mostrar7 = $fila['fechaProximoPartido'];
        $puntos_para_mostrar7 = $fila['puntos'];
    } else {
        echo "No se encontró el jugador.";
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conexion->error; // Mensaje si la preparación falla
}

$valor_del_equipo = 0; // Inicializa la variable

// Sumar los valores, solo si están definidos
if (isset($valor_para_mostrar)) {
    $valor_del_equipo += $valor_para_mostrar;
}

if (isset($valor_para_mostrar2)) {
    $valor_del_equipo += $valor_para_mostrar2;
}

if (isset($valor_para_mostrar3)) {
    $valor_del_equipo += $valor_para_mostrar3;
}

if (isset($valor_para_mostrar4)) {
    $valor_del_equipo += $valor_para_mostrar4;
}

if (isset($valor_para_mostrar5)) {
    $valor_del_equipo += $valor_para_mostrar5;
}

if (isset($valor_para_mostrar6)) {
    $valor_del_equipo += $valor_para_mostrar6;
}

if (isset($valor_para_mostrar7)) {
    $valor_del_equipo += $valor_para_mostrar7;
}



$sql = "
    DELETE FROM usuarios
    WHERE base = ? OR escolta = ? OR alero = ? OR alapivot = ? OR pivot = ? OR manager = ? OR reserva = ?
";

if ($stmt = $conexion->prepare($sql)) {
    // Asocia el valor a la consulta para todas las columnas
    $stmt->bind_param("sssssss", $clausula_nombre, $clausula_nombre, $clausula_nombre, $clausula_nombre, $clausula_nombre, $clausula_nombre, $clausula_nombre);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Verificar si se eliminaron filas
        if ($stmt->affected_rows > 0) {
            echo "Usuario eliminado correctamente.";
        } else {
            echo "No se encontró ningún usuario con el nombre: " . htmlspecialchars($clausula_nombre);
        }
    } else {
        // Error al ejecutar la consulta
        echo "Error al ejecutar la consulta: " . htmlspecialchars($stmt->error);
    }

    $stmt->close(); // Cierra la declaración
} else {
    // Error al preparar la consulta
    echo "Error al preparar la consulta: " . htmlspecialchars($conexion->error);
}

$data = json_decode(file_get_contents('php://input'));

$query = "SELECT dueño FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("s", $nombre);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();
    echo json_encode(['success' => true, 'dueño' => $fila['dueño']]);
} else {
    echo json_encode(['success' => false]);
}

$stmt->close();

$usuario_para_ver = "";
$usuario_para_ver_perfil = "";
$usuario_para_ver_dinero = "";
$usuario_para_ver_base = "";
$usuario_para_ver_escolta = "";
$usuario_para_ver_alero = "";
$usuario_para_ver_alapivot = "";
$usuario_para_ver_pivot = "";
$usuario_para_ver_manager = "";
$usuario_para_ver_reserva = "";
// Consulta para obtener los usuarios ordenados por puntos de mayor a menor
// Consulta para obtener los usuarios ordenados por puntos de mayor a menor
$sql = "
    SELECT usuario, puntos, perfil, dinero, base, escolta, alero, alapivot, pivot, reserva, manager
    FROM usuarios
    ORDER BY puntos DESC
";

// Ejecutar la consulta y guardar los resultados
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Iniciar la tabla con el encabezado
    echo "<table class='league-table'>
            <tr>
                <th width='20'>&nbspP</th>
                <th width='40'></th>
                <th width='300'>&nbspJugador</th>
                <th width='200'>&nbspEquipo</th>
                <th>&nbsp&nbsp&nbspPuntos&nbsp</th>
            </tr>";

    // Contador para las posiciones en la tabla
    $posicion = 1;

    // Recorrer los resultados y generar las filas de la tabla
    while ($fila = $resultado->fetch_assoc()) {
        // Comprobar si el usuario de la fila es el mismo que la variable $usuario
        $fondoFila = ($fila['usuario'] === $usuario) ? 'background-color: #28CCD6;' : '';

        // Usar htmlspecialchars() directamente para que se escape correctamente en JavaScript
        $usuario_para_ver = htmlspecialchars($fila['usuario']);
        $usuario_para_ver_perfil = htmlspecialchars($fila['perfil']);
        $usuario_para_ver_dinero = htmlspecialchars($fila['dinero']);
        $usuario_para_ver_base = htmlspecialchars($fila['base']);
        $usuario_para_ver_escolta = htmlspecialchars($fila['escolta']);
        $usuario_para_ver_alero = htmlspecialchars($fila['alero']);
        $usuario_para_ver_alapivot = htmlspecialchars($fila['alapivot']);
        $usuario_para_ver_pivot = htmlspecialchars($fila['pivot']);
        $usuario_para_ver_manager = htmlspecialchars($fila['manager']);
        $usuario_para_ver_reserva = htmlspecialchars($fila['reserva']);

        // Aplicar el estilo de fondo a la fila
        echo "<tr style='$fondoFila'> 
                <td class='Tablaa'>&nbsp" . $posicion . "</td>
                <td onclick=\"verDetalles('$usuario_para_ver', '$usuario_para_ver_perfil', '$usuario_para_ver_dinero', '$usuario_para_ver_base', '$usuario_para_ver_escolta', '$usuario_para_ver_alero', '$usuario_para_ver_alapivot', '$usuario_para_ver_pivot', '$usuario_para_ver_manager', '$usuario_para_ver_reserva')\" class='Tablaa-foto'>
                    <img src='avatars/avatar" . htmlspecialchars($fila['perfil']) . ".png' alt='' width='50' height='50'>
                </td>
                <td class='Tablaa' style='font-family: saira condensed; font-weight: 700; font-size: 25px'>&nbsp" . htmlspecialchars($fila['usuario']) . " ($" . htmlspecialchars($fila['dinero']) . ")</td> 
                <td>
                    <img src='jugadores/" . htmlspecialchars($fila['base']) . ".png' alt='Base' width='auto' height='30'>
                    <img src='jugadores/" . htmlspecialchars($fila['escolta']) . ".png' alt='Escolta' width='auto' height='30'>
                    <img src='jugadores/" . htmlspecialchars($fila['alero']) . ".png' alt='Alero' width='auto' height='30'>
                    <img src='jugadores/" . htmlspecialchars($fila['alapivot']) . ".png' alt='Alapivot' width='auto' height='30'>
                    <img src='jugadores/" . htmlspecialchars($fila['pivot']) . ".png' alt='Pivot' width='auto' height='30'>
                </td>
                <td class='Tablaa' style='font-family: saira condensed; font-weight: 700; font-size: 25px'>&nbsp&nbsp&nbsp&nbsp" . htmlspecialchars($fila['puntos']) . "</td> 
              </tr>";

        // Incrementar el contador de posición
        $posicion++;
    }

    echo "</table>"; // Cerrar tabla
} else {
    echo "No se encontraron usuarios.";
}


$puntosBase = null;
$puntosEscolta = null;
$puntosAlero = null;
$puntosAlapivot = null;
$puntosPivot = null;
$puntosReserva = null;
$puntosManager = null;

// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $base);
$stmt->execute();
$stmt->bind_result($puntosBase);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();



// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $escolta);
$stmt->execute();
$stmt->bind_result($puntosEscolta);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();



// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $alero);
$stmt->execute();
$stmt->bind_result($puntosAlero);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();



// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $alapivot);
$stmt->execute();
$stmt->bind_result($puntosAlapivot);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();



// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $pivot);
$stmt->execute();
$stmt->bind_result($puntosPivot);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();



// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $reserva);
$stmt->execute();
$stmt->bind_result($puntosReserva);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();



// Consultar en la tabla jugadores donde el nombre coincida con la variable $base
$sql = "SELECT puntosUltimoPartido FROM jugadores WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $manager);
$stmt->execute();
$stmt->bind_result($puntosManager);

// Obtener el resultado
if ($stmt->fetch()) {}

// Cerrar la consulta y la conexión
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['perfil'])) {
    $perfil_actualizado = $_POST['perfil']; // Captura el valor del parámetro 'base'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET perfil = ? WHERE id = ?");
    $query->bind_param("si", $perfil_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "Perfil actualizado correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recompensa'])) {
    $recompensa_actualizado = $_POST['recompensa']; // Captura el valor del parámetro 'base'

    // Consulta SQL preparada
    $query = $conexion->prepare("UPDATE usuarios SET recompensa = ? WHERE id = ?");
    $query->bind_param("si", $recompensa_actualizado, $id);
   
    // Ejecutar la consulta
    if ($query->execute()) {
        echo "Perfil actualizado correctamente";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    // Cerrar la consulta
    $query->close();
}

if (!isset($valor_de_venta_para_mostrar)) {
    $valor_de_venta_para_mostrar = floor($valor_para_mostrar * 0.75); // O un valor predeterminado
}

$queryJugadores = "SELECT id, nombre FROM jugadores";
$resultJugadores = mysqli_query($conexion, $queryJugadores);

// Iterar sobre cada jugador
while ($jugador = mysqli_fetch_assoc($resultJugadores)) {
    $jugadorId = $jugador['id'];
    $jugadorNombre = $jugador['nombre'];

    // Consultar en la tabla usuarios para encontrar al dueño usando el nombre del jugador
    $queryUsuario = "SELECT usuario FROM usuarios WHERE 
        base = '$jugadorNombre' OR 
        escolta = '$jugadorNombre' OR 
        alero = '$jugadorNombre' OR 
        alapivot = '$jugadorNombre' OR 
        pivot = '$jugadorNombre' OR 
        reserva = '$jugadorNombre' OR 
        manager = '$jugadorNombre'
    LIMIT 1"; // Solo necesitamos un dueño, así que usamos LIMIT 1

    $resultadoUsuario = mysqli_query($conexion, $queryUsuario);

    if ($resultadoUsuario && mysqli_num_rows($resultadoUsuario) > 0) {
        $usuario = mysqli_fetch_assoc($resultadoUsuario);
        $nombreDueno = $usuario['usuario']; // Cambia 'usuario' si necesitas obtener otra columna

        // Actualizar la tabla jugadores con el nombre del dueño
        $queryUpdate = "UPDATE jugadores SET dueño = '$nombreDueno' WHERE id = $jugadorId";
        mysqli_query($conexion, $queryUpdate);
    } else {
        // Si no se encuentra dueño, puedes dejar la columna 'dueño' como NULL
        $queryUpdate = "UPDATE jugadores SET dueño = NULL WHERE id = $jugadorId";
        mysqli_query($conexion, $queryUpdate);
    }
}

// Cerrar la conexión
$conexion->close();

?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA Fantasy</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon_logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200..700&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>


        body {
            font-family: Arial, sans-serif;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #1b1b2f;
        }

        .top-bar {
            width:100%;
            background-color: #2f3b52;
            padding: 5px 15px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .top-bar img {
            width: 300px;
        }

        .login-section {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .login-section input[type="text"]{
            color: white; /* Color del texto */
            background-color: #575A60;
            border: none;
            padding: 5px 10px;
            margin-right: 10px;
            border-radius: 5px;
            outline: none;
        }

        .cerrar_sesion {
            background-color: #28CCD6;
            border: none;
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            right: 47px;
        }

        .main-container {
            display: flex;
            width: 80%;
            margin-top: 80px;
            position: relative;
        }

        .left-panel {
            width: 65%;
            padding-right: 20px;
            position: relative;
            z-index: 1;
        }

        .header {
            position: absolute;
            top: -5;
            left: 0;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #28CCD6;
            padding: 5px 10px;
            border-radius: 10px;
            width: 1482;
            height: 70px;
        }

        .team-name {
            background-color: #23A9BB;
            padding: 5px 15px;
            border-radius: 10px;
            margin-left: 10px;
        }

        .header img {
            width: 50px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #1F8AA1;
            padding: 5px;
            border-radius: 5px;
            margin-left: auto;
        }

        .search-bar input {
            background-color: transparent;
            border: none;
            color: white;
            outline: none;
            font-size: 16px;
        }

        .search-bar button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .search-bar button img {
            width: 20px;
            height: 20px;
        }

        .team-info {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .team-info div {
            text-align: center;
            position: relative;
        }

        .team-info div img {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 100%;
            width: 150%;
            height: auto;
            z-index: -1;
        }

        .player-card {
            background-color: #ff6f61;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
        }

        .bench {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .bench .player-card {
            background-color: #6c5b7b;
            width: 100px;
        }

        .right-panel h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .league-table {
            position: absolute;
            top: 275px;
            left: 1147px;
            width: 527px;
            height: 75px;
            border: none;
            border-collapse: collapse;
            margin: none;
            padding: none;
            border-collapse: collapse;
            border-spacing: none;
        }

        .league-table th, .league-table td {
            text-align: left;
            border-bottom: 1px solid #1C8095;
        }

        .league-table th {
            background-color: #02356E;
        }

        .league-table tr:nth-child(even) {
            background-color: #1C8095;
            width: 50px;
            height: 50px;
        }

        .league-table tr:nth-child(odd):not(:first-child) {
            background-color: #186A7A;
            width: 50px;
            height: 50px;
        }

        .background-court {
            position: absolute;
            top: 20px;
            left: 112px;
            width: 672px;
            height: 480px;
            background-image: url('cancha.png');
            background-size: cover;
            background-position: center;
            z-index: 0;
        }

        .valor-de-mercado-letra {
            position: absolute;
            top: 415px;
            left: 113px;
            z-index: 0;
            color: white;
        }

        .valor-de-mercado {
            position: absolute;
            top: 362px;
            left: 128px;
            z-index: 0;
            color: white;
            font-size: 50px;
            font-weight: bold;
        }
       
        .overlay-images {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            display: none; /* Oculta las imágenes de jugadores en la pantalla principal */
        }

        .rounded-square {
            position: absolute;
            top: 61px;
            left: 41px;
            width: 100px;
            height: 127px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square2 {
            position: absolute;
            top: 41px;
            left: 315px;
            width: 100px;
            height: 127px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
            cursor: pointer;
        }


        .rounded-square3 {
            position: absolute;
            top: 148px;
            left: 345px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square4 {
            position: absolute;
            top: 41px;
            left: 486px;
            width: 100px;
            height: 127px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
            cursor: pointer;
        }

        .rounded-square5 {
            position: absolute;
            top: 148px;
            left: 516px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square6 {
            position: absolute;
            top: 181px;
            left: 211px;
            width: 100px;
            height: 127px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square7 {
            position: absolute;
            top: 288px;
            left: 241px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square8 {
            position: absolute;
            top: 260px;
            left: 401Px;
            width: 100px;
            height: 127px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square9 {
            position: absolute;
            top: 368px;
            left: 431px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square10 {
            position: absolute;
            top: 181px;
            left: 584px;
            width: 100px;
            height: 127px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square11 {
            position: absolute;
            top: 288px;
            left: 614px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square12 {
            position: absolute;
            top: 61px;
            left: 761px;
            width: 100px;
            height: 127px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square13 {
            position: absolute;
            top: 168px;
            left: 791px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square14 {
            position: absolute;
            top: 216px;
            left: 765px;
            width: 92px;
            height: 117px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square15 {
            position: absolute;
            top: 318px;
            left: 791px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square16 {
            position: absolute;
            top: 366px;
            left: 765px;
            width: 92px;
            height: 117px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1f8aa1; /* Color más oscuro para el símbolo */
            font-size: 60px;
            font-weight: bold;
        }

        .rounded-square17 {
            position: absolute;
            top: 468px;
            left: 791px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square18 {
            position: absolute;
            top: 168px;
            left: 72px;
            width: 40px;
            height: 30px;
            background-color: #272727;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square19 {
            position: absolute;
            top: 148px;
            left: 387px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square20 {
            position: absolute;
            top: 148px;
            left: 558px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square21 {
            position: absolute;
            top: 288px;
            left: 283px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square22 {
            position: absolute;
            top: 368px;
            left: 473px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .rounded-square23 {
            position: absolute;
            top: 288px;
            left: 656px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }
        
        .rounded-square24 {
            position: absolute;
            top: 168px;
            left: 833px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }
        
        .rounded-square25 {
            position: absolute;
            top: 168px;
            left: 114px;
            width: 40px;
            height: 30px;
            background-color: #28CCD6;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: white;
            font-weight: bold;
            z-index: 11;
        }

        .background-square {
            position: absolute;
            top: 258px;
            left: 193px;
            width: 876px;
            height: 500px;
            background-color: white;
            display: inline-flex;
            align-items: normal;
            justify-content: normal;
            font-size: 22px;
            color: #28CCD6;
            font-weight: bold;
            padding: 25px;
        }

        .background-square2 {
            position: absolute;
            top: 208px;
            left: 193px;
            width: 900px;
            height: 40px;
            background-color: #28CCD6;
            z-index: -1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            font-weight: bold;
        }

       
        .background-square3 {
            position: absolute;
            top: 818px;
            left: 193px;
            width: 1500px;
            height: 40px;
            background-color: #28CCD6;
            z-index: -1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            font-weight: bold;
        }
       
        .background-square4 {
            position: absolute;
            top: 868px;
            left: 193px;
            width: 1450px;
            height: 200px;
            background-color: white;
            z-index: -1;
            display: inline-flex;
            align-items: normal;
            justify-content: normal;
            font-size: 22px;
            color: #28CCD6;
            font-weight: bold;
            padding: 25px;
        }
       
        .background-square5 {
            position: absolute;
            top: 258px;
            left: 1130px;
            width: 512px;
            height: 475px;
            background-color: white;
            z-index: -1;
            display: inline-flex;
            align-items: normal;
            justify-content: normal;
            font-size: 22px;
            color: #28CCD6;
            font-weight: bold;
            padding: 25px;
        }

        .background-square6 {
            position: absolute;
            top: 208px;
            left: 1130px;
            width: 561px;
            height: 40px;
            background-color: #28CCD6;
            z-index: -1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            font-weight: bold;
        }



        /* Estilos para la ventana modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            height: 80%;
            width: 50%;
            color: white;
            text-align: center;
            justify-content: center;
            align-items: center;
        margin: auto;
        position: relative;
        top: 46%; /* Centra verticalmente */
        transform: translateY(-50%); /* Ajuste para centrar correctamente */
        }

        .modal-content2 {
            background-color: #333;
            border-radius: 5px;
            padding: 20px;
            height: 650px;
            width: 50%;
            color: white;
            text-align: center;
            justify-content: center;
            align-items: center;
        margin: auto;
        position: relative;
        top: 50%; /* Centra verticalmente */
        transform: translateY(-50%); /* Ajuste para centrar correctamente */
        font-size: 20;
        }

        .close-button {
            background-color: #28CCD6;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        /* Input dentro del modal */
        .modal-input {
            background-color: #575A60;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 80%;
            font-size: 16px;
            outline: none;
            margin-bottom: 20px;
        }

       /* Input dentro del modal */
       .modal-inputt {
            background-color: #575A60;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 50%;
            font-size: 16px;
            outline: none;
            margin-bottom: 20px;
            position: absolute;
            top: 97px;
            left: 160px
        }

        .search-button {
            background-color: #28CCD6;
            border: none;
            color: white;
            padding: 10px 20px;
            margin-left: 10px; /* Espacio entre los botones y la barra de búsqueda */
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 98px;
            left: 655px
        }

        .modal-results {
            max-height: 59%;
            overflow-y: auto;
            margin-bottom: 10px;
            text-align: left;
            background-color: #444444;
        }

        .modal-results img {
            width: 50px;
            height: auto;
            vertical-align: middle;
        }

        .modal-results div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .modal-results span {
            margin-left: 10px;
        }

        .search-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.modal-input {
    width: 60%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.close-button {
    background-color: #28CCD6;
     border: none;
    color: white;
    padding: 10px 20px;
    margin-left: 10px; /* Espacio entre los botones y la barra de búsqueda */
    border-radius: 5px;
    cursor: pointer;
}

.closepack-button {
    background-color: #28CCD6;
    border: none;
    color: white;
    padding: 10px 20px;
    margin-left: 10px; /* Espacio entre los botones y la barra de búsqueda */
    border-radius: 5px;
    cursor: pointer;
    position: absolute;
    top: 620px;
    left: 450;
}

.close-button:hover {
    background-color: #28CCD6;
    font-weight: bold;
}

.modal-results {
    margin-top: 20px;
}

.search-container button {
    font-weight: bold; /* Añadido para hacer las letras en negrita */
}

.player-info span {
    display: block; /* Asegúrate de que los elementos se muestren en líneas separadas */
}

.player-image {
    max-width: 50px; /* Ajusta el tamaño de la imagen según sea necesario */
    vertical-align: middle;
}

.player-info {
    margin-left: 10px; /* Ajusta el margen según sea necesario */
}

.clausula-button {
    background-color: #202020;
    border: none;
    color: white;
    padding: 10px 20px;
    margin-left: 10px; /* Espacio entre los botones y la barra de búsqueda */
    border-radius: 5px;
    cursor: pointer;
}

/* Estilo para el botón activo */
.buy-player-button {
    background-color: #28CCD6;
    border: none;
    color: rgb(46, 46, 46);
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    right: 126px;
}

/* Estilo para el botón desactivado */
.buy-player-button.disabled {
    content: "Pagar cláusula";
    background-color: white;
    color: #02356E;
    cursor: pointer;
   
}

/* Estilo para el botón de cláusula activo */
.clausula-button {
    background-color: #1F8AA1;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

/* Estilo para el botón de cláusula desactivado */
.clausula-button.disabled {
    background-color: #202020;
    cursor: not-allowed;
}

.info-button {
    background-color: #b6b6b6;
    border: none;
    color: rgb(46, 46, 46);
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    right: 50px;
}

.draggable-image {
    width: 100px; /* Ajusta el tamaño de la imagen */
    position: absolute; /* Necesario para poder mover la imagen */
    cursor: pointer;
    z-index: 10;
}

.results {
    display: flex;
    justify-content: space-between;
}

.open-packs-button {
    border: none; /* Sin borde */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    transition: background-color 0.075s; /* Transición suave */
    padding: 2px;
}

.open-packs-button:hover {
    background-color: #1F8AA1; /* Cambiar el fondo a rojo */
}

.open-packs-button:focus {
    outline: none; /* Quita el borde de enfoque por defecto */
}

.ver-lideres-button {
    border: none; /* Sin borde */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    transition: background-color 0.075s; /* Transición suave */
    padding: 2px;
    border-radius: 10px;
}

.ver-lideres-button:hover {
    background-color: #1F8AA1; /* Cambiar el fondo a rojo */
}

.ver-lideres-button:focus {
    outline: none; /* Quita el borde de enfoque por defecto */
}

.misiones-button {
    border: none; /* Sin borde */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    transition: background-color 0.075s; /* Transición suave */
    padding: 2px;
    border-radius: 10px;
}

.misiones-button:hover {
    background-color: #1F8AA1; /* Cambiar el fondo a rojo */
}

.misiones-button:focus {
    outline: none; /* Quita el borde de enfoque por defecto */
}


.avisos {
    border: none; /* Sin borde */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    transition: background-color 0.075s; /* Transición suave */
    padding: 2px;
    border-radius: 10px;
}

.avisos:hover {
    background-color: #1F8AA1; /* Cambiar el fondo a rojo */
}

.avisos:focus {
    outline: none; /* Quita el borde de enfoque por defecto */
}

.color-oscuro {
    background-color: #1F8AA1;
}

.pack-button1 {
    background-image: url('cartas/bronce.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
    font-size: 20px;
   
}

.pack-button2 {
    background-image: url('cartas/plata.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
}
.pack-button3 {
    background-image: url('cartas/oro.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
}

.pack-button4 {
    background-image: url('cartas/ultimate.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
}

.pack-button5 {
    background-image: url('cartas/draft.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
}

.pack-button6 {
    background-image: url('cartas/jjoo.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
    pointer-events: auto; /* Asegúrate de que las interacciones estén habilitadas */
}


.pack-button7 {
    background-image: url('cartas/cumpleaños.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
    pointer-events: auto; /* Asegúrate de que las interacciones estén habilitadas */
}


.pack-button8 {
    background-image: url('cartas/diario.png'); /* Imagen de fondo del botón */
    background-size: cover; /* Ajusta la imagen para que cubra todo el botón */
    background-position: center; /* Centra la imagen en el botón */
    border: none; /* Sin borde */
    color: white; /* Color del texto */
    padding: 10px 20px; /* Espaciado interno del botón */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-weight: bold; /* Texto en negrita */
    text-align: center; /* Centra el texto dentro del botón */
    display: inline-block; /* Permite ajustar el tamaño del botón */
    width: 150px; /* Ajusta el ancho del botón */
    height: 185px; /* Ajusta la altura del botón */
    transition: opacity 0.3s ease; /* Transición suave para la opacidad */
    background-color: transparent; /* Asegúrate de que el fondo sea transparente */
}




.pack-button:hover {
    opacity: 0.8; /* Cambia la opacidad al pasar el ratón sobre el botón */
}

.pack-button:focus {
    outline: none; /* Quita el borde de enfoque por defecto */
}

.button-text {
    position: relative;
    color: white; /* Asegúrate de que el color del texto sea visible sobre la imagen de fondo */
    top: 120px; /* Ajusta este valor para mover el texto hacia abajo */
            font-size: 20px;
            font-weight: bold;
}

#draftVideo {
    pointer-events: none; /* No permite ninguna interacción con el video */
    user-select: none;    /* Evita selección accidental */
    position: relative;
    margin: 0 auto; /* Centrar el video en la pantalla */
    z-index: 999;
    top: -200;
}

.modal-content4 {
    background-color: white;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* El mismo tamaño que modal-content2 */
    height: 80%; /* Ajusta el tamaño según sea necesario */
    z-index: 999;
}

#modal-content4 {
    display: none; /* Para que el modal esté oculto inicialmente */
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.9); /* Fondo oscuro para modal */
    z-index: 999;
}

.Regalo {
    position: absolute;
    right: 255px;
}

.open-packs-button {
    position: absolute;
    right: 302px;
}

.ver-lideres-button {
    position: absolute;
    right: 456px;
}

.misiones-button {
    position: absolute;
    right: 610px;
}

.avisos{
    position: absolute;
    right: 252px;
    cursor: pointer;
}


.dinero {
    background-color: #1F8AA1;
    padding: 5px 15px;
    border-radius: 10px;
    margin-left: 10px;
    position: absolute;
    right: 359px;
}

.moneda {
    position: absolute;
    right: 477px;
    z-index: 90;
}

.puntos_sumados {
    font-weight: bold;
    font-size: 16;
    display: inline-block; /* Asegura que el borde redondeado se aplique correctamente */
    padding: 1px 4.3px; /* Espaciado interno para ajustar el tamaño del círculo */
    text-align: center; /* Centra el texto dentro del círculo */
    line-height: 1.5; /* Ajusta la altura de la línea para centrar verticalmente el texto */
    border-radius: 25px;
    width: 28;
    height: 24;
    align-items: center;
    justify-content: center;
}

.Tablaa{
    font-weight: bold;
    font-size: 18;
}


.bienvenido{
    font-weight: normal;
    background-color: #425372;
    border: none;
    color: white;
    padding: 5px 15px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    position: absolute;
    right: 188px;
}

.foto_de_perfil{
    width: 28;
    height: 24;
}

.base{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 260px;
    left: 399Px;
    width: 102px;
    height: 127px;
    background-image: url('jugadores/<?php echo $base; ?>.png');
    background-size: cover;   /* Asegura que la imagen cubra todo el contenedor */
    background-position: center;  /* Centra la imagen */
    cursor: pointer;
}

.escolta{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 181px;
    left: 584px;
    width: 100px;
    height: 127px;
    cursor: pointer;
}

.alero{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 181px;
    left: 211px;
    width: 100px;
    height: 127px;
    cursor: pointer;
}

.alapivot{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 41px;
    left: 315px;
    width: 100px;
    height: 127px;
    cursor: pointer;
}

.pivot{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 41px;
    left: 486px;
    width: 100px;
    height: 127px;
    cursor: pointer;
}

.manager{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 61px;
    left: 41px;
    width: 100px;
    height: 127px;
    cursor: pointer;
}

.reserva{
    width: 40px;
    height: 30px;
    position: absolute;
    top: 61px;
    left: 761px;
    width: 100px;
    height: 127px;
    cursor: pointer;
}

.oculto {
    display: none;  /* Oculta el elemento completamente */
}

.meterReserva {
    background-color: #28CCD6;
    border: none;
    color: white;
    padding: 0; /* Cambia padding para alinear mejor */
    border-radius: 5px;
    text-decoration: none;
    position: absolute;
    right: 33px;
    top: 205px;
    width: 110px;
    height: 28px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer !important;
    display: flex; /* Añadir display flex */
    align-items: center; /* Alinear verticalmente al centro */
    justify-content: center; /* Opcional: centrar horizontalmente */
}

.clausula {
            display: none; /* Oculto por defecto */
            position: fixed; /* Fijo */
            z-index: 1000; /* Encima de todo */
            left: 0;
            top: 0;
            width: 100%; /* Ancho completo */
            height: 100%; /* Alto completo */
            background-color: rgba(0, 0, 0, 0.9); /* Fondo oscuro */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }

        .clausula-content {
            background-color: #333;
            border-radius: 10px;
            width: 768px;
            height: 650px;
            padding: 20px;
            text-align: center;
        }

        .clausula-content img {
            width: 100%; /* Ajustar a 100% de la cláusula */
            border-radius: 5px; /* Bordes redondeados */
        }

        .clausula-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .clausula-button {
            background-color: #28CCD6;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .clausula-button.cancel {
            background-color: #ff4c4c; /* Color para el botón cancelar */
        }

       

/* Estilos generales del opening */
.opening {
    display: none; /* Oculto por defecto */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9); /* Fondo oscuro */
    justify-content: center;
    align-items: center;
}

.opening-content {
    background-color: #333;
            border-radius: 10px;
            width: 50%;
            height: 650px;
            padding: 20px;
            text-align: center;
}

.opening-left {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.opening-image {
    max-width: 100%;
    height: auto;
}

.openingabrir-button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #28CCD6; /* Color celeste */
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    font-size: 25px;
    border-radius: 15px;
    position: absolute;
    left: 489px;
    top: 631px;
    width: 350px;
    height: 60px;
}

.openingcancelar-button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #FF4C4C; /* Color celeste */
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    font-size: 25px;
    border-radius: 15px;
    position: absolute;
    left: 489px;
    top: 711px;
    width: 350px;
    height: 60px;
}

.opening-right {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

h1 {
    font-size: 36px;
}

.rewards-box {
    margin-top: 20px;
    width: 200px;
    height: 100px;
    border: 2px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
}

.opening-image{
            width: 270px;
            height: auto;
            position: absolute;
            top: 230px;
            left: 529px;
        }

.fondo-sobres{
            position: absolute;
            top: 169px;
            left: 489px;
            border-radius: 15px;
        }

.nombredelsobre{
    position: absolute;
    left: 885px;
    top: 147px
}

.searchInputt::placeholder {
    color: white;
}

.cuadradocelestejeje{
    background-color: #28CCD6;
    position: absolute;
    left: 870px;
    top: 169px;
    width: 550px;
    height: 45px
}

.cuadradogrisjeje{
    background-color: #717171;
    position: absolute;
    left: 870px;
    top: 237px;
    width: 536px;
    height: 25px;
    font-size: 22px;
    font-weight: bold;
    padding: 7px;
    display: inline-flex;
    align-items: normal;
    justify-content: normal;
}

.cuadradoblancojeje{
    background-color: white;
    position: absolute;
    left: 870px;
    top: 272px;
    width: 536px;
    height: 25px;
    font-size: 22px;
    color: black;
    padding: 7px;
    display: inline-flex;
    align-items: normal;
    justify-content: normal;
}

.cuadradogris2jeje{
    background-color: #717171;
    position: absolute;
    left: 870px;
    top: 334px;
    width: 536px;
    height: 25px;
    font-size: 22px;
    font-weight: bold;
    padding: 7px;
    display: inline-flex;
    align-items: normal;
    justify-content: normal;
}

.rewards-box{
    background-color: white;
    position: absolute;
    left: 870px;
    top: 353px;
    width: 536px;
    height: 400px;
    font-size: 22px;
    color: black;
    padding: 7px;
    display: inline-flex;
    align-items: normal;
    justify-content: normal;
    border: none;
}

.elegirAvatar{
    cursor: pointer
}

/* Estilo para ocultar el modal por defecto */
.avatar-modal {
    display: none; /* Oculto por defecto */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9); /* Fondo oscuro */
    justify-content: center;
    align-items: center;
    /* Para centrar el contenido verticalmente */
  justify-content: center;
  align-items: center;
}

.avatar-modal-content {
    background-color: #333;
    border-radius: 10px;
    width: 500px;
    height: 520px;
    padding: 15px;
    text-align: center;
    position: absolute;
    left: 690px;
    top: 170px;
}

.avatar-close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.avatar-close:hover, .avatar-close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.info-modal {
    display: none; /* Oculto por defecto */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9); /* Fondo oscuro */
    justify-content: center;
    align-items: center;
}

.info-modal-content {
    background-color: #333;
            border-radius: 10px;
            width: 800px;
            height: 560px;
            padding: 20px;
            text-align: center;
}

.info-player-image{
    height: 300px;
    width: auto !important;
    z-index: 2;
    position: absolute;
    left: 215px;
    top: 32px;
}

.fondo-info-jugador{
    height: 450px;
    width: auto;
    border-radius: 20px;
    z-index: 1;
}

.info-personal{
    font-size: 20px;
    text-align: left;
    position: absolute;
    left: 400px;
    top: 100px;
}

.venderBase-button{
    font-family: "saira condensed";
    font-weight: 700;
    font-size: 30px;
    color: white;
    background-color: #28CCD6;
    cursor: pointer;
    width: 200px;
    height: 50px;
    border: none;
    border-radius: 15px;
}

.subastarBase-button{
    position: absolute;
    left: 263px;
    top: 520px;
    font-family: "saira condensed";
    font-weight: 700;
    font-size: 30px;
    color: white;
    background-color: #28CCD6;
    cursor: pointer;
    width: 327px;
    height: 50px;
    border: none;
    border-radius: 15px;
}

.cancelarBase-button{
    font-family: "saira condensed";
    font-weight: 700;
    font-size: 30px;
    color: white;
    background-color: #FF4C4C;
    cursor: pointer;
    width: 200px;
    height: 50px;
    border: none;
    border-radius: 15px;
}

.custom-alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #333333;
            color: #ffffff;
            padding: NONE;
            border-radius: 8px;
            z-index: 100000;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
            width: 400px;
            height: 260px;
            margin: none
        }
        
        .custom-alert button {
            margin-top: none;
            padding: 5px 12px;
            background-color: #28CCD6;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-alert button:hover {
            background-color: #30F4FF;
        }

        /* Estilos para oscurecer el fondo */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 99900;
        }

    </style>
</head>


<body>

<div id="ventaModal" class="info-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; justify-content: center; align-items: center;">
  <div class="info-modal-content" style="position: relative; padding: 27px; font-size: 28px; font-weight: bold; text-align: center; border-radius: 10px;">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar; ?> - $<span id="precioVenta"><?php echo $valor_para_mostrar; ?></span>
    </div>
    <img src="escudos/borde <?php echo $equipo_para_mostrar; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $base; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
<div class="info-de-venta">
        <img src="escudos/info de venta.png" alt="" style="position: absolute; top: 37px; left: 400px">
        
        <div style="margin-top: 200px; position: absolute; left: 413px; top: -2px">
  <input type="range" id="precioSlider" min="<?php echo floor($valor_para_mostrar * 0.75); ?>" max="<?php echo ceil($valor_para_mostrar * 2); ?>" value="<?php echo $valor_de_venta_para_mostrar; ?>" style="width: 400px; max-width: 500px;" oninput="actualizarPrecio()">
  <p style="position: absolute; left: 205px; top: -87px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">$<span id="precioSeleccionado"><?php echo $valor_de_venta_para_mostrar; ?></span></p>
  <div style="position: absolute; left: 295px; top: -165px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">$<?php echo floor($valor_para_mostrar * 0.75); ?><br><br></div>
  <div style="position: absolute; left: 245px; top: -111px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">$<?php echo floor($valor_para_mostrar * 2); ?><br><br></div>
</div>
    </div>

    <span id="cerrarVentaModal" onclick="cerrarVentaModal()" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarBase">Cancelar</button>
    <button class="subastarBase-button" id="SubastarBase" onclick="">Confirmar</button>
    <button onclick="volverAtrasVenta()" style="position: absolute; left: 33px; top: 520px;" class="cancelarBase-button">Atrás</button>
  </div>
</div>


<div id="overlay" class="overlay"></div>
    
    <div id="miAlertaPlata" class="custom-alert">
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">🚧 ERROR 🚧</p>
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">No tienes dinero suficiente.</p>
        <button style="font-family: saira condensed; font-weight: 700; font-size: 30px" onclick="cerrarAlertaPlata()">Cerrar</button>
    </div>

    <div id="miAlertaEspacio" class="custom-alert">
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">🚧 ERROR 🚧</p>
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">No tienes espacio para este jugador.</p>
        <button style="font-family: saira condensed; font-weight: 700; font-size: 30px" onclick="cerrarAlertaEspacio()">Cerrar</button>
    </div>

    <div id="miAlertaPertenece" class="custom-alert">
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">🚧 ERROR 🚧</p>
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">Este jugador te pertenece.</p>
        <button style="font-family: saira condensed; font-weight: 700; font-size: 30px" onclick="cerrarAlertaPertenece()">Cerrar</button>
    </div>

    <div id="miAlertaEspacio2" class="custom-alert">
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">🚧 ERROR 🚧</p>
        <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">No tienes espacio disponible.</p>
        <button style="font-family: saira condensed; font-weight: 700; font-size: 30px" onclick="cerrarAlertaEspacio2()">Cerrar</button>
    </div>

<div id="miAlertaPuntos" class="custom-alert">
    <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">🚧 ERROR 🚧</p>
    <p style="font-family: saira condensed; font-weight: 700; font-size: 30px">No tienes puntos suficientes.</p>
    <button style="font-family: saira condensed; font-weight: 700; font-size: 30px" onclick="cerrarAlertaPuntos()">Cerrar</button>
</div>

<div id="infoModal" class="info-modal">
  <div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar; ?> - $<?php echo $valor_para_mostrar; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $base; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar; ?><br><br></div>
        <div style="position: absolute; left: 145px; top: -13px; font-family: saira condensed; font-weight: 700; font-size: 31.8px">
    <?php if (empty($dueño_para_mostrar)) {
        echo "Libre"; 
    } else {
        echo "de " . htmlspecialchars($dueño_para_mostrar); 
    }?>
    <br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar; ?><br><br></div>
        <div style="width: 900px; position: absolute; left: 228px; top: 96px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $puntos_para_mostrar; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar . '&nbsp;vs&nbsp;' . $contrincante_para_mostrar; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoJugador" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderBase">Vender: $<?php echo floor($valor_para_mostrar * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarBase" onclick="mostrarVentaModal()">Poner en venta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarBase">Cancelar</button>

  </div>
</div>

<div id="infoModalEscolta" class="info-modal">
<div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar2; ?> - $<?php echo $valor_para_mostrar2; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar2; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $escolta; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar2; ?><br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar2 !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar2; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar2 . 'vs' . $contrincante_para_mostrar2; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar2; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar2; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar2; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoEscolta" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderEscolta">Vender: $<?php echo floor($valor_para_mostrar2 * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarEscolta">Poner en venta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarEscolta">Cancelar</button>

  </div>
</div>

<div id="infoModalAlero" class="info-modal">
<div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar3; ?> - $<?php echo $valor_para_mostrar3; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar3; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $alero; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar3; ?><br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar3 !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar3; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar3 . 'vs' . $contrincante_para_mostrar3; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar3; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar3; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar3; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoAlero" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderAlero">Vender: $<?php echo floor($valor_para_mostrar3 * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarAlero">Iniciar una subasta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarAlero">Cancelar</button>

  </div>
</div>

<div id="infoModalAlapivot" class="info-modal">
<div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar4; ?> - $<?php echo $valor_para_mostrar4; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar4; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $alapivot; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar4; ?><br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar4 !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar4; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar4 . 'vs' . $contrincante_para_mostrar4; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar4; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar4; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar4; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoAlapivot" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderAlapivot">Vender: $<?php echo floor($valor_para_mostrar4 * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarAlapivot">Iniciar una subasta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarAlapivot">Cancelar</button>

  </div>
</div>

<div id="infoModalPivot" class="info-modal">
<div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar5; ?> - $<?php echo $valor_para_mostrar5; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar5; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $pivot; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar5; ?><br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar5 !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar5; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar5 . 'vs' . $contrincante_para_mostrar5; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar5; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar5; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar5; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoPivot" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderPivot">Vender: $<?php echo floor($valor_para_mostrar5 * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarPivot">Iniciar una subasta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarPivot">Cancelar</button>

  </div>
</div>

<div id="infoModalManager" class="info-modal">
<div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar6; ?> - $<?php echo $valor_para_mostrar6; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar6; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $manager; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar6; ?><br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar6 !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar6; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar6 . 'vs' . $contrincante_para_mostrar6; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar6; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar6; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar6; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoManager" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderManager">Vender: $<?php echo floor($valor_para_mostrar6 * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarManager">Iniciar una subasta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarManager">Cancelar</button>

  </div>
</div>

<div id="infoModalReserva" class="info-modal">
<div class="info-modal-content" style="position: absolute; left: 532px, top: 133px, font-size: 28px; font-weight: bold; padding: 27px">
    <div style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 80px; top: -61px; z-index: 1; font-family: saira condensed; font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre_para_mostrar7; ?> - $<?php echo $valor_para_mostrar7; ?></div>
</p>
    <img src="escudos/borde <?php echo $equipo_para_mostrar7; ?>.png" alt="" style="position:absolute; left:0px; top:-58px; z-index: 0">
    <img src="cartas/fondosobre.png" alt="" class="fondo-info-jugador" style="position: absolute; left: 33px; top: 35px;">
    <img src="jugadores/<?php echo $reserva; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="position: absolute; left: 82px; top: 105px;">
    <div class="info-personal">
        <img src="escudos/info personalll.png" alt="" style="position: absolute; top:-63px">
        <div style="position: absolute; left: 130px; top: -68px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $posicion_para_mostrar7; ?><br><br></div>
        <div style="position: absolute; left: 107px; top: 42px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px; width: 410px;"<?php echo ($lesion_para_mostrar7 !== 'Listo para jugar') ? '#FF4C4C' : 'white'; ?>"><?php echo $lesion_para_mostrar7; ?><br><br></div>
        <div style="position: absolute; left: 223px; top: 207px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px;">
        <div><?php echo $puntos_ultimo_partido_para_mostrar7 . 'vs' . $contrincante_para_mostrar7; ?><br><br></div>
<div style="z-index: 9000; position: absolute; left: -21px; top: 110px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px">VS<br><br></div>
<div style="width: 900px; position: absolute; left: 15px; top: 57px ;font-family: saira condensed; font-weight: 700; font-size: 31.8px"><?php echo $fechaProximoPartido_para_mostrar7; ?><br><br></div>
<img src="escudos/equipo 1 <?php echo $equipo_para_mostrar7; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: -214px; top: 110px;">
<img src="escudos/equipo 2 <?php echo $proximoPartido_para_mostrar7; ?>.png" alt="${jugador.nombreCompleto}" class="info-player-image" style="width: 181px; height: 50px; position: absolute; left: 19px; top: 110px;">

    </div>
    </div>
    <span id="cerrarInfoReserva" style="cursor: pointer; position: absolute; left: 820px; top:-50; font-size: 30px">&times; </span>
    <button style="position: absolute; left: 33px; top: 520px;" class="venderBase-button" id="VenderReserva">Vender: $<?php echo floor($valor_para_mostrar7 * 0.75); ?></button>
    <button class="subastarBase-button" id="SubastarReserva">Iniciar una subasta</button>
    <button style=" position: absolute; left: 620px; top: 520px;" class="cancelarBase-button" id="CancelarReserva">Cancelar</button>

  </div>
</div>

<!-- El modal "avatar" -->
<div id="avatarModal" class="avatar-modal">
  <div class="avatar-modal-content">
    <span class="avatar-close">&times;</span>
    <p style="font-family: saira condensed; font-size: 35px; font-weight: bold; position: absolute; top: -8px; left: 165px">ELIGE TU AVATAR</p>
    <br><br><br><br>
    <img title="Victor Wembanyama" id="avatar4" src="avatars/avatar4.png" alt="" style="cursor: pointer; background-color: #444; width: 75px; border-radius: 15px" onclick="cambiarAvatar('4')">&nbsp;
<img title="Zion Williamson" id="avatar2" src="avatars/avatar2.png" alt="" style="cursor: pointer; background-color: #444; width: 75px; border-radius: 15px" onclick="cambiarAvatar('2')">&nbsp;
<img title="Rudy Gobert" id="avatar5" src="avatars/avatar5.png" alt="" style="cursor: pointer; background-color: #444; width: 75px; border-radius: 15px" onclick="cambiarAvatar('5')">&nbsp;
<img title="Damian Lillard" id="avatar3" src="avatars/avatar3.png" alt="" style="cursor: pointer; background-color: #444; width: 75px; border-radius: 15px" onclick="cambiarAvatar('3')">&nbsp;
<img title="Paul George" id="avatar20" src="avatars/avatar20.png" alt="" style="cursor: pointer; background-color: #444; width: 75px; border-radius: 15px" onclick="cambiarAvatar('20')">&nbsp;
<img title="Jimmy Butler" id="avatar8" src="avatars/avatar8.png" alt="" style="cursor: pointer; background-color: #444; width: 75px; border-radius: 15px" onclick="cambiarAvatar('8')">
<img title="Jayson Tatum" id="avatar7" src="avatars/avatar7.png" alt="" style="cursor: pointer; background-color: #358A90; width: 75px; border-radius: 15px" onclick="cambiarAvatar2('7')">&nbsp;
<img title="Chris Paul" id="avatar1" src="avatars/avatar1.png" alt="" style="cursor: pointer; background-color: #358A90; width: 75px; border-radius: 15px" onclick="cambiarAvatar2('1')">&nbsp;
<img title="Klay Thompson" id="avatar18" src="avatars/avatar18.png" alt="" style="cursor: pointer; background-color: #358A90; width: 75px; border-radius: 15px" onclick="cambiarAvatar2('18')">&nbsp;
<img title="Ja Morant" id="avatar6" src="avatars/avatar6.png" alt="" style="cursor: pointer; background-color: #358A90; width: 75px; border-radius: 15px" onclick="cambiarAvatar2('6')">&nbsp;
<img title="Anthony Edwards" id="avatar9" src="avatars/avatar9.png" alt="" style="cursor: pointer; background-color: #358A90; width: 75px; border-radius: 15px" onclick="cambiarAvatar2('9')">&nbsp;
<img title="Giannis Antetokounmpo" id="avatar10" src="avatars/avatar10.png" alt="" style="cursor: pointer; background-color: #358A90; width: 75px; border-radius: 15px" onclick="cambiarAvatar2('10')">
<img title="Luka Doncic" id="avatar11" src="avatars/avatar11.png" alt="" style="cursor: pointer; background-color: #28CCD6; width: 75px; border-radius: 15px" onclick="cambiarAvatar3('11')">&nbsp;
<img title="Nikola Jokic" id="avatar12" src="avatars/avatar12.png" alt="" style="cursor: pointer; background-color: #28CCD6; width: 75px; border-radius: 15px" onclick="cambiarAvatar3('12')">&nbsp;
<img title="James Harden" id="avatar13" src="avatars/avatar13.png" alt="" style="cursor: pointer; background-color: #28CCD6; width: 75px; border-radius: 15px" onclick="cambiarAvatar3('13')">&nbsp;
<img title="Stephen Curry" id="avatar14" src="avatars/avatar14.png" alt="" style="cursor: pointer; background-color: #28CCD6; width: 75px; border-radius: 15px" onclick="cambiarAvatar3('14')">&nbsp;
<img title="Kevin Durant" id="avatar16" src="avatars/avatar16.png" alt="" style="cursor: pointer; background-color: #28CCD6; width: 75px; border-radius: 15px" onclick="cambiarAvatar3('16')">&nbsp;
<img title="LeBron James" id="avatar15" src="avatars/avatar15.png" alt="" style="cursor: pointer; background-color: #28CCD6; width: 75px; border-radius: 15px" onclick="cambiarAvatar3('15')">
<img title="Denis Rodman" id="avatar17" src="avatars/avatar17.png" alt="" style="cursor: pointer; background-color: #FFCC52; width: 75px; border-radius: 15px" onclick="cambiarAvatar4('17')">&nbsp;
<img title="Allen Iverson" id="avatar23" src="avatars/avatar23.png" alt="" style="cursor: pointer; background-color: #FFCC52; width: 75px; border-radius: 15px" onclick="cambiarAvatar4('23')">&nbsp;
<img title="Derrick Rose" id="avatar24" src="avatars/avatar24.png" alt="" style="cursor: pointer; background-color: #FFCC52; width: 75px; border-radius: 15px" onclick="cambiarAvatar4('24')">&nbsp;
<img title="Shaquille O'Neal" id="avatar22" src="avatars/avatar22.png" alt="" style="cursor: pointer; background-color: #FFCC52; width: 75px; border-radius: 15px" onclick="cambiarAvatar4('22')">&nbsp;
<img title="Kobe Bryant" id="avatar21" src="avatars/avatar21.png" alt="" style="cursor: pointer; background-color: #FFCC52; width: 75px; border-radius: 15px" onclick="cambiarAvatar4('21')">&nbsp;
<img title="Michael Jordan" id="avatar19" src="avatars/avatar19.png" alt="" style="cursor: pointer; background-color: #FFCC52; width: 75px; border-radius: 15px" onclick="cambiarAvatar4('19')">
<p style="color: #B5B5B5; font-family: saira condensed; font-size: 25px; font-weight: bold; position: absolute; top: 385px; left: 22px">COMUNES: 0 PUNTOS NECESARIOS</p>
<p style="color: #358A90; font-family: saira condensed; font-size: 25px; font-weight: bold; position: absolute; top: 413px; left: 22px">ESPECIALES: 25 PUNTOS NECESARIOS</p>
<p style="color: #28CCD6; font-family: saira condensed; font-size: 25px; font-weight: bold; position: absolute; top: 441px; left: 22px">ESTRELLAS: 50 PUNTOS NECESARIOS</p>
<p style="color: #FFCC52; font-family: saira condensed; font-size: 25px; font-weight: bold; position: absolute; top: 469px; left: 22px">LEYENDAS: 100 PUNTOS NECESARIOS</p>
<p style="color: white; font-family: saira condensed; font-size: 25px; font-weight: bold; position: absolute; top: 385px; left: 380px">TUS PUNTOS:</p>
<p style="color: white; font-family: saira condensed; font-size: 55px; font-weight: bold; position: absolute; top: 373px; left: 380px"><?php echo $puntos; ?></p>
<?php if ($puntos < 25): ?>
    <img onclick="cambiarAvatar2('7')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 172px; left: 24px;">
    <img onclick="cambiarAvatar2('7')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 172px; left: 108px;">
    <img onclick="cambiarAvatar2('7')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 172px; left: 192px;">
    <img onclick="cambiarAvatar2('7')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 172px; left: 275px;">
    <img onclick="cambiarAvatar2('7')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 172px; left: 359px;">
    <img onclick="cambiarAvatar2('7')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 172px; left: 443px;">
<?php endif; ?>
<?php if ($puntos < 50): ?>
    <img onclick="cambiarAvatar2('11')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 251px; left: 24px;">
    <img onclick="cambiarAvatar2('11')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 251px; left: 108px;">
    <img onclick="cambiarAvatar2('11')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 251px; left: 192px;">
    <img onclick="cambiarAvatar2('11')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 251px; left: 275px;">
    <img onclick="cambiarAvatar2('11')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 251px; left: 359px;">
    <img onclick="cambiarAvatar2('11')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 251px; left: 443px;">
<?php endif; ?>
<?php if ($puntos < 100): ?>
    <img onclick="cambiarAvatar2('17')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 330px; left: 24px;">
    <img onclick="cambiarAvatar2('17')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 330px; left: 108px;">
    <img onclick="cambiarAvatar2('17')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 330px; left: 192px;">
    <img onclick="cambiarAvatar2('17')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 330px; left: 275px;">
    <img onclick="cambiarAvatar2('17')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 330px; left: 359px;">
    <img onclick="cambiarAvatar2('17')" src="candado.png" alt="Candado" style="cursor: pointer; width: 63px; position: absolute; top: 330px; left: 443px;">
<?php endif; ?>


  </div>
</div>

<div id="resultsDiv"></div>

<!-- Cláusula -->
<div id="clausulaModal" class="clausula">
    <div class="clausula-content" style="position: absolute; top: 205px; left: 551px">
    <p style="font-family: saira condensed; font-weight: 700; font-size: 40px; font-weight: bold; line-height: 0px; position: absolute; left: 95px; top: 5px">¿Quieres pagar la cláusula de este jugador?</p>
        <p id="valorClausula" style="font-family: saira condensed; font-weight: 700; font-size: 30px; font-weight: bold; margin-top: 0px; position: absolute; left: 295px; top: 70px"></p>
            <button id="pagarClausula" style="position: absolute; left: 188px; top: 608px;" class="venderBase-button">Pagar</button>
            <button id="cancelarClausula" style=" position: absolute; left: 413px; top: 608px;" class="cancelarBase-button">Cancelar</button>
        <div>
            <img id="imagenClausula" alt="" style="width: 808px; position:absolute; top: -50px; left: 0px">
            <p id="nombreCompletoClausula" style="font-size: 43px; text-align: center; text-transform: uppercase; position:absolute; left: 130px; top: -97px; z-index: 1; font-family: saira condensed; font-weight: 700"></p>
            <img src="ruta/a/tu/imagen.jpg" alt="Imagen del jugador" id="clausulaPlayerImage" style="width: auto; height: 300px; margin-top: 33px; position: relative; z-index: 10; position: absolute; left: 283px; top: 158px;">
<img src="cartas/fondosobre.png" alt="" style="position: absolute; left: 233px; top: 125px; width: auto; height: 450px; z-index: 5;">

        </div>
        <div class="clausula-buttons">
        </div>
    </div>
</div>

<!-- Opening bronce -->
<div id="openingBronce" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/bronce.png" alt="Sobre Bronce" class="opening-image">
            <button id="cancelarSobre" class="openingcancelar-button">Cancelar</button>
            <button id="abrirSobre" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 style="font-family: saira condensed; font-size: 30px" class="nombredelsobre">SOBRE DE BRONCE</h1>
            <div style="font-family: saira condensed; font-size: 30px; font-weight: bold; position: absolute; top: 231px; left: 876px; z-index: 1000" class="nososycuadrado">&nbsp;Contenido del sobre</div>
            <div style="font-family: saira condensed; font-size: 30px; font-weight: bold;" class="cuadradogrisjeje">&nbsp;</div>
            <div style="font-family: saira condensed; font-size: 30px" class="cuadradoblancojeje">- Jugador con valor de mercado entre $50 y $75</div>
            <div style="font-family: saira condensed; font-size: 30px" class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                <img src="jugadores/curry2.png" alt="" style="width:90px">
                <img src="jugadores/tillman.png" alt="" style="width:90px">
                <img src="jugadores/payton.png" alt="" style="width:90px">
                <img src="jugadores/williams7.png" alt="" style="width:90px">
                <img src="jugadores/ball2.png" alt="" style="width:90px">
                <img src="jugadores/kleber.png" alt="" style="width:90px">
                <img src="jugadores/ingles.png" alt="" style="width:90px">
                <img src="jugadores/green4.png" alt="" style="width:90px">
                <img src="jugadores/coffey.png" alt="" style="width:90px">
                <img src="jugadores/okogie.png" alt="" style="width:90px">
                <img src="jugadores/santos.png" alt="" style="width:90px">
                <img src="jugadores/eubanks.png" alt="" style="width:90px">
                <img src="jugadores/powell.png" alt="" style="width:90px">
                <img src="jugadores/graham.png" alt="" style="width:90px">
                <img src="jugadores/alex len.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening plata -->
<div id="openingPlata" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/plata.png" alt="Sobre Plata" class="opening-image">
            <button id="cancelarSobre2" class="openingcancelar-button">Cancelar</button>
            <button id="abrirSobre" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre de Plata</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Jugador con valor de mercado entre $75 y $100</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                <img src="jugadores/hauser.png" alt="" style="width:90px">
                <img src="jugadores/williams4.png" alt="" style="width:90px">
                <img src="jugadores/williams5.png" alt="" style="width:90px">
                <img src="jugadores/laravia.png" alt="" style="width:90px">
                <img src="jugadores/thompson3.png" alt="" style="width:90px">
                <img src="jugadores/kessler.png" alt="" style="width:90px">
                <img src="jugadores/jackson.png" alt="" style="width:90px">
                <img src="jugadores/mann.png" alt="" style="width:90px">
                <img src="jugadores/achiuwa.png" alt="" style="width:90px">
                <img src="jugadores/nembhard.png" alt="" style="width:90px">
                <img src="jugadores/oneale.png" alt="" style="width:90px">
                <img src="jugadores/finneysmith.png" alt="" style="width:90px">
                <img src="jugadores/jacksondavis.png" alt="" style="width:90px">
                <img src="jugadores/jovic.png" alt="" style="width:90px">
                <img src="jugadores/saric.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening oro -->
<div id="openingOro" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/oro.png" alt="Sobre Oro" class="opening-image">
            <button id="cancelarSobre3" class="openingcancelar-button">Cancelar</button>
            <button id="abrirSobre" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre de Oro</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Jugador con valor de mercado entre $100 y $125</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                <img src="jugadores/mobley.png" alt="" style="width:90px">
                <img src="jugadores/harris.png" alt="" style="width:90px">
                <img src="jugadores/turner.png" alt="" style="width:90px">
                <img src="jugadores/harden.png" alt="" style="width:90px">
                <img src="jugadores/beal.png" alt="" style="width:90px">
                <img src="jugadores/allen.png" alt="" style="width:90px">
                <img src="jugadores/rozier.png" alt="" style="width:90px">
                <img src="jugadores/johnson.png" alt="" style="width:90px">
                <img src="jugadores/russell.png" alt="" style="width:90px">
                <img src="jugadores/vanvleet.png" alt="" style="width:90px">
                <img src="jugadores/vassell.png" alt="" style="width:90px">
                <img src="jugadores/garland.png" alt="" style="width:90px">
                <img src="jugadores/sexton.png" alt="" style="width:90px">
                <img src="jugadores/white.png" alt="" style="width:90px">
                <img src="jugadores/thompson.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening ultimate -->
<div id="openingUltimate" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/ultimate.png" alt="Sobre Ultimate" class="opening-image">
            <button id="cancelarSobre4" class="openingcancelar-button">Cancelar</button>
            <button id="abrirSobre" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre Ultimate</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Jugador con valor de mercado mayor a $125</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                <img src="jugadores/doncic.png" alt="" style="width:90px">
                <img src="jugadores/embiid.png" alt="" style="width:90px">
                <img src="jugadores/jokic.png" alt="" style="width:90px">
                <img src="jugadores/shai.png" alt="" style="width:90px">
                <img src="jugadores/edwards.png" alt="" style="width:90px">
                <img src="jugadores/lebron.png" alt="" style="width:90px">
                <img src="jugadores/tatum.png" alt="" style="width:90px">
                <img src="jugadores/brunson.png" alt="" style="width:90px">
                <img src="jugadores/giannis.png" alt="" style="width:90px">
                <img src="jugadores/leonard.png" alt="" style="width:90px">
                <img src="jugadores/durant.png" alt="" style="width:90px">
                <img src="jugadores/mitchell.png" alt="" style="width:90px">
                <img src="jugadores/fox.png" alt="" style="width:90px">
                <img src="jugadores/irving.png" alt="" style="width:90px">
                <img src="jugadores/booker.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening ultimate -->
<div id="openingDraft" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/draft.png" alt="Sobre Draft" class="opening-image">
            <button id="cancelarSobre5" class="openingcancelar-button">Cancelar</button>
            <button id="draftButton" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre de Draft</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Jugador elegido en el draft de 2024</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                <img src="jugadores/james jr.png" alt="" style="width:90px">
                <img src="jugadores/edey.png" alt="" style="width:90px">
                <img src="jugadores/topic.png" alt="" style="width:90px">
                <img src="jugadores/buzelis.png" alt="" style="width:90px">
                <img src="jugadores/mccain.png" alt="" style="width:90px">
                <img src="jugadores/risacher.png" alt="" style="width:90px">
                <img src="jugadores/sarr.png" alt="" style="width:90px">
                <img src="jugadores/sheppard.png" alt="" style="width:90px">
                <img src="jugadores/castle.png" alt="" style="width:90px">
                <img src="jugadores/holland.png" alt="" style="width:90px">
                <img src="jugadores/salaun.png" alt="" style="width:90px">
                <img src="jugadores/clingan.png" alt="" style="width:90px">
                <img src="jugadores/dillingham.png" alt="" style="width:90px">
                <img src="jugadores/knecht.png" alt="" style="width:90px">
                <img src="jugadores/williams.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening ultimate -->
<div id="openingJJOO" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/JJOO.png" alt="Sobre Juegos Olímpicos 2024" class="opening-image">
            <button id="cancelarSobre6" class="openingcancelar-button">Cancelar</button>
            <button id="jjooButton" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre Juegos Olímpicos 2024</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Jugador que disputó los JJOO 2024 con su país</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                <img src="jugadores/curry.png" alt="" style="width:90px">
                <img src="jugadores/lebron.png" alt="" style="width:90px">
                <img src="jugadores/edwards.png" alt="" style="width:90px">
                <img src="jugadores/booker.png" alt="" style="width:90px">
                <img src="jugadores/davis.png" alt="" style="width:90px">
                <img src="jugadores/shai.png" alt="" style="width:90px">
                <img src="jugadores/jokic.png" alt="" style="width:90px">
                <img src="jugadores/giannis.png" alt="" style="width:90px">
                <img src="jugadores/wemby.png" alt="" style="width:90px">
                <img src="jugadores/schroder.png" alt="" style="width:90px">
                <img src="jugadores/embiid.png" alt="" style="width:90px">
                <img src="jugadores/tatum.png" alt="" style="width:90px">
                <img src="jugadores/durant.png" alt="" style="width:90px">
                <img src="jugadores/hachimura.png" alt="" style="width:90px">
                <img src="jugadores/alvarado.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening ultimate -->
<div id="openingCumple" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/cumpleaños.png" alt="Sobre Cumpleaños semanal" class="opening-image">
            <button id="cancelarSobre7" class="openingcancelar-button">Cancelar</button>
            <button id="cumpleButton" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre Cumpleaños semanal</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Jugador que cumple años entre el 20/10 y el 26/10</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                    &nbsp;&nbsp;&nbsp;<img src="jugadores/brown.png" alt="" style="width:90px">
                <img src="jugadores/vucevic.png" alt="" style="width:90px">
                <img src="jugadores/mathews.png" alt="" style="width:90px">
                <img src="jugadores/landale.png" alt="" style="width:90px">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Opening ultimate -->
<div id="openingDiario" class="opening">
    <div class="opening-content">
        <div class="opening-left">
            <img src="cartas/fondosobre.png" alt="Fondo" class="fondo-sobres">
            <img src="cartas/diario.png" alt="Sobre Diario" class="opening-image">
            <button id="cancelarSobre8" class="openingcancelar-button">Cancelar</button>
            <button id="abrirSobre" class="openingabrir-button">Abrir sobre</button>
        </div>
        <div class="opening-right">
            <div class="cuadradocelestejeje"></div>
            <h1 class="nombredelsobre">Sobre diario</h1>
            <div class="cuadradogrisjeje">&nbsp;Contenido del sobre</div>
            <div class="cuadradoblancojeje">- Cantidad de monedas entre 1 y 10</div>
            <div class="cuadradogris2jeje">&nbsp;Posibles recompensas</div>
            <div class="rewards-box">
                <div class="posibles-recompensas">
                    <p></p>
                    &nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Cuadrado blanco detrás de todo el contenido -->
    <div class="background-square" style="font-family: saira condensed; font-weight: 700; font-size: 30px; padding: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MANAGER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RESERVA
        <div class="background-court"></div>
        <h5 class="valor-de-mercado-letra" style="position: absolute; left: 160px; top: 400px">Valor de mercado</h4>
        <h1 class="valor-de-mercado" style="position: absolute; left: 185px; top: 350px; text-align: center">$<?php echo $valor_del_equipo; ?></h1>
        <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square" id="rounded-square">
            <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square2" id="rounded-square2">
            <div class="rounded-square3" style="z-index: 1;">PF</div>
            <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square4" id="rounded-square4">
            <div class="rounded-square5" style="z-index: 1;">C</div>
            <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square6" id="rounded-square6">
            <div class="rounded-square7" style="z-index: 1;">SF</div>
            <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square8" id="rounded-square8">
            <div class="rounded-square9" style="z-index: 1;">PG</div>
            <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square10" id="rounded-square10">
            <div class="rounded-square11" style="z-index: 1;">SG</div>
            <img style="z-index: 1" src="jugadores/vacio.png" alt="Vacío" class="rounded-square12" id="rounded-square12">
            <div class="rounded-square13" style="z-index: 1;">R</div>
            <div class="rounded-square18" style="z-index: 1;">HC</div>
            <img style="z-index: 0" class="base" id="base" src="jugadores/<?php echo $base; ?>.png" alt="Jugador">
            <img style="z-index: 0" class="escolta" id="escolta" src="jugadores/<?php echo $escolta; ?>.png" alt="Jugador">
            <img style="z-index: 0" class="alero" id="alero" src="jugadores/<?php echo $alero; ?>.png" alt="Jugador">
            <img style="z-index: 0" class="alapivot" id="alapivot" src="jugadores/<?php echo $alapivot; ?>.png" alt="Jugador">
            <img style="z-index: 0" class="pivot" id="pivot" src="jugadores/<?php echo $pivot; ?>.png" alt="Jugador">
            <img style="z-index: 0" class="manager" id="manager" src="jugadores/<?php echo $manager; ?>.png" alt="Jugador">
            <img style="z-index: 0" class="reserva" id="reserva" src="jugadores/<?php echo $reserva; ?>.png" alt="Jugador">
            <button class="meterReserva" id="meterReserva" style="font-family: saira condensed; font-size: 25px">
            <img src="cartas/cambio.png" alt="Cambio" style="width: 20px; height: 20px; vertical-align: middle;">&nbspMeter</button>
            <?php if (!empty($puntosAlapivot)): ?>
    <div class="rounded-square19" style="z-index: 1;"><?php echo $puntosAlapivot; ?></div>
<?php else: ?>
    <div class="rounded-square19" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>

<?php if (!empty($puntosPivot)): ?>
    <div class="rounded-square20" style="z-index: 1;"><?php echo $puntosPivot; ?></div>
<?php else: ?>
    <div class="rounded-square20" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>

<?php if (!empty($puntosAlero)): ?>
    <div class="rounded-square21" style="z-index: 1;"><?php echo $puntosAlero; ?></div>
<?php else: ?>
    <div class="rounded-square21" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>

<?php if (!empty($puntosBase)): ?>
    <div class="rounded-square22" style="z-index: 1;"><?php echo $puntosBase; ?></div>
<?php else: ?>
    <div class="rounded-square22" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>

<?php if (!empty($puntosEscolta)): ?>
    <div class="rounded-square23" style="z-index: 1;"><?php echo $puntosEscolta; ?></div>
<?php else: ?>
    <div class="rounded-square23" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>

<?php if (!empty($puntosReserva)): ?>
    <div class="rounded-square24" style="z-index: 1;"><?php echo $puntosReserva; ?></div>
<?php else: ?>
    <div class="rounded-square24" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>

<?php if (!empty($puntosManager)): ?>
    <div class="rounded-square25" style="z-index: 1;"><?php echo $puntosManager; ?></div>
<?php else: ?>
    <div class="rounded-square25" style="z-index: 1; display:none;"></div> <!-- O puedes dejarlo vacío -->
<?php endif; ?>



    </div>
    <div class="background-square2" style="font-family: saira condensed; font-weight: 700; font-size: 30px">TU EQUIPO</div>
    <div class="background-square3" style="font-family: saira condensed; font-weight: 700; font-size: 30px">MERCADO DE FICHAJES</div>
    <div class="background-square4">
        <p id="puntos-doncic" style="font-family: saira condensed; font-weight: 700; font-size: 30px">Loading...</p>
    </div>
    <div class="background-square5">
        <p style="position: absolute; top: 900px; color: transparent">hola</p>
        
    </div>
    <div class="background-square6" style= "font-family: saira condensed; font-weight: 700; font-size: 30px">TABLA DE POSICIONES</div>

    <div class="top-bar">
        <img src="custom_logo.png" alt="Logo de NBA Fantasy">
        <div class="login-section">
            <img src="avatars/avatar19.png" alt="" class="bienvenido" style="height: 28px; width: auto; position: absolute; right: 302px; padding: 0px; background-color: #6078A5">
            <h4 class="bienvenido"><?php echo $usuario ?></h4>
            <a href="../php/cerrar_sesion.php" class="cerrar_sesion">Cerrar sesión</a>
        </div>
    </div>

    <div class="main-container">
       

        <!-- Las imágenes de los jugadores se han eliminado -->
        <div class="left-panel">
            <div class="header">
                &nbsp;<img src="avatars/avatar<?php echo $perfil ?>.png" alt="Team Logo" id="elegirAvatar" class="elegirAvatar">
                <div style="font-family: saira condensed; font-weight: bold; font-size: 23px" class="team-name">TU EQUIPO
                </div>
                &nbsp;<button id="vaciarButton"><alt="Buscar">Vaciar equipo</button>
                &nbsp;<button id="baseButton"><alt="Buscar">Conseguir equipo</button>
                &nbsp;<button id="Muerte">Click aquí</button>
                &nbsp;&nbsp;&nbsp;<p style="font-family: saira condensed; font-weight: 700; font-size: 30px">$<?php echo $dinero; ?></p>
                &nbsp;<img src="cartas/lideres.png" alt="Lideres" class="ver-lideres-button" id="verLideresButton" title="Ver mejores jugadores" style="width: 150px">
                &nbsp;<img src="cartas/sobres.png" alt="Sobre" class="open-packs-button" id="openPacksButton" title="Abrir sobres" style="width: 150px">
                &nbsp;<img src="cartas/calendario.png" alt="Misiones" class="misiones-button" id="misionesButton" title="Calendario" style="width: 150px">
                &nbsp;<img src="cartas/avisos.png" alt="Avisos" class="avisos" title="Novedades" style="width: 38px; position: absolute; right:260px">
                <div class="search-bar">
                    <input style="font-family: saira condensed; font-weight: 700; font-size: 20px" color="white" class="searchInputt" type="text" id="searchInput" placeholder="Buscar Jugadores...">
                    <button id="searchButton"><img src="search-icon.png" alt="Buscar"></button>
                </div>
            </div>

            <!-- Modal para elegir sobres -->
<div id="packsModal" class="modal">
    <div class="modal-content2">
        <h2>Elige un tipo de sobre</h2>
        <div class="packs-container">
            <button class="pack-button1" id="sobreBronce">
                <span class="button-text">Sobre de bronce</span>
            </button>

            &nbsp;&nbsp;<button class="pack-button2" id="sobrePlata">
                <span class="button-text">Sobre de plata</span>
            </button>

            &nbsp;&nbsp;<button class="pack-button3" id="sobreOro">
                <span class="button-text">Sobre de oro</span>
            </button>

            &nbsp;&nbsp;<button class="pack-button4" id="sobreUltimate">
                <span class="button-text">Sobre Ultimate</span>
            </button>

            <br><br><br><br>
            <button class="pack-button5" id="sobreDraft">
                <span class="button-text">Sobre Draft 2024</span>
            </button>

            &nbsp;&nbsp;<button id="sobreJJOO" class="pack-button6">
                <span class="button-text">Sobre JJOO</span>
            </button>


            &nbsp;&nbsp;<button id="sobreCumple" class="pack-button7">
                <span class="button-text">Sobre Cumpleaños</span>
            </button>
           
            &nbsp;&nbsp;<button class="pack-button8" id="sobreDiario">
                <span class="button-text">Sobre diario</span>
            </button>
        </div>
        <button id="closePacksButton" class="closepack-button">Cerrar</button>
    </div>
</div>

<!-- Modal-content4 para el video -->
<div id="modal-content4" class="modal" style="display: none">
    <div class="modal-content4">
        <video id="draftVideo" width="100%" autoplay muted>
            <source src="draft.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>



    <!-- Ventana Modal para buscar jugadores -->
<div id="playerModal" class="modal">
    <div class="modal-content">
        <h2 style="font-family: saira condensed; font-weight: 700; font-size: 35px; vertical-align: -150px;">Buscar Jugadores</h2>
        <!-- Contenedor para la barra de búsqueda y los botones -->
        <div class="search-container">
            <input style="font-family: saira condensed; font-weight: 700; font-size: 17px" type="text" id="modalSearchInput" class="modal-inputt" placeholder="Buscar...">
            <button id="modalSearchButton" class="search-button" style="font-family: saira condensed; font-weight: 700; font-size: 17px">Buscar</button>
            <button id="closeModalButton" class="close-button" style="font-family: saira condensed; font-weight: 700; font-size: 17px; position: absolute; top: 87px; left: 744px">Cerrar</button>
        </div>
        <div>
            <button id="buscarPorPosicion" class="close-button" style="font-family: saira condensed; font-weight: 700; font-size: 17px">Buscar por Posición</button>
            <select id="positionSelect" class="modal-input" style="font-family: saira condensed; font-weight: 700; font-size: 17px">
                <option value="">Selecciona una posición</option>
                <option value="PG">PG</option>
                <option value="SG">SG</option>
                <option value="SF">SF</option>
                <option value="PF">PF</option>
                <option value="C">C</option>
                <option value="HC">HC</option>
            </select>
        </div>
        <div>
            <button id="buscarPorEquipo" class="close-button" style="font-family: saira condensed; font-weight: 700; font-size: 17px">Buscar por Equipo</button>
            <select style="font-family: saira condensed; font-weight: 700; font-size: 17px" id="teamSelect" class="modal-input">
                <option value="">Selecciona un equipo</option>
                <!-- Agregar más opciones según los equipos disponibles -->
            </select>
        </div>
        <div id="results" justify-content=space-between; class="modal-results" style="z-index: "></div>
    </div>
</div>

            <!-- Cuadrado redondeado agregado aquí -->
             
           
        </div>


    <!-- Ventana Modal para buscar jugadores -->
<div id="playerModal" class="modal">
    <div class="modal-content">
        <h2 style="vertical-align: 150px">Buscar Jugadores</h2>
        <!-- Contenedor para la barra de búsqueda y los botones -->
        <div class="search-container">
            <input type="text" id="modalSearchInput" class="modal-input" placeholder="Buscar...">
            <button id="modalSearchButton" class="close-button">Buscar</button><button id="closeModalButton" class="close-button">Cerrar</button>
        </div>
        <div>
            <button id="ordenarEquipo" class="close-button">Buscar por Equipo</button>
            <button id="ordenarPosicion" class="close-button">Buscar por Posición</button>
            <button id="ordenarValor" class="close-button">Ordenar por Valor</button>
        </div>
        <div id="results" class="modal-results"></div>
    </div>
</div>

<!-- Ventana Modal para buscar jugadores -->
<div id="playerModal" class="modal">
    <div class="modal-content">
        <h2 style="vertical-align: 150px">Buscar Jugadores</h2>
        <!-- Contenedor para la barra de búsqueda y los botones -->
        <div class="search-container">
            <input type="text" id="modalSearchInput" class="modal-input" placeholder="Buscar...">
            <button id="modalSearchButton" class="close-button">Buscar</button><button id="closeModalButton" class="close-button">Cerrar</button>
        </div>
        <div>
            <button id="buscarPorPosicion" class="close-button">Buscar por Posición</button>
            <select id="positionSelect" class="modal-input">
                <option value="">Selecciona una posición</option>
                <option value="PG">PG</option>
                <option value="SG">SG</option>
                <option value="SF">SF</option>
                <option value="PF">PF</option>
                <option value="C">C</option>
            </select>
        </div>
       
    </div>
</div>

<script>

var hayRecompensa = <?php echo json_encode($recompensa); ?>;

window.onload = function() {
    if (hayRecompensa != 1) {
    const randomIndex = Math.floor(Math.random() * bases_principio.length);
    const randomIndex2 = Math.floor(Math.random() * escoltas_principio.length);
    const randomIndex3 = Math.floor(Math.random() * aleros_principio.length);
    const randomIndex4 = Math.floor(Math.random() * alapivots_principio.length);
    const randomIndex5 = Math.floor(Math.random() * pivots_principio.length);
    const randomIndex6 = Math.floor(Math.random() * managers_principio.length);
    const base_actualizado = bases_principio[randomIndex].nombre; // Obtener el nombre del jugador
    const escolta_actualizado = escoltas_principio[randomIndex2].nombre; // Obtener el nombre del jugador
    const alero_actualizado = aleros_principio[randomIndex3].nombre; // Obtener el nombre del jugador
    const alapivot_actualizado = alapivots_principio[randomIndex4].nombre; // Obtener el nombre del jugador
    const pivot_actualizado = pivots_principio[randomIndex5].nombre; // Obtener el nombre del jugador
    const manager_actualizado = managers_principio[randomIndex6].nombre; // Obtener el nombre del jugador

    // Crear un objeto FormData para enviar los datos al servidor
    const formData = new FormData();
    formData.append('base', base_actualizado); // Agregar el valor al FormData
    formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
    formData.append('alero', alero_actualizado); // Agregar el valor al FormData
    formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
    formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
    formData.append('manager', manager_actualizado); // Agregar el valor al FormData
    formData.append('dinero', "50");
    formData.append('recompensa', "1");

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
    }
};
        // Definición de la clase Jugador
        class Jugador {
            constructor(nombre, nombreCompleto, equipo, posicion, valor, imagen, puntosUltimoPartido, puntosDosPartidosAtras, puntosTresPartidosAtras, disponible, clausula, lesionado) {
                this.nombre = nombre;
                this.nombreCompleto = nombreCompleto;
                this.equipo = equipo;
                this.posicion = posicion;
                this.valor = valor;
                this.imagen = imagen;
                this.puntosUltimoPartido = puntosUltimoPartido;
                this.puntosDosPartidosAtras = puntosDosPartidosAtras;
                this.puntosTresPartidosAtras = puntosTresPartidosAtras;
                this.disponible = disponible;
                this.clausula = valor * 2;
                this.lesionado = lesionado
            }
   
            // Método para obtener la información del jugador en formato de texto
            obtenerInformacion() {
                return `
                    Nombre: ${this.nombre}
                    Nombre Completo: ${this.nombreCompleto}
                    Equipo: ${this.equipo}
                    Posición: ${this.posicion}
                    Valor: ${this.valor}
                    Imagen: ${this.imagen}
                    Puntos Último Partido: ${this.puntosUltimoPartido}
                    Puntos Dos Partidos Atras: ${this.puntosDosPartidosAtras}
                    Puntos Tres Partidos Atras: ${this.puntosTresPartidosAtras}
                `;
            }
        }
   
        // Lista de jugadores
        const jugadores = [
                //ATLANTA HAWKS
                new Jugador('snyder','Quin Snyder','Hawks','HC',75,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('trae','Trae Young','Hawks','PG',137,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('daniels','Dyson Daniels','Hawks','SG',84,'jugadores/daniels.png',30,25,18,true,' ',' '),
                new Jugador('risacher','Zaccharie Risacher','Hawks','SF',90,'jugadores/risacher.png',30,25,18,true,' ',' '),
                new Jugador('johnson','Jalen Johnson','Hawks','PF',123,'jugadores/johnson.png',30,25,18,true,' ',' '),
                new Jugador('capela','Clint Capela','Hawks','C',115,'jugadores/capela.png',30,25,18,true,' ',' '),
                new Jugador('hunter','De´Andre Hunter','Hawks','SF',115,'jugadores/hunter.png',30,25,18,true,' ',' '),
                new Jugador('bogdanovic','Bogdan Bogdanovic','Hawks','SG',119,'jugadores/bogdanovic.png',30,25,18,true,' ',' '),
                new Jugador('okongwu','Onyeka Okongwu','Hawks','PF',105,'jugadores/okongwu.png',30,25,18,true,' ',' '),
                new Jugador('nance jr','Larry Nance Jr','Hawks','PF',86,'jugadores/nance jr.png',30,25,18,true,' ',' '),
                new Jugador('bufkin','Kobe Bufkin','Hawks','PG',68,'jugadores/bufkin.png',30,25,18,true,' ',' '),
                new Jugador('zeller','Cody Zeller','Hawks','C',52,'jugadores/zeller.png',30,25,18,true,' ',' '),
                new Jugador('mathews','Garrison Mathews','Hawks','SG',66,'jugadores/mathews.png',30,25,18,true,' ',' '),

                //BOSTON CELTICS
                new Jugador('mazzulla','Joe Mazzulla','Celtics','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('holiday','Jrue Holiday','Celtics','PG',114,'jugadores/holiday.png',30,25,18,true,' ',' '),
                new Jugador('white','Derrick White','Celtics','SG',120,'jugadores/white.png',30,25,18,true,' ',' '),
                new Jugador('brown','Jaylen Brown','Celtics','SF',135,'jugadores/brown.png',30,25,18,true,' ',' '),
                new Jugador('tatum','Jayson Tatum','Celtics','PF',145,'jugadores/tatum.png',30,25,18,true,' ',' '),
                new Jugador('porzingis','Kristaps Porzingis','Celtics','C',132,'jugadores/porzingis.png',30,25,18,true,' ','| 🚑 Vuelta esperada: Diciembre'),
                new Jugador('pritchard','Payton Pritchard','Celtics','PG',101,'jugadores/pritchard.png',30,25,18,true,' ',' '),
                new Jugador('springer','Jaden Springer','Celtics','SG',57,'jugadores/springer.png',30,25,18,true,' ',' '),
                new Jugador('hauser','Sam Hauser','Celtics','SF',99,'jugadores/hauser.png',30,25,18,true,' ',' '),
                new Jugador('tillman','Xavier Tillman','Celtics','PF',78,'jugadores/tillman.png',30,25,18,true,' ',' '),
                new Jugador('kornet','Luke Kornet','Celtics','C',83,'jugadores/kornet.png',30,25,18,true,' ',' '),
                new Jugador('queta','Neemias Queta','Celtics','C',86,'jugadores/queta.png',30,25,18,true,' ',' '),
                new Jugador('horford','Al Horford','Celtics','PF',104,'jugadores/horford.png',30,25,18,true,' ',' '),

                //BROOKLYN NETS
                new Jugador('fernandez','Jordi Fernandez','Nets','HC',70,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('schroder','Dennis Schroder','Nets','PG',111,'jugadores/schroder.png',30,25,18,true,' ',' '),
                new Jugador('thomas','Cam Thomas','Nets','SG',128,'jugadores/thomas.png',30,25,18,true,' ',' '),
                new Jugador('bogdanovic2','Bojan Bogdanovic','Nets','SF',109,'jugadores/bogdanovic2.png',30,25,18,true,' ',' '),
                new Jugador('johnson2','Cameron Johnson','Nets','PF',110,'jugadores/johnson2.png',30,25,18,true,' ',' '),
                new Jugador('claxton','Nic Claxton','Nets','C',113,'jugadores/claxton.png',30,25,18,true,' ',' '),
                new Jugador('simmons','Ben Simmons','Nets','PG',95,'jugadores/simmons.png',30,25,18,true,' ',' '),
                new Jugador('finneysmith','Dorian Finney-Smith','Nets','PF',94,'jugadores/finneysmith.png',30,25,18,true,' ',' '),
                new Jugador('williams2','Ziaire Williams','Nets','SF',88,'jugadores/williams2.png',30,25,18,true,' ',' '),
                new Jugador('sharpe','Day´Ron Sharpe','Nets','C',94,'jugadores/sharpe.png',30,25,18,true,' ',' '),
                new Jugador('clowney','Noah Clowney','Nets','SF',78,'jugadores/sharpe.png',30,25,18,true,' ',' '),
                new Jugador('whitehead','Dariq Whitehead','Nets','SF',50,'jugadores/whitehead.png',30,25,18,true,' ',' '),
                new Jugador('milton','Shake Milton','Nets','SG',66,'jugadores/whitehead.png',30,25,18,true,' ',' '),

                //CHARLOTTE HORNETS
                new Jugador('lee2','Charles Lee','Hornets','HC',58,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('ball','Lamelo Ball','Hornets','PG',134,'jugadores/ball.png',30,25,18,true,' ',' '),
                new Jugador('mann','Tre Mann','Hornets','SG',96,'jugadores/mann.png',30,25,18,true,' ',' '),
                new Jugador('bridges','Miles Bridges','Hornets','SF',128,'jugadores/bridges.png',30,25,18,true,' ',' '),
                new Jugador('miller','Brandon Miller','Hornets','PF',117,'jugadores/miller.png',30,25,18,true,' ',' '),
                new Jugador('williams3','Mark Williams','Hornets','C',116,'jugadores/williams3.png',30,25,18,true,' ',' '),
                new Jugador('williams4','Grant Williams','Hornets','PF',99,'jugadores/williams4.png',30,25,18,true,' ',' '),
                new Jugador('green2','Josh Green','Hornets','SF',90,'jugadores/green2.png',30,25,18,true,' ',' '),
                new Jugador('martin2','Cody Martin','Hornets','SF',87,'jugadores/martin2.png',30,25,18,true,' ',' '),
                new Jugador('micic','Vasilije Micic','Hornets','PG',83,'jugadores/micic.png',30,25,18,true,' ',' '),
                new Jugador('richards','Nick Richards','Hornets','C',102,'jugadores/richards.png',30,25,18,true,' ',' '),
                new Jugador('curry2','Seth Curry','Hornets','SG',72,'jugadores/curry2.png',30,25,18,true,' ',' '),
                new Jugador('salaun','Tidjane Salaun','Hornets','SF',85,'jugadores/salaun.png',30,25,18,true,' ',' '),

                //CHICAGO BULLS
                new Jugador('donovan','Billy Donovan','Bulls','HC',77,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('giddey','Josh Giddey','Bulls','PG',115,'jugadores/giddey.png',30,25,18,true,' ',' '),
                new Jugador('white2','Coby White','Bulls','SG',125,'jugadores/white2.png',30,25,18,true,' ',' '),
                new Jugador('lavine','Zach Lavine','Bulls','SF',125,'jugadores/lavine.png',30,25,18,true,' ',' '),
                new Jugador('williams5','Patrick Williams','Bulls','PF',99,'jugadores/williams5.png',30,25,18,true,' ',' '),
                new Jugador('vucevic','Nikola Vucevic','Bulls','C',129,'jugadores/vucevic.png',30,25,18,true,' ',' '),
                new Jugador('buzelis','Matas Buzelis','Bulls','SF',75,'jugadores/buzelis.png',30,25,18,true,' ',' '),
                new Jugador('ball2','Lonzo Ball','Bulls','PG',61,'jugadores/ball2.png',30,25,18,true,' ',' '),
                new Jugador('smith','Jalen Smith','Bulls','PF',101,'jugadores/smith.png',30,25,18,true,' ',' '),
                new Jugador('dosunmu','Ayo Dosunmu','Bulls','SF',104,'jugadores/dosunmu.png',30,25,18,true,' ',' '),
                new Jugador('carter2','Jevon Carter','Bulls','PG',68,'jugadores/carter2.png',30,25,18,true,' ',' '),
                new Jugador('duarte','Chris Duarte','Bulls','SG',61,'jugadores/duarte.png',30,25,18,true,' ',' '),
                new Jugador('sanogo','Adama Sanogo','Bulls','C',76,'jugadores/sanogo.png',30,25,18,true,' ',' '),

                //CLEVELAND CAVALIERS
                new Jugador('atkinson','Kenny Atkinson','Cavaliers','HC',90,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('garland','Darius Garland','Cavaliers','PG',122,'jugadores/garland.png',30,25,18,true,' ',' '),
                new Jugador('mitchell','Donovan Mitchell','Cavaliers','SG',141,'jugadores/mitchell.png',30,25,18,true,' ',' '),
                new Jugador('strus','Max Strus','Cavaliers','SF',111,'jugadores/strus.png',30,25,18,true,' ',' '),
                new Jugador('mobley','Evan Mobley','Cavaliers','PF',124,'jugadores/mobley.png',30,25,18,true,' ',' '),
                new Jugador('allen2','Jarrett Allen','Cavaliers','C',128,'jugadores/allen2.png',30,25,18,true,' ',' '),
                new Jugador('levert','Caris Levert','Cavaliers','SG',114,'jugadores/levert.png',30,25,18,true,' ',' '),
                new Jugador('niang','Georges Niang','Cavaliers','SF',96,'jugadores/niang.png',30,25,18,true,' ',' '),
                new Jugador('wade','Dean Wade','Cavaliers','PF',83,'jugadores/wade.png',30,25,18,true,' ',' '),
                new Jugador('merrill','Sam Merrill','Cavaliers','SG',87,'jugadores/merrill.png',30,25,18,true,' ',' '),
                new Jugador('thor','JT Thor','Cavaliers','SF',58,'jugadores/thor.png',30,25,18,true,' ',' '),
                new Jugador('thompson2','Tristan Thompson','Cavaliers','C',66,'jugadores/thompson2.png',30,25,18,true,' ',' '),
                new Jugador('tyson','Jaylon Tyson','Cavaliers','SF',60,'jugadores/tyson.png',30,25,18,true,' ',' '),

                //DALLAS MAVERICKS
                new Jugador('kidd','Jason Kidd','Mavericks','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('doncic','Luka Doncic','Mavericks','PG',150,'jugadores/doncic.png',27,23,20,true,' ',' '),
                new Jugador('irving','Kyrie Irving','Mavericks','PG',139,'jugadores/irving.png',27,23,20,true,' ',' '),
                new Jugador('thompson','Klay Thompson','Mavericks','SG',120,'jugadores/thompson.png',27,23,20,true,' ',' '),
                new Jugador('washington','PJ Washington','Mavericks','PF',110,'jugadores/washington.png',27,23,20,true,' ',' '),
                new Jugador('gafford','Daniel Gafford','Mavericks','C',108,'jugadores/gafford.png',27,23,20,true,' ',' '),
                new Jugador('lively','Dereck Lively II','Mavericks','C',102,'jugadores/lively.png',27,23,20,true,' ',' '),
                new Jugador('dinwiddie','Spencer Dinwiddie','Mavericks','PG',101,'jugadores/dinwiddie.png',27,23,20,true,' ',' '),
                new Jugador('grimes','Quentin Grimes','Mavericks','SG',82,'jugadores/grimes.png',27,23,20,true,' ',' '),
                new Jugador('marshall','Naji Marshall','Mavericks','SF',90,'jugadores/marshall.png',27,23,20,true,' ',' '),
                new Jugador('kleber','Maxi Kleber','Mavericks','PF',77,'jugadores/kleber.png',27,23,20,true,' ',' '),
                new Jugador('powell','Dwight Powell','Mavericks','C',66,'jugadores/powell.png',27,23,20,true,' ',' '),
                new Jugador('exum','Dante Exum','Mavericks','PG',93,'jugadores/exum.png',27,23,20,true,' ',' '),

                //DENVER NUGGETS
                new Jugador('malone','Michael Malone','Nuggets','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('murray2','Jamal Murray','Nuggets','PG',131,'jugadores/murray2.png',27,23,20,true,' ',' '),
                new Jugador('braun','Christian Braun','Nuggets','SG',88,'jugadores/braun.png',27,23,20,true,' ',' '),
                new Jugador('porter jr','Michael Porter Jr','Nuggets','SF',125,'jugadores/porter jr.png',27,23,20,true,' ',' '),
                new Jugador('gordon2','Aaron Gordon','Nuggets','PF',119,'jugadores/gordon2.png',27,23,20,true,' ',' '),
                new Jugador('jokic','Nikola Jokic','Nuggets','C',150,'jugadores/jokic.png',27,23,20,true,' ',' '),
                new Jugador('westbrook','Russell Westbrook','Nuggets','PG',107,'jugadores/westbrook.png',27,23,20,true,' ',' '),
                new Jugador('nnaji','Zeke Nnaji','Nuggets','PF',55,'jugadores/nnaji.png',27,23,20,true,' ',' '),
                new Jugador('saric','Dario Saric','Nuggets','PF',93,'jugadores/saric.png',27,23,20,true,' ',' '),
                new Jugador('jordan','DeAndre Jordan','Nuggets','C',70,'jugadores/jordan.png',27,23,20,true,' ',' '),
                new Jugador('strawther','Julian Strawther','Nuggets','SG',63,'jugadores/strawther.png',27,23,20,true,' ',' '),
                new Jugador('watson','Peyton Watson','Nuggets','SF',83,'jugadores/watson.png',27,23,20,true,' ',' '),
                new Jugador('holmes ii','DaRon Holmes II','Nuggets','C',50,'jugadores/holmes ii.png',27,23,20,true,' ','| 🚑 Vuelta esperada: Julio 2025'),

                //DETROIT PISTONS
                new Jugador('bickerstaff','JB Bickerstaff','Pistons','HC',52,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('cunningham','Cade Cunningham','Pistons','PG',131,'jugadores/cunningham.png',27,23,20,true,' ',' '),
                new Jugador('ivey','Jaden Ivey','Pistons','SG',113,'jugadores/ivey.png',27,23,20,true,' ',' '),
                new Jugador('thompson3','Ausar Thompson','Pistons','SF',98,'jugadores/thompson3.png',27,23,20,true,' ',' '),
                new Jugador('harris','Tobias Harris','Pistons','PF',124,'jugadores/thompson3.png',27,23,20,true,' ',' '),
                new Jugador('duren','Jalen Duren','Pistons','C',120,'jugadores/duren.png',27,23,20,true,' ',' '),
                new Jugador('hardaway','Tim Hardaway Jr','Pistons','SG',111,'jugadores/hardaway.png',27,23,20,true,' ',' '),
                new Jugador('stewart','Isaiah Stewart','Pistons','C',105,'jugadores/stewart.png',27,23,20,true,' ',' '),
                new Jugador('sasser','Marcus Sasser','Pistons','PG',86,'jugadores/sasser.png',27,23,20,true,' ',' '),
                new Jugador('reed','Paul Reed','Pistons','SG',95,'jugadores/reed.png',27,23,20,true,' ',' '),
                new Jugador('fontecchio','Simone Fontecchio','Pistons','SF',100,'jugadores/fontecchio.png',27,23,20,true,' ',' '),
                new Jugador('beasley','Malik Beasley','Pistons','SG',105,'jugadores/beasley.png',27,23,20,true,' ',' '),
                new Jugador('holland','Ron Holland II','Pistons','SF',85,'jugadores/holland.png',27,23,20,true,' ',' '),

                //GOLDEN STATE WARRIORS
                new Jugador('kerr','Steve Kerr','Warriors','HC',86,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('curry','Stephen Curry','Warriors','PG',139,'jugadores/curry.png',27,23,20,true,' ',' '),
                new Jugador('podziemski','Brandin Podziemski','Warriors','SG',104,'jugadores/podziemski.png',27,23,20,true,' ',' '),
                new Jugador('wiggins','Andrew Wiggins','Warriors','SF',110,'jugadores/wiggins.png',27,23,20,true,' ',' '),
                new Jugador('green3','Draymond Green','Warriors','PF',106,'jugadores/green3.png',27,23,20,true,' ',' '),
                new Jugador('looney','Kevon Looney','Warriors','C',82,'jugadores/looney.png',27,23,20,true,' ',' '),
                new Jugador('kuminga','Jonathan Kuminga','Warriors','PF',119,'jugadores/kuminga.png',27,23,20,true,' ',' '),
                new Jugador('jacksondavis','Trayce Jackson-Davis','Warriors','C',94,'jugadores/jacksondavis.png',27,23,20,true,' ',' '),
                new Jugador('melton','De´Anthony Melton','Warriors','SG',107,'jugadores/melton.png',27,23,20,true,' ',' '),
                new Jugador('payton','Gary Payton II','Warriors','SG',78,'jugadores/payton.png',27,23,20,true,' ',' '),
                new Jugador('hield','Buddy Hield','Warriors','SG',106,'jugadores/hield.png',27,23,20,true,' ',' '),
                new Jugador('anderson','Kyle Anderson','Warriors','SF',88,'jugadores/anderson.png',27,23,20,true,' ',' '),
                new Jugador('santos','Gui Santos','Warriors','SF',63,'jugadores/santos.png',27,23,20,true,' ',' '),

                //HOUSTON ROCKETS
                new Jugador('udoka','Ime Udoka','Rockets','HC',81,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('vanvleet','Fred VanVleet','Rockets','PG',123,'jugadores/vanvleet.png',27,23,20,true,' ',' '),
                new Jugador('green4','Jalen Green','Rockets','SG',127,'jugadores/green4.png',27,23,20,true,' ',' '),
                new Jugador('brooks','Dillon Brooks','Rockets','SF',107,'jugadores/brooks.png',27,23,20,true,' ',' '),
                new Jugador('smith jr','Jabari Smith Jr','Rockets','PF',116,'jugadores/smith jr.png',27,23,20,true,' ',' '),
                new Jugador('sengun','Alperen Sengun','Rockets','C',135,'jugadores/sengun.png',27,23,20,true,' ',' '),
                new Jugador('adams','Steven Adams','Rockets','C',64,'jugadores/adams.png',27,23,20,true,' ',' '),
                new Jugador('thompson4','Amen Thompson','Rockets','SF',104,'jugadores/thompson4.png',27,23,20,true,' ',' '),
                new Jugador('landale','Jock Landale','Rockets','C',78,'jugadores/landale.png',27,23,20,true,' ',' '),
                new Jugador('green5','Jeff Green','Rockets','PF',79,'jugadores/green5.png',27,23,20,true,' ',' '),
                new Jugador('tate','Jae´Sean Tate','Rockets','SF',71,'jugadores/tate.png',27,23,20,true,' ',' '),
                new Jugador('holiday2','Aaron Holiday','Rockets','PG',83,'jugadores/holiday2.png',27,23,20,true,' ',' '),
                new Jugador('sheppard','Reed Sheppard','Rockets','SG',90,'jugadores/sheppard.png',27,23,20,true,' ',' '),

                //INDIANA PACERS
                new Jugador('carlisle','Rick Carlisle','Pacers','HC',93,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('haliburton','Tyrese Haliburton','Pacers','PG',131,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('nembhard','Andrew Nembhard','Pacers','SG',95,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('nesmith','Aaron Nesmith','Pacers','SF',107,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('siakam','Pascal Siakam','Pacers','PF',133,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('turner','Myles Turner','Pacers','C',124,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('toppin','Obi Toppin','Pacers','PF',101,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('mcconnell','T.J. McConnell','Pacers','PG',101,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('mathurin','Bennedict Mathurin','Pacers','SG',112,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('walker','Jarace Walker','Pacers','SF',63,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('jackson2','Isaiah Jackson','Pacers','SF',85,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('sheppard2','Ben Sheppard','Pacers','PG',67,'jugadores/sheppard.png',27,23,20,true,' ',' '),
                new Jugador('wiseman','James Wiseman','Pacers','C',87,'jugadores/sheppard.png',27,23,20,true,' ',' '),

                //LOS ANGELES CLIPPERS
                new Jugador('lue','Tyronn Lue','Clippers','HC',91,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('harden','James Harden','Clippers','PG',124,'jugadores/harden.png',27,23,20,true,' ',' '),        
                new Jugador('mann2','Terance Mann','Clippers','SG',94,'jugadores/mann2.png',27,23,20,true,' ',' '),        
                new Jugador('leonard','Kawhi Leonard','Clippers','SF',137,'jugadores/leonard.png',27,23,20,true,' ',' '),        
                new Jugador('jones jr','Derrick Jones Jr','Clippers','PF',93,'jugadores/jones jr.png',27,23,20,true,' ',' '),        
                new Jugador('zubac','Ivica Zubac','Clippers','C',115,'jugadores/zubac.png',27,23,20,true,' ',' '),        
                new Jugador('powell2','Norman Powell','Clippers','PG',110,'jugadores/powell2.png',27,23,20,true,' ',' '),        
                new Jugador('tucker','PJ Tucker','Clippers','PF',58,'jugadores/tucker.png',27,23,20,true,' ',' '),        
                new Jugador('dunn2','Kris Dunn','Clippers','SG',80,'jugadores/dunn2.png',27,23,20,true,' ',' '),        
                new Jugador('batum','Nicolas Batum','Clippers','PF',84,'jugadores/batum.png',27,23,20,true,' ',' '),        
                new Jugador('hyland','Bones Hyland','Clippers','PG',80,'jugadores/hyland.png',27,23,20,true,' ',' '),        
                new Jugador('coffey','Amir Coffey','Clippers','SG',79,'jugadores/coffey.png',27,23,20,true,' ',' '),        
                new Jugador('bamba','Mo Bamba','Clippers','C',74,'jugadores/bamba.png',27,23,20,true,' ',' '),        

                //LOS ANGELES LAKERS
                new Jugador('redick','JJ Redick','Lakers','HC',88,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('lebron','LeBron James','Lakers','SF',142,'jugadores/reaves.png',23,28,37,true,' ',' '),
                new Jugador('russell','D´Angelo Russell','Lakers','PG',123,'jugadores/davis.png',23,28,37,true,' ',' '),
                new Jugador('reaves','Austin Reaves','Lakers','SG',118,'jugadores/reaves.png',23,28,37,true,' ',' '),
                new Jugador('davis','Anthony Davis','Lakers','C',143,'jugadores/davis.png',23,28,37,true,' ',' '),
                new Jugador('hachimura','Rui Hachimura','Lakers','SF',111,'jugadores/hachimura.png',23,28,37,true,' ',' '),
                new Jugador('vincent','Gabe Vincent','Lakers','PG',59,'jugadores/vincent.png',23,28,37,true,' ',' '),
                new Jugador('james jr','Bronny James Jr','Lakers','PG',72,'jugadores/james jr.png',23,28,37,true,' ',' '),
                new Jugador('christie','Max Christie','Lakers','SG',67,'jugadores/christie.png',23,28,37,true,' ',' '),
                new Jugador('reddish','Cam Reddish','Lakers','SF',73,'jugadores/reddish.png',23,28,37,true,' ',' '),
                new Jugador('knecht','Dalton Knecht','Lakers','SF',65,'jugadores/knecht.png',23,28,37,true,' ',' '),
                new Jugador('vanderbilt','Jarred Vanderbilt','Lakers','PF',83,'jugadores/vanderbilt.png',23,28,37,true,' ',' '),
                new Jugador('wood','Christian Wood','Lakers','SF',90,'jugadores/wood.png',23,28,37,true,' ','| 🚑 Vuelta esperada: Noviembre'),

                //MEMPHIS GRIZZLIES
                new Jugador('jenkins','Taylor Jenkins','Grizzlies','HC',65,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('morant','Ja Morant','Grizzlies','PG',139,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('smart','Marcus Smart','Grizzlies','SG',111,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('bane','Desmond Bane','Grizzlies','SF',132,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('jackson3','Jaren Jackson Jr','Grizzlies','PF',130,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('edey','Zach Edey','Grizzlies','C',90,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('clarke','Brandon Clarke','Grizzlies','PF',105,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('kennard','Luke Kennard','Grizzlies','SG',98,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('konchar','John Konchar','Grizzlies','SG',74,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('aldama','Santi Aldama','Grizzlies','PF',103,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('williams9','Vince Williams Jr','Grizzlies','PG',78,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('laravia','Jake LaRavia','Grizzlies','SF',99,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('jackson4','GG Jackson II','Grizzlies','SF',111,'jugadores/wood.png',23,28,37,true,' ','| 🚑 Vuelta esperada: Diciembre'),

                //MIAMI HEAT
                new Jugador('spoelstra','Eric Spoelstra','Heat','HC',86,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('rozier','Terry Rozier','Heat','PG',124,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('herro','Tyler Herro','Heat','SG',130,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('jovic','Nikola Jovic','Heat','SF',94,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('butler','Jimmy Butler','Heat','PF',131,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('adebayo','Bam Adebayo','Heat','C',132,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('robinson2','Duncan Robinson','Heat','SF',107,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('highsmith','Haywood Highsmith','Heat','SF',81,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('love','Kevin Love','Heat','PF',101,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('jaquez','Jaime Jaquez Jr','Heat','PG',106,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('richardson','Josh Richardson','Heat','SG',95,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('bryant','Thomas Bryant','Heat','C',81,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('ware','Kel´El Ware','Heat','C',70,'jugadores/wood.png',23,28,37,true,' ',' '),

                //MILWAUKEE BUCKS
                new Jugador('rivers','Doc Rivers','Bucks','HC',90,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('lillard','Damian Lillard','Bucks','PG',137,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('trent jr','Gary Trent Jr','Bucks','SG',107,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('middleton','Khris Middleton','Bucks','SF',118,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('giannis','Giannis Antetokounmpo','Bucks','PF',150,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('lopez','Brook Lopez','Bucks','C',111,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('portis','Bobby Portis','Bucks','SF',116,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('connaughton','Pat Connaughton','Bucks','SG',80,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('johnson4','AJ Johnson','Bucks','PG',50,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('beauchamp','MarJon Beauchamp','Bucks','SF',67,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('green','AJ Green','Bucks','PG',65,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('prince','Taurean Prince','Bucks','PF',92,'jugadores/wood.png',23,28,37,true,' ',' '),
                new Jugador('wright','Delon Wright','Bucks','SG',70,'jugadores/wood.png',23,28,37,true,' ',' '),

                //MINNESOTA TIMBERWOLVES
                new Jugador('finch','Chris Finch','Timberwolves','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('conley','Mike Conley','Timberwolves','PG',107,'jugadores/conley.png',27,23,20,true,' ',' '),        
                new Jugador('edwards','Anthony Edwards','Timberwolves','SG',140,'jugadores/edwards.png',27,23,20,true,' ',' '),        
                new Jugador('mcdaniels2','Jaden McDaniels','Timberwolves','SF',101,'jugadores/mcdaniels2.png',27,23,20,true,' ',' '),      
                new Jugador('gobert','Rudy Gobert','Timberwolves','C',126,'jugadores/gobert.png',27,23,20,true,' ',' '),        
                new Jugador('reid','Naz Reid','Timberwolves','C',113,'jugadores/reid.png',27,23,20,true,' ',' '),        
                new Jugador('alexanderwalker','Nickeil Alexander-Walker','Timberwolves','SG',91,'jugadores/alexanderwalker.png',27,23,20,true,' ',' '),        
                new Jugador('garza','Luka Garza','Timberwolves','C',61,'jugadores/garza.png',27,23,20,true,' ',' '),        
                new Jugador('ingles','Joe Ingles','Timberwolves','SG',73,'jugadores/ingles.png',27,23,20,true,' ',' '),        
                new Jugador('minott','Josh Minott','Timberwolves','SF',50,'jugadores/minott.png',27,23,20,true,' ',' '),        
                new Jugador('dillingham','Rob Dillingham','Timberwolves','PG',80,'jugadores/dillingham.png',27,23,20,true,' ',' '),        
                new Jugador('shannon jr','Terrence Shannon Jr','Timberwolves','SF',50,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('divincenzo','Donte DiVincenzo','Timberwolves','SG',116,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('randle','Julius Randle','Timberwolves','PF',140,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

                //NEW ORLEANS PELICANS
                new Jugador('green6','Willie Green','Pelicans','HC',87,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('murray3','Dejounte Murray','Pelicans','PG',132,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('ingram','Brandon Ingram','Pelicans','SG',131,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('jones2','Herbert Jones','Pelicans','SF',104,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('williamson','Zion Williamson','Pelicans','PF',135,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('missi','Yves Missi','Pelicans','C',60,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('mccollum','CJ McCollum','Pelicans','SG',128,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('murphy','Trey Murphy III','Pelicans','SG',117,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('hawkins','Jordan Hawkins','Pelicans','PG',86,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('ryan','Matt Ryan','Pelicans','SF',72,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('r-earl','Jeremiah Robinson-Earl','Pelicans','SF',55,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('theis','Daniel Theis','Pelicans','C',85,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('alvarado','Jose Alvarado','Pelicans','PG',88,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

                //NEW YORK KNICKS
                new Jugador('thibodeau','Tom Thibodeau','Knicks','HC',87,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('brunson','Jalen Brunson','Knicks','PG',143,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('bridges2','Mikal Bridges','Knicks','SG',125,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('anunoby','OG Anunoby','Knicks','SF',117,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('robinson','Mitchell Robinson','Knicks','C',94,'jugadores/shannon jr.png',27,23,20,true,' ','| 🚑 Vuelta esperada: Diciembre'),
                new Jugador('hart','Josh Hart','Knicks','SG',110,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('achiuwa','Precious Achiuwa','Knicks','PF',96,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('mcbride','Miles McBride','Knicks','PG',87,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('batesdiop','Keita Bates-Diop','Knicks','SF',62,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('payne','Cameron Payne','Knicks','PG',84,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('dadiet','Pacome Diadet','Knicks','SF',50,'jugadores/shannon jr.png',27,23,20,true,' ',' '),        
                new Jugador('towns','Karl-Anthony Towns','Knicks','PF',136,'jugadores/towns.png',27,23,20,true,' ',' '),  

               //OKLAHOMA CITY THUNDER
                new Jugador('daigneault','Mark Daigneault','Thunder','HC',100,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('shai','Shai Gilgeous-Alexander','Thunder','PG',147,'jugadores/shai.png',27,23,20,true,' ',' '),
                new Jugador('caruso','Alex Caruso','Thunder','SG',101,'jugadores/caruso.png',27,23,20,true,' ',' '),
                new Jugador('williams6','Jalen Williams','Thunder','SF',127,'jugadores/williams6.png',27,23,20,true,' ',' '),
                new Jugador('holmgren','Chet Holmgren','Thunder','PF',125,'jugadores/holmgren.png',27,23,20,true,' ',' '),
                new Jugador('hartenstein','Isaiah Hartenstein','Thunder','C',105,'jugadores/hartenstein.png',27,23,20,true,' ',' '),
                new Jugador('dort','Luguentz Dort','Thunder','SF',104,'jugadores/dort.png',27,23,20,true,' ',' '),
                new Jugador('joe','Isaiah Joe','Thunder','SG',92,'jugadores/joe.png',27,23,20,true,' ',' '),
                new Jugador('wiggins2','Aaron Wiggins','Thunder','SG',84,'jugadores/wiggins2.png',27,23,20,true,' ',' '),
                new Jugador('williams7','Kenrich Williams','Thunder','SF',76,'jugadores/williams7.png',27,23,20,true,' ',' '),
                new Jugador('wallace','Cason Wallace','Thunder','PG',84,'jugadores/wallace.png',27,23,20,true,' ',' '),
                new Jugador('topic','Nikola Topic','Thunder','PG',75,'jugadores/topic.png',27,23,20,true,' ','| 🚑 Vuelta esperada: Julio 2025'),
                new Jugador('jones','Dillon Jones','Thunder','SF',50,'jugadores/jones.png',27,23,20,true,' ',' '),

                //ORLANDO MAGIC
                new Jugador('mosley','Jamahl Mosley','Magic','HC',89,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('suggs','Jalen Suggs','Magic','PG',107,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('caldwellpope','Kentavious Caldwell-Pope','Magic','SG',102,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('wagner','Franz Wagner','Magic','SF',128,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('banchero','Paolo Banchero','Magic','PF',135,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('carter3','Wendell Carter Jr','Magic','C',108,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('isaac','Jonathan Isaac','Magic','PF',90,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('anthony','Cole Anthony','Magic','PG',106,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('wagner2','Moritz Wagner','Magic','C',103,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('bitadze','Goga Bitadze','Magic','C',81,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('black','Anthony Black','Magic','PG',69,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('harris2','Gary Harris','Magic','SG',83,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('da silva','Tristan Da Silva','Magic','PF',65,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

                //PHILADELPHIA 76ERS
                new Jugador('nurse','Nick Nurse','76ers','HC',88,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('maxey','Tyrese Maxey','76ers','PG',139,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('oubre','Kelly Oubre Jr','76ers','SG',116,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('george3','Paul George','76ers','SF',134,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('martin','Caleb Martin','76ers','PF',101,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('embiid','Joel Embiid','76ers','C',150,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('lowry','Kyle Lowry','76ers','PG',93,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('jackson','Reggie Jackson','76ers','PG',98,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('mccain','Jared McCain','76ers','SG',65,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('gordon','Eric Gordon','76ers','SG',100,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('drummond','Andre Drummond','76ers','C',103,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('martin jr','KJ Martin','76ers','SF',63,'jugadores/shannon jr.png',27,23,20,true,' ',' '),
                new Jugador('yabusele','Guerchson Yabusele','76ers','PF',83,'jugadores/shannon jr.png',27,23,20,true,' ',' '),

                //PHOENIX SUNS
                new Jugador('budenholzer','Mike Budenholzer','Suns','HC',89,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('jones5','Tyus Jones','Suns','PG',102,'jugadores/jones.png',30,25,18,true,' ',' '),
                new Jugador('beal','Bradley Beal','Suns','SG',124,'jugadores/beal.png',30,25,18,true,' ',' '),
                new Jugador('booker','Devin Booker','Suns','SF',141,'jugadores/booker.png',30,25,18,true,' ',' '),
                new Jugador('durant','Kevin Durant','Suns','PF',142,'jugadores/durant.png',30,25,18,true,' ',' '),
                new Jugador('nurkic','Jusuf Nurkic','Suns','C',118,'jugadores/nurkic.png',30,25,18,true,' ',' '),
                new Jugador('morris','Monté Morris','Suns','PG',74,'jugadores/morris.png',30,25,18,true,' ',' '),
                new Jugador('allen','Grayson Allen','Suns','SG',124,'jugadores/allen.png',30,25,18,true,' ',' '),
                new Jugador('lee','Damion Lee','Suns','SG',82,'jugadores/lee.png',30,25,18,true,' ',' '),
                new Jugador('okogie','Josh Okogie','Suns','SF',71,'jugadores/okogie.png',30,25,18,true,' ',' '),
                new Jugador('oneale','Royce O´Neale','Suns','PF',95,'jugadores/oneale.png',30,25,18,true,' ',' '),
                new Jugador('plumlee','Mason Plumlee','Suns','C',83,'jugadores/plumlee.png',30,25,18,true,' ',' '),
                new Jugador('bolbol','Bol Bol','Suns','C',76,'jugadores/bolbol.png',30,25,18,true,' ',' '),

                //PORTLAND TRAIL BLAZERS
                new Jugador('billups','Chauncey Billups','Blazers','HC',58,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('henderson','Scoot Henderson','Blazers','PG',108,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('simons','Anfernee Simons','Blazers','SG',129,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('avdija','Deni Avdija','Blazers','SF',117,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('grant','Jerami Grant','Blazers','PF',124,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('ayton','Deandre Ayton','Blazers','C',125,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('graham','Devonte Graham','Blazers','PG',72,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('williams8','Robert Williams III','Blazers','C',88,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('thybulle','Matisse Thybulle','Blazers','SF',70,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('sharpe2','Shaedon Sharpe','Blazers','SG',115,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('moore','Taze Moore','Blazers','PF',61,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('murray4','Kris Murray','Blazers','SF',80,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('clingan','Donovan Clingan','Blazers','C',80,'jugadores/bolbol.png',30,25,18,true,' ',' '),

                //SACRAMENTO KINGS
                new Jugador('brown3','Mike Brown','Kings','HC',84,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('fox','De´Aaron Fox','Kings','PG',140,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('carter','Devin Carter','Kings','PG',70,'jugadores/bolbol.png',30,25,18,true,' ','| 🚑 Vuelta esperada: Enero 2025'),
                new Jugador('jones4','Colby Jones','Kings','PG',50,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('ellis','Keon Ellis','Kings','SG',77,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('monk','Malik Monk','Kings','SG',115,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('huerter','Kevin Huerter','Kings','SG',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('murray','Keegan Murray','Kings','SF',118,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('derozan','DeMar DeRozan','Kings','PF',134,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('lyles','Trey Lyles','Kings','PF',92,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('mcdaniels','Jalen McDaniels','Kings','PF',53,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('sabonis','Domantas Sabonis','Kings','C',137,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('alex len','Alex Len','Kings','C',61,'jugadores/bolbol.png',30,25,18,true,' ',' '),

                //SAN ANTONIO SPURS
                new Jugador('popovich','Gregg Popovich','Spurs','HC',61,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('paul','Chris Paul','Spurs','PG',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('vassell','Devin Vassell','Spurs','SG',123,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('barnes','Harrison Barnes','Spurs','SF',104,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('sochan','Jeremy Sochan','Spurs','PF',107,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('wemby','Victor Wembanyama','Spurs','C',135,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('castle','Stephon Castle','Spurs','SG',85,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('johnson3','Keldon Johnson','Spurs','SF',116,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('collins','Zach Collins','Spurs','PF',103,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('jones3','Tre Jones','Spurs','PG',102,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('branham','Malaki Branham','Spurs','SG',88,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('champagnie','Julian Champagnie','Spurs','SF',82,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('wesley','Blake Wesley','Spurs','SG',65,'jugadores/bolbol.png',30,25,18,true,' ',' '),

                //TORONTO RAPTORS
                new Jugador('rajakovic','Darko Rajakovic','Raptors','HC',65,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('quickley','Immanuel Quickley','Raptors','PG',120,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('dick','Gradey Dick','Raptors','SG',84,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('barrett','RJ Barrett','Raptors','SF',127,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('barnes2','Scottie Barnes','Raptors','PF',131,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('poeltl','Jakob Poeltl','Raptors','C',111,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('brown2','Bruce Brown','Raptors','SF',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('olynyk','Kelly Olynyk','Raptors','PF',101,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('boucher','Chris Boucher','Raptors','PF',85,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('mitchell2','Davion Mitchell','Raptors','PG',71,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('agbaji','Ochai Agbaji','Raptors','PG',75,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('temple','Garrett Temple','Raptors','SF',53,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('walter','Ja´Kobe Walter','Raptors','SF',60,'jugadores/bolbol.png',30,25,18,true,' ',' '),

                //UTAH JAZZ
                new Jugador('hardy','Will Hardy','Jazz','HC',70,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('george2','Keyonte George','Jazz','PG',105,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('sexton','Collin Sexton','Jazz','SG',121,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('markkanen','Lauri Markkanen','Jazz','SF',136,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('hendricks','Taylor Hendricks','Jazz','PF',87,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('collins2','John Collins','Jazz','C',118,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('clarkson','Jordan Clarkson','Jazz','PG',118,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('eubanks','Drew Eubanks','Jazz','PF',77,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('mykhailiuk','Svi Mykhailiuk','Jazz','SG',66,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('kessler','Walker Kessler','Jazz','C',98,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('mills','Patty Mills','Jazz','PG',61,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('collier','Isaiah Collier','Jazz','PG',50,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('williams','Cody Williams','Jazz','SF',75,'jugadores/bolbol.png',30,25,18,true,' ',' '),

                //WASHINGTON WIZARDS
                new Jugador('keefe','Brian Keefe','Wizards','HC',54,'jugadores/trae.png',30,25,18,true,' ',' '),
                new Jugador('poole','Jordan Poole','Wizards','PG',116,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('kispert','Corey Kispert','Wizards','SG',105,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('kuzma','Kyle Kuzma','Wizards','SF',130,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('sarr','Alex Sarr','Wizards','PF',90,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('valanciunas','Jonas Valanciunas','Wizards','C',115,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('brogdon','Malcolm Brogdon','Wizards','PG',116,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('holmes','Richaun Holmes','Wizards','SG',77,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('bagley','Marvin Bagley III','Wizards','PF',107,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('coulibaly','Bilal Coulibaly','Wizards','SG',89,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('bey','Saddiq Bey','Wizards','SF',114,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('baldwin','Patrick Baldwin Jr','Wizards','SF',71,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('carringhton','Bub Carringhton','Wizards','SG',70,'jugadores/bolbol.png',30,25,18,true,' ',' '),
                new Jugador('george','Kyshawn George','Wizards','SG',50,'jugadores/bolbol.png',30,25,18,true,' ',' '),




        ];
   
        class Equipo {
            constructor(nombre, escudo) {
                this.nombre = nombre;
                this.escudo = escudo;
            }
   
            // Método para obtener la información del jugador en formato de texto
            obtenerInformacion() {
                return `
                    Nombre: ${this.nombre}
                    Escudo: ${this.escudo}
                `;
            }
        }
   
   
        // Lista de jugadores
        const equipos = [
            new Equipo('76ers','mavericks.png'),
            new Equipo('Blazers','mavericks.png'),
            new Equipo('Bucks','mavericks.png'),
            new Equipo('Bulls','mavericks.png'),
            new Equipo('Cavaliers','mavericks.png'),
            new Equipo('Celtics','mavericks.png'),
            new Equipo('Clippers','mavericks.png'),
            new Equipo('Grizzlies','mavericks.png'),
            new Equipo('Hawks','mavericks.png'),
            new Equipo('Heat','mavericks.png'),
            new Equipo('Hornets','mavericks.png'),
            new Equipo('Jazz','mavericks.png'),
            new Equipo('Kings','mavericks.png'),
            new Equipo('Knicks','mavericks.png'),
            new Equipo('Lakers','mavericks.png'),
            new Equipo('Magic','mavericks.png'),
            new Equipo('Mavericks','mavericks.png'),
            new Equipo('Nets','mavericks.png'),
            new Equipo('Nuggets','mavericks.png'),
            new Equipo('Pacers','mavericks.png'),
            new Equipo('Pelicans','mavericks.png'),
            new Equipo('Pistons','mavericks.png'),
            new Equipo('Raptors','mavericks.png'),
            new Equipo('Rockets','mavericks.png'),
            new Equipo('Spurs','mavericks.png'),
            new Equipo('Suns','mavericks.png'),
            new Equipo('Thunder','mavericks.png'),
            new Equipo('Timberwolves','mavericks.png'),
            new Equipo('Warriors','mavericks.png'),
            new Equipo('Wizards','mavericks.png'),
        ];
       
        // JavaScript para mostrar/ocultar la ventana modal y realizar la búsqueda
        const modal = document.getElementById("playerModal");
        const searchButton = document.getElementById("searchButton");
        const closeButton = document.querySelectorAll(".close-button");
        const searchInput = document.getElementById("searchInput");
        const modalSearchInput = document.getElementById("modalSearchInput");
        const modalSearchButton = document.getElementById("modalSearchButton");
        const resultsDiv = document.getElementById("results");
        const modalPosition = document.getElementById("playerModalPosition");

   
        // Función para mostrar los resultados en el modal
        function mostrarResultados(busqueda) {
    resultsDiv.innerHTML = ''; // Limpiar resultados anteriores
    const resultados = jugadores.filter(jugador => jugador.nombreCompleto.toLowerCase().includes(busqueda.toLowerCase()));

    resultados.sort((a, b) => b.valor - a.valor);
   
    if (resultados.length > 0) {
        resultados.forEach(jugador => {
            const jugadorDiv = document.createElement('div');
            jugadorDiv.innerHTML = `
                <img src="jugadores/${jugador.nombre}.png" alt="${jugador.nombreCompleto}" class="player-image">
                <span class="player-info" style="font-family: 'Saira Condensed', sans-serif; text-transform: uppercase; font-size: 20px">
    <img src="escudos/${jugador.equipo}.png" style="width: 25px; height: auto; margin-right: -10px; vertical-align: -12px;">
   <span style="vertical-align: -6px; display: inline-block;">
        <strong>${jugador.nombreCompleto}</strong> (${jugador.equipo})
    </span>
    <button style="font-family: 'Saira Condensed'; text-transform: uppercase; font-size: 15px; vertical-align: -5px;" class="buy-player-button ${jugador.disponible ? '' : 'disabled'}">
        ${jugador.disponible ? 'Comprar: $' + jugador.valor : 'Cláusula: $' + jugador.clausula}
    </button>
    <br>Posición: ${jugador.posicion} ${jugador.lesionado}
</span>
            `;
            resultsDiv.appendChild(jugadorDiv);

            // Añadir evento click al botón de compra
            let clausuladeljugador = 0;
            const buyButton = jugadorDiv.querySelector('.buy-player-button');
            buyButton.addEventListener('click', () => {
                    // Asignar los valores de la cláusula al hacer clic
                    clausula_nombre = jugador.nombre; // Guardar el nombre del jugador
                clausula_nombre_completo = jugador.nombreCompleto; // Guardar el nombre completo del jugador
                clausula_equipo = jugador.equipo; // Guardar el equipo del jugador
                clausula_valor = jugador.valor ; // Guardar el valor de la cláusula
                clausula_valor_pordos = jugador.valor * 2; // Guardar el valor de la cláusula

                let clausula_dueño = '';

document.querySelector('.buy-player-button').addEventListener('click', function() {
    const clausula_nombre = 'nombre_del_jugador'; // Asigna el valor del jugador que deseas buscar

    fetch('ruta/a/tu/endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nombre: clausula_nombre })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            clausula_dueño = data.dueño; // Asignar el valor de "dueño" a la variable global
            console.log('Cláusula dueño:', clausula_dueño);
        } else {
            console.error('No se encontró el jugador.');
        }
    })
    .catch(error => console.error('Error:', error));
});

                // Mostrar la cláusula en el modal o en el lugar que desees
                document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                document.getElementById("imagenClausula").src = `escudos/borde2 ${jugador.equipo}.png`; // Cambiar imagen de la cláusula
                document.getElementById("nombreCompletoClausula").innerText = `${clausula_nombre_completo} - $${clausula_valor}`; // Mostrar el valor en el párrafo
                document.getElementById("valorClausula").innerText = `Su valor es de $${clausula_valor_pordos}. Dueño: ${jugador.dueño}`; // Mostrar el valor en el párrafo
                modal.style.display = "block"; // Abrir el modal (si tienes un modal para mostrar)
                var dinero = <?php echo $dinero; ?>;
                if (jugador.disponible) {
                    if(jugador.posicion === "PG"){
                        if(dinero >= jugador.valor){
                            if(base == ""){
                            const base_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('base', base_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                    formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores

                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    }else {
                        if(jugador.posicion === "SG"){
                        if(dinero >= jugador.valor){
                            if(escolta == ""){
                            const escolta_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else { if(jugador.posicion === "SF"){
                        if(dinero >= jugador.valor){
                            if(alero == ""){
                            const alero_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alero', alero_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "PF"){
                        if(dinero >= jugador.valor){
                            if(alapivot == ""){
                            const alapivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "C"){
                        if(dinero >= jugador.valor){
                            if(pivot == ""){
                            const pivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "HC"){
                        if(dinero >= jugador.valor){
                            if(manager == ""){
                            const manager_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('manager', manager_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {mostrarAlertaEspacio();}
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        mostrarAlertaEspacio();;
                    }
                    }
                    }

                    }

                    }
                }
                } else {
                    clausuladeljugador = jugador.clausula;
                    document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                    modal.style.display = "none";
                    if (jugador.nombre !== base && jugador.nombre !== escolta && jugador.nombre !== pivot && jugador.nombre !== alapivot && jugador.nombre !== alero && jugador.nombre !== reserva){
                        openClausula();
                    } else {
                        mostrarAlertaPertenece();
                    }
                }
            });
        });
    } else {
        resultsDiv.innerHTML = '<p>No se encontraron jugadores.</p>';
    };

    function openClausula() {
        document.getElementById("clausulaModal").style.display = "flex";
    };

    function closeClausula() {
        document.getElementById("clausulaModal").style.display = "none";
    };

    // Manejador del evento para el botón de cláusula
    document.getElementById('clausula-button').addEventListener('click', function() {
        alert("hola")
    });

    function pay() {
        alert("Pago realizado.");
        closeClausula();
    };

    // Cerrar la cláusula si se hace clic fuera de ella
    window.onclick = function(event) {
        const clausula = document.getElementById("clausulaModal");
        if (event.target == clausula) {
            closeClausula();
        }
    };
}



// Mostrar el modal al hacer clic en el botón de búsqueda
searchButton.addEventListener("click", function() {
    // Obtener el valor del input de búsqueda
    const playerName = searchInput.value;

    // Establecer el valor del campo de entrada del modal con el texto ingresado
    modalSearchInput.value = playerName;

    // Mostrar la ventana modal
    modal.style.display = "flex"; // Mostrar la ventana modal como un contenedor flexible

    // Mostrar resultados en el modal
    mostrarResultados(playerName);

    // Enfocar el campo de entrada del modal
    modalSearchInput.focus();
});


// Realizar una nueva búsqueda desde el modal
modalSearchButton.addEventListener("click", function() {
    // Obtener el valor del input en el modal
    const newPlayerName = modalSearchInput.value;

    // Mostrar resultados en el modal
    mostrarResultados(newPlayerName);
});

// Permitir que el botón de búsqueda se ejecute con la tecla Enter en la página principal
searchInput.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault(); // Evitar que se envíe el formulario si es un formulario
        searchButton.click(); // Simular clic en el botón de búsqueda
    }
});

// Permitir que el botón de búsqueda se ejecute con la tecla Enter en el modal
modalSearchInput.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault(); // Evitar que se envíe el formulario si es un formulario
        modalSearchButton.click(); // Simular clic en el botón de búsqueda
    }
});

// Seleccionar el botón de cerrar en el modal
const closeModalButton = document.getElementById("closeModalButton");

// Función para cerrar el modal
function cerrarModal() {
    modal.style.display = "none";
}

// Ordenar por Equipo
document.getElementById('ordenarEquipo').addEventListener('click', () => {
    jugadores.sort((a, b) => a.equipo.localeCompare(b.equipo));
    mostrarResultados(modalSearchInput.value);
});

// Ordenar por Posición
document.getElementById('ordenarPosicion').addEventListener('click', () => {
    jugadores.sort((a, b) => a.posicion.localeCompare(b.posicion));
    mostrarResultados(modalSearchInput.value);
});

// Ordenar por Valor
document.getElementById('ordenarValor').addEventListener('click', () => {
    jugadores.sort((a, b) => b.valor - a.valor); // Orden descendente por valor
    mostrarResultados(modalSearchInput.value);
});

// Actualizar la funcionalidad del botón para filtrar por posición
document.getElementById('ordenarPosicion').addEventListener('click', () => {
    const posicionSeleccionada = prompt("Ingrese la posición que desea buscar (SF, PF, C, PG, SG):");

    if (posicionSeleccionada) {
        // Filtrar jugadores por la posición seleccionada
        const jugadoresFiltrados = jugadores.filter(jugador => jugador.posicion.toLowerCase() === posicionSeleccionada.toLowerCase());

        // Mostrar los resultados filtrados
        mostrarResultadosPorPosicion(jugadoresFiltrados);
    }
});

// Función para mostrar resultados filtrados por posición
// Asegúrate de declarar base_actualizado fuera de la función si debe ser global
let base_actualizado = ''; // Variable global

let clausula_nombre = "";
let clausula_nombre_completo = "";
let clausula_equipo = "";
let clausula_valor = 0;
function mostrarResultados(busqueda) {
    resultsDiv.innerHTML = ''; // Limpiar resultados anteriores
    const resultados = jugadores
        .filter(jugador => jugador.nombreCompleto.toLowerCase().includes(busqueda.toLowerCase()))
        .sort((a, b) => b.valor - a.valor)
        .slice(0, 100);

    if (resultados.length > 0) {
        resultados.forEach(jugador => {
            const jugadorDiv = document.createElement('div');
            jugadorDiv.innerHTML = `
                <img src="jugadores/${jugador.nombre}.png" alt="${jugador.nombreCompleto}" class="player-image">
                <span class="player-info" style="font-family: 'Saira Condensed', sans-serif; text-transform: uppercase; font-size: 20px">
    <img src="escudos/${jugador.equipo}.png" style="width: 25px; height: auto; margin-right: -10px; vertical-align: -12px;">
   <span style="vertical-align: -6px; display: inline-block;">
        <strong>${jugador.nombreCompleto}</strong> (${jugador.equipo})
    </span>
    <button style="font-family: 'Saira Condensed'; text-transform: uppercase; font-size: 15px; vertical-align: -5px;" class="buy-player-button ${jugador.disponible ? '' : 'disabled'}">
        ${jugador.disponible ? 'Comprar: $' + jugador.valor : 'Cláusula: $' + jugador.clausula}
    </button>
    <br>Posición: ${jugador.posicion} ${jugador.lesionado}
</span>
            `;
            resultsDiv.appendChild(jugadorDiv);

            // Añadir evento click al botón de compra
            let clausuladeljugador = 0;
            const buyButton = jugadorDiv.querySelector('.buy-player-button');
            buyButton.addEventListener('click', () => {
                    // Asignar los valores de la cláusula al hacer clic
                    clausula_nombre = jugador.nombre; // Guardar el nombre del jugador
                clausula_nombre_completo = jugador.nombreCompleto; // Guardar el nombre completo del jugador
                clausula_equipo = jugador.equipo; // Guardar el equipo del jugador
                clausula_valor = jugador.valor ; // Guardar el valor de la cláusula
                clausula_valor_pordos = jugador.valor * 2; // Guardar el valor de la cláusula

                let clausula_dueño = '';

document.querySelector('.buy-player-button').addEventListener('click', function() {
    const clausula_nombre = 'nombre_del_jugador'; // Asigna el valor del jugador que deseas buscar

    fetch('ruta/a/tu/endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nombre: clausula_nombre })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            clausula_dueño = data.dueño; // Asignar el valor de "dueño" a la variable global
            console.log('Cláusula dueño:', clausula_dueño);
        } else {
            console.error('No se encontró el jugador.');
        }
    })
    .catch(error => console.error('Error:', error));
});

                // Mostrar la cláusula en el modal o en el lugar que desees
                document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                document.getElementById("imagenClausula").src = `escudos/borde2 ${jugador.equipo}.png`; // Cambiar imagen de la cláusula
                document.getElementById("nombreCompletoClausula").innerText = `${clausula_nombre_completo} - $${clausula_valor}`; // Mostrar el valor en el párrafo
                document.getElementById("valorClausula").innerText = `Su valor es de $${clausula_valor_pordos}. Dueño: ${jugador.dueño}`; // Mostrar el valor en el párrafo
                modal.style.display = "block"; // Abrir el modal (si tienes un modal para mostrar)
                var dinero = <?php echo $dinero; ?>;
                if (jugador.disponible) {
                    if(jugador.posicion === "PG"){
                        if(dinero >= jugador.valor){
                            if(base == ""){
                            const base_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('base', base_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                    formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores

                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    }else {
                        if(jugador.posicion === "SG"){
                        if(dinero >= jugador.valor){
                            if(escolta == ""){
                            const escolta_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else { if(jugador.posicion === "SF"){
                        if(dinero >= jugador.valor){
                            if(alero == ""){
                            const alero_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alero', alero_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "PF"){
                        if(dinero >= jugador.valor){
                            if(alapivot == ""){
                            const alapivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "C"){
                        if(dinero >= jugador.valor){
                            if(pivot == ""){
                            const pivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "HC"){
                        if(dinero >= jugador.valor){
                            if(manager == ""){
                            const manager_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('manager', manager_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {mostrarAlertaEspacio();}
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        mostrarAlertaEspacio();;
                    }
                    }
                    }

                    }

                    }
                }
                } else {
                    clausuladeljugador = jugador.clausula;
                    document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                    modal.style.display = "none";
                    if (jugador.nombre !== base && jugador.nombre !== escolta && jugador.nombre !== pivot && jugador.nombre !== alapivot && jugador.nombre !== alero && jugador.nombre !== reserva){
                        openClausula();
                    } else {
                        mostrarAlertaPertenece();
                    }
                }
            });
        });
    } else {
        resultsDiv.innerHTML = '<p>No se encontraron jugadores.</p>';
    };

    function openClausula() {
        document.getElementById("clausulaModal").style.display = "flex";
    };

    function closeClausula() {
        document.getElementById("clausulaModal").style.display = "none";
    };

    
    function pay() {
        alert("Pago realizado.");
        closeClausula();
    };

    // Cerrar la cláusula si se hace clic fuera de ella
    window.onclick = function(event) {
        const clausula = document.getElementById("clausulaModal");
        if (event.target == clausula) {
            closeClausula();
        }
    };

    document.getElementById('cancelarClausula').addEventListener('click', function() {
        closeClausula();
    });

    document.getElementById('pagarClausula').addEventListener('click', function() {
                if(<?php echo $dinero; ?> >= clausula_valor_pordos){
                            if(reserva == ""){
                            const reserva_actualizado = clausula_nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - clausula_valor_pordos; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {mostrarAlertaEspacio();}
                        }else {
                            mostrarAlertaPlata();}
                            modal.style.display = "none";
                    closeClausula();
                });

    

    
    const dinero_de_compra = <?php echo $dinero; ?> - clausula_valor_pordos; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
    formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE

}




// Añadir evento de clic al botón de cerrar|
closeModalButton.addEventListener("click", cerrarModal);
   
        // Cerrar el modal si el usuario hace clic fuera del contenido del modal
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

// Seleccionar el menú desplegable y el botón de buscar por posición
const positionSelect = document.getElementById('positionSelect');
const buscarPorPosicionButton = document.getElementById('buscarPorPosicion');

// Función para mostrar los jugadores por posición
function mostrarJugadoresPorPosicion(posicion) {
    resultsDiv.innerHTML = ''; // Limpiar resultados anteriores
    const resultados = jugadores.filter(jugador => jugador.posicion === posicion);

    resultados.sort((a, b) => b.valor - a.valor);
   
    if (resultados.length > 0) {
        resultados.forEach(jugador => {
            const jugadorDiv = document.createElement('div');
            jugadorDiv.innerHTML = `
                <img src="jugadores/${jugador.nombre}.png" alt="${jugador.nombreCompleto}" class="player-image">
                <span class="player-info" style="font-family: 'Saira Condensed', sans-serif; text-transform: uppercase; font-size: 20px">
    <img src="escudos/${jugador.equipo}.png" style="width: 25px; height: auto; margin-right: -10px; vertical-align: -12px;">
   <span style="vertical-align: -6px; display: inline-block;">
        <strong>${jugador.nombreCompleto}</strong> (${jugador.equipo})
    </span>
    <button style="font-family: 'Saira Condensed'; text-transform: uppercase; font-size: 15px; vertical-align: -5px;" class="buy-player-button ${jugador.disponible ? '' : 'disabled'}">
        ${jugador.disponible ? 'Comprar: $' + jugador.valor : 'Cláusula: $' + jugador.clausula}
    </button>
    <br>Posición: ${jugador.posicion} ${jugador.lesionado}
</span>
            `;
            resultsDiv.appendChild(jugadorDiv);

            // Añadir evento click al botón de compra
            let clausuladeljugador = 0;
            const buyButton = jugadorDiv.querySelector('.buy-player-button');
            buyButton.addEventListener('click', () => {
                    // Asignar los valores de la cláusula al hacer clic
                    clausula_nombre = jugador.nombre; // Guardar el nombre del jugador
                clausula_nombre_completo = jugador.nombreCompleto; // Guardar el nombre completo del jugador
                clausula_equipo = jugador.equipo; // Guardar el equipo del jugador
                clausula_valor = jugador.valor ; // Guardar el valor de la cláusula
                clausula_valor_pordos = jugador.valor * 2; // Guardar el valor de la cláusula

                let clausula_dueño = '';

document.querySelector('.buy-player-button').addEventListener('click', function() {
    const clausula_nombre = 'nombre_del_jugador'; // Asigna el valor del jugador que deseas buscar

    fetch('ruta/a/tu/endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nombre: clausula_nombre })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            clausula_dueño = data.dueño; // Asignar el valor de "dueño" a la variable global
            console.log('Cláusula dueño:', clausula_dueño);
        } else {
            console.error('No se encontró el jugador.');
        }
    })
    .catch(error => console.error('Error:', error));
});

                // Mostrar la cláusula en el modal o en el lugar que desees
                document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                document.getElementById("imagenClausula").src = `escudos/borde2 ${jugador.equipo}.png`; // Cambiar imagen de la cláusula
                document.getElementById("nombreCompletoClausula").innerText = `${clausula_nombre_completo} - $${clausula_valor}`; // Mostrar el valor en el párrafo
                document.getElementById("valorClausula").innerText = `Su valor es de $${clausula_valor_pordos}. Dueño: ${jugador.dueño}`; // Mostrar el valor en el párrafo
                modal.style.display = "block"; // Abrir el modal (si tienes un modal para mostrar)
                var dinero = <?php echo $dinero; ?>;
                if (jugador.disponible) {
                    if(jugador.posicion === "PG"){
                        if(dinero >= jugador.valor){
                            if(base == ""){
                            const base_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('base', base_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                    formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores

                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    }else {
                        if(jugador.posicion === "SG"){
                        if(dinero >= jugador.valor){
                            if(escolta == ""){
                            const escolta_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else { if(jugador.posicion === "SF"){
                        if(dinero >= jugador.valor){
                            if(alero == ""){
                            const alero_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alero', alero_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "PF"){
                        if(dinero >= jugador.valor){
                            if(alapivot == ""){
                            const alapivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "C"){
                        if(dinero >= jugador.valor){
                            if(pivot == ""){
                            const pivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "HC"){
                        if(dinero >= jugador.valor){
                            if(manager == ""){
                            const manager_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('manager', manager_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {mostrarAlertaEspacio();}
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        mostrarAlertaEspacio();;
                    }
                    }
                    }

                    }

                    }
                }
                } else {
                    clausuladeljugador = jugador.clausula;
                    document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                    modal.style.display = "none";
                    if (jugador.nombre !== base && jugador.nombre !== escolta && jugador.nombre !== pivot && jugador.nombre !== alapivot && jugador.nombre !== alero && jugador.nombre !== reserva){
                        openClausula();
                    } else {
                        mostrarAlertaPertenece();
                    }
                }
            });
        });
    } else {
        resultsDiv.innerHTML = '<p>No se encontraron jugadores.</p>';
    };

    function openClausula() {
        document.getElementById("clausulaModal").style.display = "flex";
    }

    function closeClausula() {
        document.getElementById("clausulaModal").style.display = "none";
    }

    function pay() {
        alert("Pago realizado.");
        closeClausula();
    }

    document.getElementById('baseButton').addEventListener('click', function() {
        closeClausula();
    })

    // Cerrar la cláusula si se hace clic fuera de ella
    window.onclick = function(event) {
        const clausula = document.getElementById("clausulaModal");
        if (event.target == clausula) {
            closeClausula();
        }
    }
}

// Realizar búsqueda por posición
buscarPorPosicionButton.addEventListener('click', () => {
    const posicionSeleccionada = positionSelect.value;
    if (posicionSeleccionada) {
        mostrarJugadoresPorPosicion(posicionSeleccionada);
    } else {
        resultsDiv.innerHTML = '<p>Por favor, selecciona una posición.</p>';
    }
});

// Seleccionar el menú desplegable para equipos y el botón de buscar por equipo
const teamSelect = document.getElementById('teamSelect');
const buscarPorEquipoButton = document.getElementById('buscarPorEquipo');

// Función para mostrar los jugadores por equipo
function mostrarJugadoresPorEquipo(equipo) {
    resultsDiv.innerHTML = ''; // Limpiar resultados anteriores
    const resultados = jugadores.filter(jugador => jugador.equipo === equipo);

    resultados.sort((a, b) => b.valor - a.valor);
   
    if (resultados.length > 0) {
        resultados.forEach(jugador => {
            const jugadorDiv = document.createElement('div');
            jugadorDiv.innerHTML = `
                <img src="jugadores/${jugador.nombre}.png" alt="${jugador.nombreCompleto}" class="player-image">
                <span class="player-info" style="font-family: 'Saira Condensed', sans-serif; text-transform: uppercase; font-size: 20px">
    <img src="escudos/${jugador.equipo}.png" style="width: 25px; height: auto; margin-right: -10px; vertical-align: -12px;">
   <span style="vertical-align: -6px; display: inline-block;">
        <strong>${jugador.nombreCompleto}</strong> (${jugador.equipo})
    </span>
    <button style="font-family: 'Saira Condensed'; text-transform: uppercase; font-size: 15px; vertical-align: -5px;" class="buy-player-button ${jugador.disponible ? '' : 'disabled'}">
        ${jugador.disponible ? 'Comprar: $' + jugador.valor : 'Cláusula: $' + jugador.clausula}
    </button>
    <br>Posición: ${jugador.posicion} ${jugador.lesionado}
</span>
            `;
            resultsDiv.appendChild(jugadorDiv);

            // Añadir evento click al botón de compra
            let clausuladeljugador = 0;
            const buyButton = jugadorDiv.querySelector('.buy-player-button');
            buyButton.addEventListener('click', () => {
                    // Asignar los valores de la cláusula al hacer clic
                    clausula_nombre = jugador.nombre; // Guardar el nombre del jugador
                clausula_nombre_completo = jugador.nombreCompleto; // Guardar el nombre completo del jugador
                clausula_equipo = jugador.equipo; // Guardar el equipo del jugador
                clausula_valor = jugador.valor ; // Guardar el valor de la cláusula
                clausula_valor_pordos = jugador.valor * 2; // Guardar el valor de la cláusula

                let clausula_dueño = '';

document.querySelector('.buy-player-button').addEventListener('click', function() {
    const clausula_nombre = 'nombre_del_jugador'; // Asigna el valor del jugador que deseas buscar

    fetch('ruta/a/tu/endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nombre: clausula_nombre })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            clausula_dueño = data.dueño; // Asignar el valor de "dueño" a la variable global
            console.log('Cláusula dueño:', clausula_dueño);
        } else {
            console.error('No se encontró el jugador.');
        }
    })
    .catch(error => console.error('Error:', error));
});

                // Mostrar la cláusula en el modal o en el lugar que desees
                document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                document.getElementById("imagenClausula").src = `escudos/borde2 ${jugador.equipo}.png`; // Cambiar imagen de la cláusula
                document.getElementById("nombreCompletoClausula").innerText = `${clausula_nombre_completo} - $${clausula_valor}`; // Mostrar el valor en el párrafo
                document.getElementById("valorClausula").innerText = `Su valor es de $${clausula_valor_pordos}. Dueño: ${jugador.dueño}`; // Mostrar el valor en el párrafo
                modal.style.display = "block"; // Abrir el modal (si tienes un modal para mostrar)
                var dinero = <?php echo $dinero; ?>;
                if (jugador.disponible) {
                    if(jugador.posicion === "PG"){
                        if(dinero >= jugador.valor){
                            if(base == ""){
                            const base_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('base', base_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                    formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores

                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    }else {
                        if(jugador.posicion === "SG"){
                        if(dinero >= jugador.valor){
                            if(escolta == ""){
                            const escolta_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else { if(jugador.posicion === "SF"){
                        if(dinero >= jugador.valor){
                            if(alero == ""){
                            const alero_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alero', alero_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "PF"){
                        if(dinero >= jugador.valor){
                            if(alapivot == ""){
                            const alapivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "C"){
                        if(dinero >= jugador.valor){
                            if(pivot == ""){
                            const pivot_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {
                                if(reserva == ""){
                                const reserva_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                    const formData = new FormData();
                                    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.text()) // Convertir la respuesta a texto
                                    .then(data => {
                                        console.log(data); // Mostrar la respuesta en la consola
                                        location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                    })
                                    .catch(error => console.error('Error:', error)); // Manejo de errores
                                }else{
                                    mostrarAlertaEspacio();}
                                }
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        if(jugador.posicion === "HC"){
                        if(dinero >= jugador.valor){
                            if(manager == ""){
                            const manager_actualizado = jugador.nombre;
                                const dinero_de_compra = <?php echo $dinero; ?> - jugador.valor; // Asegúrate de que jugador.valor esté definido correctamenteJEJEJEJEJEJEJEJ
                                const formData = new FormData();
                                formData.append('manager', manager_actualizado); // Agregar el valor al FormData
                                formData.append('dinero', dinero_de_compra); // Agregar el valor calculado para la columna dineroJEJEJEJEJEJJEJE
                                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.text()) // Convertir la respuesta a texto
                                .then(data => {
                                    console.log(data); // Mostrar la respuesta en la consola
                                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                                })
                                .catch(error => console.error('Error:', error)); // Manejo de errores
                            } else {mostrarAlertaEspacio();}
                        }else {
                            mostrarAlertaPlata();
                            modal.style.display = "none";
                }
                    } else {
                        mostrarAlertaEspacio();;
                    }
                    }
                    }

                    }

                    }
                }
                } else {
                    clausuladeljugador = jugador.clausula;
                    document.getElementById("clausulaPlayerImage").src = `jugadores/${jugador.nombre}.png`; // Cambiar imagen de la cláusula
                    modal.style.display = "none";
                    if (jugador.nombre !== base && jugador.nombre !== escolta && jugador.nombre !== pivot && jugador.nombre !== alapivot && jugador.nombre !== alero && jugador.nombre !== reserva){
                        openClausula();
                    } else {
                        mostrarAlertaPertenece();
                    }
                }
            });
        });
    } else {
        resultsDiv.innerHTML = '<p>No se encontraron jugadores.</p>';
    };

    function openClausula() {
        document.getElementById("clausulaModal").style.display = "flex";
    }

    function closeClausula() {
        document.getElementById("clausulaModal").style.display = "none";
    }

    function pay() {
        alert("Pago realizado.");
        closeClausula();
    }

    // Cerrar la cláusula si se hace clic fuera de ella
    window.onclick = function(event) {
        const clausula = document.getElementById("clausulaModal");
        if (event.target == clausula) {
            closeClausula();
        }
    }
}

// Realizar búsqueda por equipo
buscarPorEquipoButton.addEventListener('click', () => {
    const equipoSeleccionado = teamSelect.value;

    if (equipoSeleccionado) {
        mostrarJugadoresPorEquipo(equipoSeleccionado);
    } else {
        mostrarResultados(''); // Mostrar todos los jugadores si no se ha seleccionado ningún equipo
    }
});

// Suponiendo que 'jugadores' es una lista de objetos Jugador
function obtenerEquiposUnicos(jugadores) {
    const equipos = new Set();
    jugadores.forEach(jugador => equipos.add(jugador.equipo));
    return Array.from(equipos);
}

// Suponiendo que 'jugadores' es una lista de objetos Jugador
const equipoSelect = document.getElementById('teamSelect');



function llenarMenuEquipos(equipos) {
    const equipoSelect = document.getElementById('teamSelect');
    equipos.forEach(equipo => {
        const option = document.createElement('option');
        option.value = equipo.nombre;
        option.textContent = equipo.nombre;
        equipoSelect.appendChild(option);
    });
}

// Suponiendo que 'equipos' es una lista de objetos de la clase Equipo
function llenarMenuEquipos(equipos) {
    const teamSelect = document.getElementById('teamSelect');
   
    // Limpiar las opciones actuales antes de agregar nuevas
    teamSelect.innerHTML = '<option value="">Selecciona un equipo</option>';
   
    equipos.forEach(equipo => {
        const option = document.createElement('option');
        option.value = equipo.nombre;  // El valor será el nombre del equipo
        option.textContent = equipo.nombre;  // Texto visible en el menú desplegable
        teamSelect.appendChild(option);
    });
}

// Ejecuta esta función después de que los equipos hayan sido definidos
llenarMenuEquipos(equipos);


document.addEventListener('DOMContentLoaded', (event) => {
    const dragImage = document.getElementById('dragImage');
    const roundedSquare8 = document.querySelector('.rounded-square8');
    const roundedSquare12 = document.querySelector('.rounded-square12');
    const roundedSquare14 = document.querySelector('.rounded-square14');
    const roundedSquare16 = document.querySelector('.rounded-square16');

    let s1 = "false"; // Asigna el valor adecuado para s1
    let s2 = "false"; // Asigna el valor adecuado para s2

    let isDragging = false;
    let initialX, initialY, offsetX, offsetY;

    dragImage.addEventListener('mousedown', (e) => {
        isDragging = true;
        initialX = e.clientX - dragImage.getBoundingClientRect().left;
        initialY = e.clientY - dragImage.getBoundingClientRect().top;
        document.addEventListener('mousemove', onMouseMove);
    });

    document.addEventListener('mouseup', (e) => {
        if (isDragging) {
            isDragging = false;
            document.removeEventListener('mousemove', onMouseMove);
            alignImage();
        }
    });

    function onMouseMove(e) {
        if (isDragging) {
            const x = e.clientX - initialX;
            const y = e.clientY - initialY;
            dragImage.style.position = 'absolute';
            dragImage.style.left = `${x}px`;
            dragImage.style.top = `${y}px`;
        }
    }

    function alignImage() {
        const imageRect = dragImage.getBoundingClientRect();
        const square8Rect = roundedSquare8.getBoundingClientRect();
        const square12Rect = roundedSquare12.getBoundingClientRect();
        const square14Rect = roundedSquare14.getBoundingClientRect();
        const square16Rect = roundedSquare16.getBoundingClientRect();

        // Check if the image is touching rounded-square8
        if (isTouching(imageRect, square8Rect)) {
            dragImage.style.left = `${square8Rect.left}px`;
            dragImage.style.top = `${square8Rect.top}px`;
        } else if (s1 === "false") {
            dragImage.style.left = `${square12Rect.left}px`;
            dragImage.style.top = `${square12Rect.top}px`;
        } else if (s2 === "false") {
            dragImage.style.left = `${square14Rect.left}px`;
            dragImage.style.top = `${square14Rect.top}px`;
        } else {
            dragImage.style.left = `${square16Rect.left}px`;
            dragImage.style.top = `${square16Rect.top}px`;
        }
    }

    function isTouching(rect1, rect2) {
        return !(rect1.right < rect2.left ||
                 rect1.left > rect2.right ||
                 rect1.bottom < rect2.top ||
                 rect1.top > rect2.bottom);
    }
});

// Obtener referencias a los elementos
const openPacksButton = document.getElementById('openPacksButton');
const packsModal = document.getElementById('packsModal');
const closePacksButton = document.getElementById('closePacksButton');

// Abrir el modal al hacer clic en el botón
openPacksButton.addEventListener('click', function() {
    packsModal.style.display = 'block';
});

// Cerrar el modal al hacer clic en el botón "Cerrar"
closePacksButton.addEventListener('click', function() {
    packsModal.style.display = 'none';
});

// Cerrar el modal al hacer clic fuera de la modal-content
window.addEventListener('click', function(event) {
    if (event.target === packsModal) {
        packsModal.style.display = 'none';
    }
});


    // Botón para abrir el modal con el video (pack-button5)
    document.querySelector('.pack-button5').addEventListener('click', function() {
        // Ocultar modal-content2 y mostrar modal-content4
        document.getElementById('modal-content2').style.display = 'none';
        var modal4 = document.getElementById('modal-content4');
        modal4.style.display = 'block';

        var video = document.getElementById('draftVideo');

        // Reproducir el video
        video.play();

        // Ocultar el modal-content4 y mostrar modal-content2 al terminar el video
        video.addEventListener('ended', function() {
            modal4.style.display = 'none'; // Ocultar modal 4
            document.getElementById('modal-content2').style.display = 'block'; // Mostrar modal 2 nuevamente
        });
    });

    // Evitar que el modal-content4 se cierre al hacer clic fuera de él
    window.onclick = function(event) {
        var modal4 = document.getElementById('modal-content4');
        if (event.target == modal4) {
            modal4.style.display = 'block'; // Evitar que se cierre
        }
    }

// Función para ajustar el color de fondo basado en el valor
function updateBackgroundColor() {
            const elements = document.querySelectorAll('.puntos_sumados');
            elements.forEach(el => {
                const value = parseInt(el.textContent, 10);
                if (value > 120) {
                    el.style.backgroundColor = '#02356E'; // Color si el valor es alto
                } else if (value > 100){
                    el.style.backgroundColor = '#022E5E'; // Color si el valor es bajo
                } else if (value > 80){
                    el.style.backgroundColor = '#02264F'; // Color si el valor es bajo
                } else if (value > 70){
                    el.style.backgroundColor = '#012043'; // Color si el valor es bajo
                } else if (value > 50){
                    el.style.backgroundColor = '#001933'; // Color si el valor es bajo
                } else if (value > 0){
                    el.style.backgroundColor = '#011225'; // Color si el valor es bajo
                } else{
                    el.style.backgroundColor = '#000C19'; // Color si el valor es bajo
                }
            });
        }

        // Llama a la función al cargar la página
        updateBackgroundColor();

// Aquí pasamos el valor de la variable PHP a JavaScript
var base = "<?php echo $base; ?>";
var escolta = "<?php echo $escolta; ?>";
var alero = "<?php echo $alero; ?>";
var alapivot = "<?php echo $alapivot; ?>";
var pivot = "<?php echo $pivot; ?>";
var manager = "<?php echo $manager; ?>";
var reserva = "<?php echo $reserva; ?>";

// Si base no está vacío, ocultamos el div
if (base !== "") {
    document.getElementById('rounded-square8').style.display = 'none';
}
if (escolta !== "") {
    document.getElementById('rounded-square10').style.display = 'none';
}
if (alero !== "") {
    document.getElementById('rounded-square6').style.display = 'none';
}
if (alapivot !== "") {
    document.getElementById('rounded-square2').style.display = 'none';
}
if (pivot !== "") {
    document.getElementById('rounded-square4').style.display = 'none';
}
if (manager !== "") {
    document.getElementById('rounded-square').style.display = 'none';
}
if (reserva !== "") {
    document.getElementById('rounded-square12').style.display = 'none';
}


// Supongamos que ya tienes la lista de usuarios cargada
const usuarios = <?php echo $usuarios_json; ?>;

// Recorremos la lista de jugadores
jugadores.forEach(jugador => {
    let disponible = true; // Inicializamos como true por defecto

    // Recorremos la lista de usuarios
    usuarios.forEach(usuario => {
        // Comprobamos si el nombre del jugador coincide con alguna de las propiedades del usuario
        if (jugador.nombre.trim() === usuario.base.trim() ||
            jugador.nombre.trim() === usuario.escolta.trim() ||
            jugador.nombre.trim() === usuario.alero.trim() ||
            jugador.nombre.trim() === usuario.alapivot.trim() ||
            jugador.nombre.trim() === usuario.pivot.trim() ||
            jugador.nombre.trim() === usuario.reserva.trim() ||
            jugador.nombre.trim() === usuario.manager.trim()) {
            disponible = false; // Si hay coincidencia, lo marcamos como no disponible
        }
    });

    // Asignamos el valor de disponibilidad al jugador
    jugador.disponible = disponible;
});

// Variable para almacenar el valor del equipo de "doncic"
let valor_del_equipo = 56546454560;

// Buscar el jugador "doncic" en la lista
jugadores.forEach(jugador => {
    if (jugador.nombre === 'doncic') {
        valor_del_equipo = jugador.valor; // Asigna el valor del jugador a la variable
    }
});

// Suponiendo que baseButton es el ID de tu botón
baseButton.addEventListener("click", function() {
   
});

baseButton.addEventListener("click", function() {
    let base_actualizado = 'doncic'; // Asignar el valor deseado

    // Hacer la llamada a PHP para actualizar la base de datos
    fetch('usuarios.php', { // Reemplaza 'tu_script_php.php' con el nombre real de tu archivo PHP
        method: 'POST', // Método de la solicitud
        headers: {
            'Content-Type': 'application/json' // Tipo de contenido que se enviará
        },
        body: JSON.stringify({ base: base_actualizado }) // Enviar el dato como JSON
    })
    .then(response => response.json()) // Procesar la respuesta
    .then(data => {
        console.log(data); // Manejar la respuesta del servidor
    })
    .catch(error => {
        console.error('Error:', error); // Manejar cualquier error
    });
});


// Lista para almacenar los jugadores que cumplen con las condiciones
const bases_principio = [];
const escoltas_principio = [];
const aleros_principio = [];
const alapivots_principio = [];
const pivots_principio = [];
const managers_principio = [];

// Recorremos la lista de jugadores
jugadores.forEach(jugador => {
    // Verificamos las condiciones para 'PG'
    if (jugador.disponible && jugador.valor < 100 && jugador.posicion === 'PG') {
        // Si cumple, lo agregamos a la lista de bases
        bases_principio.push(jugador);
    }
    // Verificamos las condiciones para 'C'
    else if (jugador.disponible && jugador.valor < 100 && jugador.posicion === 'SG') {
        // Si cumple, lo agregamos a la lista de pivots
        escoltas_principio.push(jugador);
    }
    // Verificamos las condiciones para 'C'
    else if (jugador.disponible && jugador.valor < 100 && jugador.posicion === 'SF') {
        // Si cumple, lo agregamos a la lista de pivots
        aleros_principio.push(jugador);
    }
    // Verificamos las condiciones para 'C'
    else if (jugador.disponible && jugador.valor < 100 && jugador.posicion === 'PF') {
        // Si cumple, lo agregamos a la lista de pivots
        alapivots_principio.push(jugador);
    }
    // Verificamos las condiciones para 'C'
    else if (jugador.disponible && jugador.valor < 100 && jugador.posicion === 'C') {
        // Si cumple, lo agregamos a la lista de pivots
        pivots_principio.push(jugador);
    }
    // Verificamos las condiciones para 'C'
    else if (jugador.disponible && jugador.valor < 85 && jugador.posicion === 'HC') {
        // Si cumple, lo agregamos a la lista de pivots
        managers_principio.push(jugador);
    }
});

// Para ver el resultado
console.log(bases_principio);
console.log(escoltas_principio);
console.log(aleros_principio);
console.log(alapivots_principio);
console.log(pivots_principio);
console.log(managers_principio);

const olimpicos = ["lebron", "curry", "durant", "embiid", "white", "tatum", "holiday", "davis", "haliburton", "edwards", "booker",
"murray2", "shai", "lyles", "barrett", "olynyk", "alexanderwalker", "nembhard", "brooks", "dort", "powell",
"daniels", "giddey", "green2", "ingles", "landale",
"aldama",
"giannis",
"schroder", "wagner", "wagner2", "theis",
"hachimura",
"batum", "yabusele", "gobert", "wemby", "coulibaly",
"santos",
"thor",
"alvarado",
"jovic", "bogdanovic", "micic", "jokic"
];

var reserva = "<?php echo isset($reserva) ? $reserva : ''; ?>";

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('jjooButton').addEventListener('click', function() {
        // Verificar si la reserva está vacía
        if (reserva === "") {
            // Filtrar la lista de jugadores para obtener solo los disponibles y que estén en la lista olimpicos
            const disponiblesOlimpicos = jugadores.filter(jugador =>
                jugador.disponible && olimpicos.includes(jugador.nombre)
            );

            // Verificar si hay jugadores disponibles
            if (disponiblesOlimpicos.length > 0) {
                // Seleccionar un elemento aleatorio de la lista filtrada
                const randomIndex7 = Math.floor(Math.random() * disponiblesOlimpicos.length);
                const olimpicos_actualizado = disponiblesOlimpicos[randomIndex7].nombre; // Obtener el nombre del jugador

                // Crear un objeto FormData para enviar los datos al servidor
                const formData = new FormData();
                formData.append('reserva', olimpicos_actualizado); // Agregar el valor al FormData

                // Enviar la solicitud al servidor
                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // Convertir la respuesta a texto
                .then(data => {
                    console.log(data); // Mostrar la respuesta en la consola
                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                })
                .catch(error => console.error('Error:', error)); // Manejo de errores
            } else {
                alert("No hay jugadores disponibles en la lista olímpica.");
            }
        } else {
            mostrarAlertaEspacio2();
        }
    });
});

const draft = ["risacher", "sarr", "sheppard", "castle", "holland", "salaun", "clingan", "dillingham", "edey", "williams", "buzelis", "topic", "carter", "carrington", "ware", "mccain", "knetch",
"da silva", "walter", "tyson", "missi", "holmes", "johnson4", "george", "dadiet", "jones", "shannon jr", "dunn", "collier"
];

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('draftButton').addEventListener('click', function() {
        // Verificar si la reserva está vacía
        if (reserva === "") {
            // Filtrar la lista de jugadores para obtener solo los disponibles y que estén en la lista olimpicos
            const disponiblesDraft = jugadores.filter(jugador =>
                jugador.disponible && draft.includes(jugador.nombre)
            );

            // Verificar si hay jugadores disponibles
            if (disponiblesDraft.length > 0) {
                // Seleccionar un elemento aleatorio de la lista filtrada
                const randomIndex8 = Math.floor(Math.random() * disponiblesDraft.length);
                const draft_actualizado = disponiblesDraft[randomIndex8].nombre; // Obtener el nombre del jugador

                // Crear un objeto FormData para enviar los datos al servidor
                const formData = new FormData();
                formData.append('reserva', draft_actualizado); // Agregar el valor al FormData

                // Enviar la solicitud al servidor
                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // Convertir la respuesta a texto
                .then(data => {
                    console.log(data); // Mostrar la respuesta en la consola
                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                })
                .catch(error => console.error('Error:', error)); // Manejo de errores
            } else {
                alert("No hay jugadores disponibles en la lista olímpica.");
            }
        } else {
            mostrarAlertaEspacio2();
        }
    });
});

const cumple = ["brown", "vucevic", "mathews", "landale"
];

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('cumpleButton').addEventListener('click', function() {
        // Verificar si la reserva está vacía
        if (reserva === "") {
            // Filtrar la lista de jugadores para obtener solo los disponibles y que estén en la lista olimpicos
            const disponiblesCumple = jugadores.filter(jugador =>
                jugador.disponible && cumple.includes(jugador.nombre)
            );

            // Verificar si hay jugadores disponibles
            if (disponiblesCumple.length > 0) {
                // Seleccionar un elemento aleatorio de la lista filtrada
                const randomIndex9 = Math.floor(Math.random() * disponiblesCumple.length);
                const cumple_actualizado = disponiblesCumple[randomIndex9].nombre; // Obtener el nombre del jugador

                // Crear un objeto FormData para enviar los datos al servidor
                const formData = new FormData();
                formData.append('reserva', cumple_actualizado); // Agregar el valor al FormData

                // Enviar la solicitud al servidor
                fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // Convertir la respuesta a texto
                .then(data => {
                    console.log(data); // Mostrar la respuesta en la consola
                    location.reload(); // Recargar la página después de que la respuesta se haya procesado
                })
                .catch(error => console.error('Error:', error)); // Manejo de errores
            } else {
                alert("Ya no quedan jugadores disponibles.");
            }
        } else {
            mostrarAlertaEspacio2();
        }
    });
});

document.getElementById('vaciarButton').addEventListener('click', function() {
    const base_actualizado = "";
    const escolta_actualizado = "";
    const alero_actualizado = "";
    const alapivot_actualizado = "";
    const pivot_actualizado = "";
    const manager_actualizado = "";
    const reserva_actualizado = "";

    // Crear un objeto FormData para enviar los datos al servidor
    const formData = new FormData();
    formData.append('base', base_actualizado); // Agregar el valor al FormData
    formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
    formData.append('alero', alero_actualizado); // Agregar el valor al FormData
    formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
    formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
    formData.append('manager', manager_actualizado); // Agregar el valor al FormData
    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
   
    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores

   
});

// Seleccionar el botón y el opening
const sobreBronceButton = document.getElementById('sobreBronce');
const openingBronceModal = document.getElementById('openingBronce');
const sobrePlataButton = document.getElementById('sobrePlata');
const openingPlataModal = document.getElementById('openingPlata');
const sobreOroButton = document.getElementById('sobreOro');
const openingOroModal = document.getElementById('openingOro');
const sobreUltimateButton = document.getElementById('sobreUltimate');
const openingUltimateModal = document.getElementById('openingUltimate');
const sobreDraftButton = document.getElementById('sobreDraft');
const openingDraftModal = document.getElementById('openingDraft');
const sobreJJOOButton = document.getElementById('sobreJJOO');
const openingJJOOModal = document.getElementById('openingJJOO');
const sobreCumpleButton = document.getElementById('sobreCumple');
const openingCumpleModal = document.getElementById('openingCumple');
const sobreDiarioButton = document.getElementById('sobreDiario');
const openingDiarioModal = document.getElementById('openingDiario');

// Mostrar el opening cuando se haga clic en el botón
sobreBronceButton.addEventListener('click', function() {
    openingBronceModal.style.display = 'flex';
});
sobrePlataButton.addEventListener('click', function() {
    openingPlataModal.style.display = 'flex';
});
sobreOroButton.addEventListener('click', function() {
    openingOroModal.style.display = 'flex';
});
sobreUltimateButton.addEventListener('click', function() {
    openingUltimateModal.style.display = 'flex';
});
sobreDraftButton.addEventListener('click', function() {
    openingDraftModal.style.display = 'flex';
});
sobreJJOOButton.addEventListener('click', function() {
    openingJJOOModal.style.display = 'flex';
});
sobreCumpleButton.addEventListener('click', function() {
    openingCumpleModal.style.display = 'flex';
});
sobreDiarioButton.addEventListener('click', function() {
    openingDiarioModal.style.display = 'flex';
});

window.onclick = function(event) {
    if (event.target == openingBronceModal) {
        openingBronceModal.style.display = "none";
    }
   
    if (event.target == openingPlataModal) {
        openingPlataModal.style.display = "none";
    }
   
    if (event.target == openingOroModal) {
        openingOroModal.style.display = "none";
    }
   
    if (event.target == openingUltimateModal) {
        openingUltimateModal.style.display = "none";
    }
   
    if (event.target == openingDraftModal) {
        openingDraftModal.style.display = "none";
    }
   
    if (event.target == openingJJOOModal) {
        openingJJOOModal.style.display = "none";
    }
   
    if (event.target == openingCumpleModal) {
        openingCumpleModal.style.display = "none";
    }
   
    if (event.target == openingDiarioModal) {
        openingDiarioModal.style.display = "none";
    }

document.getElementById('cancelarSobre').addEventListener('click', function() {
    openingBronceModal.style.display = "none";
});

document.getElementById('cancelarSobre2').addEventListener('click', function() {
    openingPlataModal.style.display = "none";
});

document.getElementById('cancelarSobre3').addEventListener('click', function() {
    openingOroModal.style.display = "none";
});

document.getElementById('cancelarSobre4').addEventListener('click', function() {
    openingUltimateModal.style.display = "none";
});

document.getElementById('cancelarSobre5').addEventListener('click', function() {
    openingDraftModal.style.display = "none";
});

document.getElementById('cancelarSobre6').addEventListener('click', function() {
    openingJJOOModal.style.display = "none";
});

document.getElementById('cancelarSobre7').addEventListener('click', function() {
    openingCumpleModal.style.display = "none";
});

document.getElementById('cancelarSobre8').addEventListener('click', function() {
    openingDiarioModal.style.display = "none";
});


};

document.getElementById('meterReserva').addEventListener('click', function() {
    const jugadorEncontrado = jugadores.find(jugador => jugador.nombre === reserva);
    // Verificar si existe el jugador y si su posición es "base"
    if (jugadorEncontrado && jugadorEncontrado.posicion === "PG") {
        var sacar = base;
        var poner = reserva;
        const reserva_actualizado = sacar;
        const base_actualizado = poner;
        const formData = new FormData();
        formData.append('base', base_actualizado);
        formData.append('reserva', reserva_actualizado);
        fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
        location.reload();
       
    } else {
        if (jugadorEncontrado && jugadorEncontrado.posicion === "SG") {
        var sacar = escolta;
        var poner = reserva;
        const reserva_actualizado = sacar;
        const escolta_actualizado = poner;
        const formData = new FormData();
        formData.append('escolta', escolta_actualizado);
        formData.append('reserva', reserva_actualizado);
        fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
        location.reload();
       
    } else {
        if (jugadorEncontrado && jugadorEncontrado.posicion === "SF") {
        var sacar = alero;
        var poner = reserva;
        const reserva_actualizado = sacar;
        const alero_actualizado = poner;
        const formData = new FormData();
        formData.append('alero', alero_actualizado);
        formData.append('reserva', reserva_actualizado);
        fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
        location.reload();
       
    } else {
        if (jugadorEncontrado && jugadorEncontrado.posicion === "PF") {
        var sacar = alapivot;
        var poner = reserva;
        const reserva_actualizado = sacar;
        const alapivot_actualizado = poner;
        const formData = new FormData();
        formData.append('alapivot', alapivot_actualizado);
        formData.append('reserva', reserva_actualizado);
        fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
        location.reload();
       
    } else {
        if (jugadorEncontrado && jugadorEncontrado.posicion === "C") {
        var sacar = pivot;
        var poner = reserva;
        const reserva_actualizado = sacar;
        const pivot_actualizado = poner;
        const formData = new FormData();
        formData.append('pivot', pivot_actualizado);
        formData.append('reserva', reserva_actualizado);
        fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
        location.reload();
       
    } else {
        if (jugadorEncontrado && jugadorEncontrado.posicion === "HC") {
        var sacar = manager;
        var poner = reserva;
        const reserva_actualizado = sacar;
        const manager_actualizado = poner;
        const formData = new FormData();
        formData.append('manager', manager_actualizado);
        formData.append('reserva', reserva_actualizado);
        fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
        location.reload();
    }
    }
    }
    }
    }
}
});

// Selecciona el objeto con id base y el modal PlayerModal
const baseElement = document.getElementById('base');

// Agrega un evento al presionar el elemento base
baseElement.addEventListener('click', function() {
    // Cambia el estilo del modal para que se muestre como 'flex'
    playerModal.style.display = 'flex';
});

// Obtener el modal
var avatarModal = document.getElementById("avatarModal");

// Obtener el botón que abre el modal
var elegirAvatar = document.getElementById("elegirAvatar");

// Obtener el elemento <span> que cierra el modal
var avatarClose = document.getElementsByClassName("avatar-close")[0];

// Cuando se hace clic en el botón, abre el modal
elegirAvatar.onclick = function() {
  avatarModal.style.display = "block";
}

// Cuando el usuario hace clic en <span> (x), cierra el modal
avatarClose.onclick = function() {
  avatarModal.style.display = "none";
}

// Si el usuario hace clic fuera del modal, lo cierra


document.getElementById('base').addEventListener('click', function() {
    infoModal.style.display = "flex";
})

document.getElementById('cerrarInfoJugador').addEventListener('click', function() {
    infoModal.style.display = "none";
})

document.getElementById('escolta').addEventListener('click', function() {
    document.getElementById('infoModalEscolta').style.display = "flex";
})

document.getElementById('cerrarInfoEscolta').addEventListener('click', function() {
    document.getElementById('infoModalEscolta').style.display = "none";
})

document.getElementById('alero').addEventListener('click', function() {
    document.getElementById('infoModalAlero').style.display = "flex";
})

document.getElementById('cerrarInfoAlero').addEventListener('click', function() {
    document.getElementById('infoModalAlero').style.display = "none";
})

document.getElementById('alapivot').addEventListener('click', function() {
    document.getElementById('infoModalAlapivot').style.display = "flex";
})

document.getElementById('cerrarInfoAlapivot').addEventListener('click', function() {
    document.getElementById('infoModalAlapivot').style.display = "none";
})

document.getElementById('pivot').addEventListener('click', function() {
    document.getElementById('infoModalPivot').style.display = "flex";
})

document.getElementById('cerrarInfoPivot').addEventListener('click', function() {
    document.getElementById('infoModalPivot').style.display = "none";
})

document.getElementById('manager').addEventListener('click', function() {
    document.getElementById('infoModalManager').style.display = "flex";
})

document.getElementById('cerrarInfoManager').addEventListener('click', function() {
    document.getElementById('infoModalManager').style.display = "none";
})

document.getElementById('reserva').addEventListener('click', function() {
    document.getElementById('infoModalReserva').style.display = "flex";
})

document.getElementById('cerrarInfoReserva').addEventListener('click', function() {
    document.getElementById('infoModalReserva').style.display = "none";
})

window.onclick = function(event) {
  // Cerrar el modal infoModal si se hace clic en él
  if (event.target == document.getElementById('infoModal')) {
    document.getElementById('infoModal').style.display = "none";
  }
  
  // Cerrar el modal infoModalEscolta si se hace clic en él
  if (event.target == document.getElementById('infoModalEscolta')) {
    document.getElementById('infoModalEscolta').style.display = "none";
  }
  
  // Cerrar el modal infoModalAlero si se hace clic en él
  if (event.target == document.getElementById('infoModalAlero')) {
    document.getElementById('infoModalAlero').style.display = "none";
  }
  
  // Cerrar el modal infoModalAlapivot si se hace clic en él
  if (event.target == document.getElementById('infoModalAlapivot')) {
    document.getElementById('infoModalAlapivot').style.display = "none";
  }
  
  // Cerrar el modal infoModalPivot si se hace clic en él
  if (event.target == document.getElementById('infoModalPivot')) {
    document.getElementById('infoModalPivot').style.display = "none";
  }
  
  // Cerrar el modal infoModalManager si se hace clic en él
  if (event.target == document.getElementById('infoModalManager')) {
    document.getElementById('infoModalManager').style.display = "none";
  }
  
  // Cerrar el modal infoModalReserva si se hace clic en él
  if (event.target == document.getElementById('infoModalReserva')) {
    document.getElementById('infoModalReserva').style.display = "none";
  }
  
  // Cerrar el modal avatarModal si se hace clic en él
  if (event.target == avatarModal) {
    avatarModal.style.display = "none";
  }
  
  // Cerrar el modal avatarModal si se hace clic en él
  if (event.target == ventaModal) {
    ventaModal.style.display = "none";
  }
};


document.getElementById('CancelarBase').addEventListener('click', function() {
    document.getElementById('infoModal').style.display = "none";
    document.getElementById('ventaModal').style.display = "none";
  })

let dinero_de_venta = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar; ?> * 0.75)
let dinero_de_venta2 = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar2; ?> * 0.75)
let dinero_de_venta3 = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar3; ?> * 0.75)
let dinero_de_venta4 = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar4; ?> * 0.75)
let dinero_de_venta5 = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar5; ?> * 0.75)
let dinero_de_venta6 = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar6; ?> * 0.75)
let dinero_de_venta7 = <?php echo $dinero; ?> + (<?php echo $valor_para_mostrar7; ?> * 0.75)

document.getElementById('VenderBase').addEventListener('click', function() {
    const base_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('base', base_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById('VenderEscolta').addEventListener('click', function() {
    const escolta_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('escolta', escolta_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta2); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById('VenderAlero').addEventListener('click', function() {
    const alero_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('alero', alero_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta3); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById('VenderAlapivot').addEventListener('click', function() {
    const alapivot_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('alapivot', alapivot_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta4); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById('VenderPivot').addEventListener('click', function() {
    const pivot_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('pivot', pivot_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta5); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById('VenderManager').addEventListener('click', function() {
    const manager_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('manager', manager_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta6); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById('VenderReserva').addEventListener('click', function() {
    const reserva_actualizado = ""; // Asegúrate de que esta variable tenga el valor correcto
    const formData = new FormData();
    formData.append('reserva', reserva_actualizado); // Agregar el valor al FormData
    formData.append('dinero', dinero_de_venta7); // Agregar el valor calculado para la columna dinero

    // Enviar la solicitud al servidor
    fetch('principal.php', { // Asegúrate de que el archivo PHP sea correcto
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Convertir la respuesta a texto
    .then(data => {
        console.log(data); // Mostrar la respuesta en la consola
        location.reload(); // Recargar la página después de que la respuesta se haya procesado
    })
    .catch(error => console.error('Error:', error)); // Manejo de errores
   
});

document.getElementById("valorClausula").innerText = `Su valor es de $${clausula_valor_pordos}`; // Asigna el valor al <p>

const imagenesModal = document.getElementById('imagenesModal'); // Asegúrate de que este ID exista

    // Supongamos que fila.base tiene un valor válido
    const baseImage = `jugadores/${fila.base}.png`;

    // Agrega la imagen al modal
    imagenesModal.innerHTML += `<img src='${baseImage}' alt='Base' width='50' height='50'>`;

    // Suponiendo que la variable $usuario_para_ver_base tiene un valor antes de esta línea
let usuarioParaVerBase;




function mostrarAlertaPlata() {
            document.getElementById('miAlertaPlata').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
function cerrarAlertaPlata() {
            document.getElementById('miAlertaPlata').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
function mostrarAlertaEspacio() {
            document.getElementById('miAlertaEspacio').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
function cerrarAlertaEspacio() {
            document.getElementById('miAlertaEspacio').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
function mostrarAlertaPertenece() {
            document.getElementById('miAlertaPertenece').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
function cerrarAlertaPertenece() {
            document.getElementById('miAlertaPertenece').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
function mostrarAlertaEspacio2() {
            document.getElementById('miAlertaEspacio2').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
function cerrarAlertaEspacio2() {
            document.getElementById('miAlertaEspacio2').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        };
function mostrarAlertaPuntos() {
            document.getElementById('miAlertaPuntos').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
function cerrarAlertaPuntos() {
            document.getElementById('miAlertaPuntos').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        };

        function cambiarAvatar(numero) {
    const perfil_actualizado = numero; // Usa el número del avatar seleccionado
    const formData = new FormData();
    formData.append('perfil', perfil_actualizado);

    fetch('principal.php', { 
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) 
    .then(data => {
        console.log(data); 
        location.reload(); // Recarga la página después de actualizar
    })
    .catch(error => console.error('Error:', error));
}

var puntosUsuario = <?php echo json_encode($puntos); ?>;

function cambiarAvatar2(numero) {
    // Utiliza la variable puntosUsuario desde el script PHP
    if (<?php echo $puntos; ?> >= 25) { // Usa la variable de JavaScript
        const perfil_actualizado = numero; // Usa el número del avatar seleccionado
        const formData = new FormData();
        formData.append('perfil', perfil_actualizado);

        fetch('principal.php', { 
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) 
        .then(data => {
            console.log(data); 
            location.reload(); // Recarga la página después de actualizar
        })
        .catch(error => console.error('Error:', error));
    } else {
        mostrarAlertaPuntos()
    }
}

function cambiarAvatar3(numero) {
    // Utiliza la variable puntosUsuario desde el script PHP
    if (<?php echo $puntos; ?> >= 50) { // Usa la variable de JavaScript
        const perfil_actualizado = numero; // Usa el número del avatar seleccionado
        const formData = new FormData();
        formData.append('perfil', perfil_actualizado);

        fetch('principal.php', { 
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) 
        .then(data => {
            console.log(data); 
            location.reload(); // Recarga la página después de actualizar
        })
        .catch(error => console.error('Error:', error));
    } else {
        mostrarAlertaPuntos()
    }
}

function cambiarAvatar4(numero) {
    // Utiliza la variable puntosUsuario desde el script PHP
    if (<?php echo $puntos; ?> >= 100) { // Usa la variable de JavaScript
        const perfil_actualizado = numero; // Usa el número del avatar seleccionado
        const formData = new FormData();
        formData.append('perfil', perfil_actualizado);

        fetch('principal.php', { 
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) 
        .then(data => {
            console.log(data); 
            location.reload(); // Recarga la página después de actualizar
        })
        .catch(error => console.error('Error:', error));
    } else {
        mostrarAlertaPuntos()
    }
}

function mostrarVentaModal() {
        // Cerrar el modal actual
        document.getElementById('infoModal').style.display = 'none';

        // Abrir el nuevo modal
        document.getElementById('ventaModal').style.display = 'flex';
    }

    
function volverAtrasVenta() {
        // Cerrar el modal actual
        document.getElementById('infoModal').style.display = 'flex';

        // Abrir el nuevo modal
        document.getElementById('ventaModal').style.display = 'none';
    }

    function cerrarVentaModal() {
        // Cerrar el modal de venta
        document.getElementById('ventaModal').style.display = 'none';
    }

    // Obtener los elementos HTML por su ID
  const slider = document.getElementById("precioSlider");
  const precioSeleccionado = document.getElementById("precioSeleccionado");

  // Actualiza el valor de 'precioSeleccionado' cuando el usuario mueve el slider
  slider.oninput = function() {
    precioSeleccionado.innerHTML = this.value; // Cambia el contenido de la etiqueta <span> al valor actual del slider
  };
  
  function actualizarPrecio() {
    // Obtiene el valor actual del slider
    var slider = document.getElementById('precioSlider').value;
    // Actualiza el texto del span con el valor del slider
    document.getElementById('precioSeleccionado').textContent = slider;
  }

  function actualizarPrecio() {
    const slider = document.getElementById('precioSlider');
    const precioSeleccionado = document.getElementById('precioSeleccionado');
    const precioFinalDeVenta = document.getElementById('precioFinalDeVenta'); // Asegúrate de que exista este ID
    
    precioSeleccionado.innerText = slider.value; // Actualiza el precio mostrado
    precioFinalDeVenta.value = slider.value; // Actualiza el valor de precioFinalDeVenta
}
    </script>
</body>
</html>