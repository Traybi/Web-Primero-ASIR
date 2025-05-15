<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla Finalizar Compra</title>
</head>
<body>
    <link rel="stylesheet" href="registrocss.css">
    <div class="contenido">
        <h1>¡Gracias por su compra!</h1>
        <p>Su pedido ha sido procesado correctamente</p>
        <button onclick="window.location.href='inicioweb.html'">Volver a la página principal</button>
    </div>
</body>
</html>



<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

$connection = mysqli_connect($servidor, $usuario, $contraseña, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

if (isset($_POST['registro'])) {
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($connection, $_POST["apellido"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $telefono = mysqli_real_escape_string($connection, $_POST["telefono"]);
    $producto = mysqli_real_escape_string($connection, $_POST["producto"]);
    $cantidad = mysqli_real_escape_string($connection, $_POST["cantidad"]);
    $pago = mysqli_real_escape_string($connection, $_POST["pago"]);
    $estado = "procesando";

    $insertarDatos = "INSERT INTO pedidos (nombre, apellido, email, telefono, producto, cantidad, pago, estado) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$producto', '$cantidad', '$pago', '$estado')";

    $ejecutarInsertar = mysqli_query($connection, $insertarDatos) or die("Error de inserción: " . mysqli_error($connection));
    
    if($ejecutarInsertar) {
        echo "<script>alert('¡Datos insertados correctamente!');</script>";
    }
    
    mysqli_close($connection);
}
?>