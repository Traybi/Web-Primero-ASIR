<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

// Conectar incluyendo la base de datos
$connection = mysqli_connect($servidor, $usuario, $contraseña, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

if (isset($_POST['registro'])) {
    // Sanitizar entradas para prevenir inyección SQL
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($connection, $_POST["apellido"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $telefono = mysqli_real_escape_string($connection, $_POST["telefono"]);
    $producto = mysqli_real_escape_string($connection, $_POST["producto"]);
    $cantidad = mysqli_real_escape_string($connection, $_POST["cantidad"]);
    $pago = mysqli_real_escape_string($connection, $_POST["pago"]);
    $estado = "procesando"; // Valor por defecto según tu base de datos

    // Consulta corregida - no incluir el campo 'id' ya que es AUTO_INCREMENT
    $insertarDatos = "INSERT INTO pedidos (nombre, apellido, email, telefono, producto, cantidad, pago, estado) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$producto', '$cantidad', '$pago', '$estado')";

    // Usar la variable de conexión correcta
    $ejecutarInsertar = mysqli_query($connection, $insertarDatos) or die("Error de inserción: " . mysqli_error($connection));
    
    if($ejecutarInsertar) {
        echo "<script>alert('¡Datos insertados correctamente!');</script>";
    }
    
    // Cerrar la conexión
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla Finalizar Compra</title>
</head>
<body>
    <h1>Muchas Gracias por la Compra</h1>
    <button onclick="window.location.href='inicioweb.html'">Volver a la Tienda</button>
</body>
</html>