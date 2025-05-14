<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conexión Base de Datos</title>
    </head>
    <body>
        <?php
            $servidor = "localhost";
            $usuario = "root";
            $password = "";
            $base_datos = "tiendaderopa";

            // Crear conexión con la BD
            $conexion = mysqli_connect($servidor, $usuario, $password, $base_datos) or die("Error de conexión: " . mysqli_connect_error());
        ?>
    </body>
</html>