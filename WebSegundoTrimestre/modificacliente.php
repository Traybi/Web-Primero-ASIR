<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Estado Contacto Cliente</title>
    </head>
    <body>
        <?php
            include("IndexConexion.php");
            mysqli_select_db($conexion, "tiendaderopa");
            $modificarEstado = $_GET["id"];
            $estado = "resuelto";
            
            $modificarcli = "UPDATE ayudacliente SET estado='$estado' WHERE id = '$modificarEstado'";

            mysqli_query($conexion, $modificarcli) or die("Error de inserción: " . mysqli_error($conexion));
            header("Location: index.php"); // Redirigir a la página de consulta
        ?>
    </body>
</html>