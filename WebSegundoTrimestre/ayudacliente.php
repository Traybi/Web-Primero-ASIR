<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

$connection = mysqli_connect($servidor, $usuario, $contraseña, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

if (isset($_POST['ayudacliente'])) {
    $nombre = mysqli_real_escape_string($connection, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($connection, $_POST["apellido"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $telefono = mysqli_real_escape_string($connection, $_POST["telefono"]);
    $genero = mysqli_real_escape_string($connection, $_POST["genero"]);
    $comentarios = mysqli_real_escape_string($connection, $_POST["comentarios"]);
    $ciudad = mysqli_real_escape_string($connection, $_POST["ciudad"]);
    $estado = "procesando";

    $insertarDatos = "INSERT INTO ayudacliente (nombre, apellido, email, telefono, genero, comentarios, ciudad, estado) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$genero', '$comentarios', '$ciudad', '$estado')";

    $ejecutarInsertar = mysqli_query($connection, $insertarDatos) or die("Error de inserción: " . mysqli_error($connection));
    
    if($ejecutarInsertar) {
        echo "<script>alert('¡Consulta Enviada!');</script>";
    }
    
    mysqli_close($connection);
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
    <link rel="stylesheet" href="ayudaclientecss.css">
    <div class="contenido">
        <h1>¡Gracias por contactar con nosotros. En breves le responderemos!</h1>
        <button onclick="window.location.href='inicioweb.html'">Volver a la página principal</button>
    </div>
</body>
</html>