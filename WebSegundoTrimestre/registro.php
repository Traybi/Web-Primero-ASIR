<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

$enlace = mysqli_connect($servidor, $usuario, $contraseña, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

if (isset($_POST['registro'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($enlace, $_POST["apellido"]);
    $email = mysqli_real_escape_string($enlace, $_POST["email"]);
    $telefono = mysqli_real_escape_string($enlace, $_POST["telefono"]);
    $producto = mysqli_real_escape_string($enlace, $_POST["producto"]);
    $cantidad = mysqli_real_escape_string($enlace, $_POST["cantidad"]);
    $pago = mysqli_real_escape_string($enlace, $_POST["pago"]);
    $estado = "procesando"; // Estado por defecto

    $insertarDatos = "INSERT INTO pedidos (nombre, apellido, email, telefono, producto, cantidad, pago, estado) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$producto', '$cantidad', '$pago', '$estado')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos) or die("Error al insertar datos: " . mysqli_error($enlace));
    
    if($ejecutarInsertar) {
        echo "<script>alert('¡Compra Realizada!');</script>";
    }
    
    mysqli_close($enlace);
}
?>
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