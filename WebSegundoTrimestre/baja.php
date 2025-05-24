<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar Producto</title>
    </head>
    <body>
        <?php
            include("IndexConexion.php");
            mysqli_select_db($conexion, "tiendaderopa");
            $eliminarPedido = $_GET["id"];
            
            $eliminar = "DELETE FROM pedidos WHERE id = '$eliminarPedido'";

            mysqli_query($conexion, $eliminar);
            header("Location: http://localhost/WebSegundoTrimestre/index.php");
        ?>
    </body>
</html>