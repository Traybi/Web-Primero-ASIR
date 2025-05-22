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
            $modificarPedido = $_GET["id"];
            $estado = "resuelto";
            
            $modificar = "UPDATE ayudacliente SET Estado='$estado' WHERE id = '$modificarPedido'";

            mysqli_query($conexion, $modificar) or die("Error de inserción: " . mysqli_error($conexion));
            header("Location: index.php"); // Redirigir a la página de consulta
        ?>
    </body>
</html>