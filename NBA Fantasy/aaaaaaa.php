<?php
$db_config = [
    'host' => 'localhost',
    'user' => 'root', // Cambia a tu usuario de MySQL
    'password' => '', // Cambia a tu contraseña de MySQL
    'database' => 'login_register_db'
];

// Crear la conexión
$conn = new mysqli($db_config['host'], $db_config['user'], $db_config['password'], $db_config['database']);

// Verificar conexión
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Definir la clase Jugador
class Jugador {
    public $nombre;
    public $nombreCompleto;
    public $equipo;
    public $posicion;
    public $valor;
    public $puntosUltimoPartido;
    public $disponible;
    public $clausula;
    public $lesionado;

    // Constructor
    public function __construct($nombre, $nombreCompleto, $equipo, $posicion, $valor, $puntosUltimoPartido, $disponible, $lesionado) {
        $this->nombre = $nombre;
        $this->nombreCompleto = $nombreCompleto;
        $this->equipo = $equipo;
        $this->posicion = $posicion;
        $this->valor = $valor;
        $this->puntosUltimoPartido = $puntosUltimoPartido;
        $this->disponible = $disponible;
        $this->clausula = $valor * 2; // Ejemplo de cláusula
        $this->lesionado = $lesionado;
    }
}

// Crear algunos objetos Jugador
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

// Función para insertar un jugador en la base de datos
function insertarJugador($conn, $jugador) {
    $stmt = $conn->prepare("INSERT INTO jugadores (nombre, nombreCompleto, equipo, posicion, valor, puntosUltimoPartido, disponible, clausula, lesionado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiisds", 
        $jugador->nombre,
        $jugador->nombreCompleto,
        $jugador->equipo,
        $jugador->posicion,
        $jugador->valor,
        $jugador->puntosUltimoPartido,
        $jugador->disponible,
        $jugador->clausula,
        $jugador->lesionado
    );

    if ($stmt->execute()) {
        echo "Jugador " . $jugador->nombre . " insertado correctamente.<br>";
    } else {
        echo "Error al insertar el jugador: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Recorrer la lista de jugadores y agregar cada uno a la base de datos
foreach ($jugadores as $jugador) {
    insertarJugador($conn, $jugador);
}

// Cerrar la conexión
$conn->close();
?>
