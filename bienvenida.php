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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Ismael</title>
</head>
<body>
    <h1>hola</h1>
</body>
</html>