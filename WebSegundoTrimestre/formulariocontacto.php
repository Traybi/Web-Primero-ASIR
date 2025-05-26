<?php
error_reporting(E_ALL);
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

$enlace = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($enlace, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($enlace, $_POST["apellido"]);
    $email = mysqli_real_escape_string($enlace, $_POST["email"]);
    $telefono = mysqli_real_escape_string($enlace, $_POST["telefono"]);
    $genero = mysqli_real_escape_string($enlace, $_POST["genero"]);
    $comentarios = mysqli_real_escape_string($enlace, $_POST["comentarios"]);
    $ciudad = mysqli_real_escape_string($enlace, $_POST["ciudad"]);
    $estado = "procesando"; // Estado por defecto

    $insertarDatos = "INSERT INTO ayudacliente (nombre, apellido, email, telefono, genero, comentarios, ciudad, estado) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$genero', '$comentarios', '$ciudad', '$estado')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    if ($ejecutarInsertar) { 
        header('Location: confirmacion.php'); 
        exit(); 
    } else { 
        printf("Connect failed: %s\n", $enlace->error); 
    }

    mysqli_close($enlace);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="formulariocontactoCSS.css">
</head>

<body>
    <div class="contenedor">
        <h1 class="fuente1">Formulario de Contacto</h1>
    </div>
    
    <form id="formulario-contacto" method="post">
        <fieldset>
            <legend>Datos Personales</legend>
            <label for="nombre">Nombre </label>
            <input type="text" id="nombre" name="nombre">
            <p class="error-message" id="error-nombre">El nombre es obligatorio y solo debe contener letras.</p>

            <label for="apellido">Apellido </label>
            <input type="text" id="apellido" name="apellido">
            <p class="error-message" id="error-apellido">El apellido es obligatorio y solo debe contener letras.</p>

            <label for="email">Correo Electrónico </label>
            <input type="text" id="email" name="email">
            <p class="error-message" id="error-email">Debe ingresar un email válido (ejemplo@ejemplo.com).</p>

            <label for="telefono">Teléfono </label>
            <div id="telefono-container">
                <span id="prefijo" style="margin-right: 8px">+34</span>
                <input type="tel" id="telefono" name="telefono" maxlength="9" placeholder="Introduce tu número de teléfono (9 dígitos)" />
            </div>
            <p class="error-message" id="error-telefono">El teléfono debe contener exactamente 9 dígitos numéricos.</p>
        </fieldset>

        <fieldset>
            <legend>Selecciona tu género</legend>
            <label><input type="radio" name="genero" value="Masculino"> Masculino</label>
            <label><input type="radio" name="genero" value="Femenino"> Femenino</label>
            <p class="error-message" id="error-genero">Debes seleccionar un género.</p>
        </fieldset>
        
        <fieldset>
            <legend>Información Adicional</legend>
            <label for="ciudad">Ciudad</label>
            <select id="ciudad" name="ciudad">
                <option value="">Selecciona una ciudad</option>
                <option value="Madrid">Madrid</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Valencia">Valencia</option>
                <option value="Sevilla">Sevilla</option>
            </select>
            <p class="error-message" id="error-ciudad">Debe seleccionar una ciudad de la lista.</p>

            <label for="comentarios">Comentarios</label>
            <textarea id="comentarios" name="comentarios" rows="5" maxlength="250" placeholder="Escribe tus comentarios aquí..."></textarea>
            <p id="info">Caracteres restantes: <span id="contador">250</span></p>
            <p class="error-message" id="error-comentarios">El campo de comentarios es obligatorio y no puede superar los 250 caracteres.</p>
        </fieldset>

        <fieldset>
            <input type="checkbox" id="condiciones" name="condiciones">
            <label for="condiciones">Acepto los Términos y Condiciones</label>
            <p class="error-message" id="error-condiciones">Debe aceptar los términos y condiciones para continuar.</p>
        </fieldset>

        <div>
            <button type="submit" name="ayudacliente">Enviar Formulario</button>
            <button type="reset">Restablecer</button>
            <button type="button" onclick="location.href='inicioweb.html'">Volver al Inicio</button>
        </div>
    </form>

    <script src="formulariocontactoJS.js"></script>
</body>

</html>