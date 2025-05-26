<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="formulariocompraCSS.css">
</head>
<body>
    <h1>Formulario de Compra</h1>
    
    <form id="formulario-compra" action="registro.php" method="post">
        <fieldset>
            <legend>Datos Personales</legend>
            <label for="nombre">Nombre </label>
            <input type="text" id="nombre" name="nombre">
            <p class="error-message" id="error-nombre">El nombre es obligatorio y solo debe contener letras.</p>

            <label for="apellido">Apellido </label>
            <input type="text" id="apellido" name="apellido">
            <p class="error-message" id="error-apellido">El apellido es obligatorio y solo debe contener letras.</p>

            <label for="correo">Correo Electrónico </label>
            <input type="text" id="email" name="email">
            <p class="error-message" id="error-correo">Debe ingresar un email válido (ejemplo@ejemplo.com).</p>

            <label for="telefono">Teléfono </label>
            <div id="telefono-container">
                <span id="prefijo" style="margin-right: 8px">+34</span>
                <input type="tel" id="telefono" name="telefono" maxlength="9" placeholder="Introduce tu número de teléfono (9 dígitos)" />
            </div>
            <p class="error-message" id="error-telefono">El teléfono debe contener exactamente 9 dígitos numéricos.</p>
            
        </fieldset>
        <fieldset>
            <legend>Información del Pedido</legend>
            <label for="producto">Producto </label>
            <select id="producto" name="producto">
                <option value="">Selecciona un producto</option>
                <option value="camiseta">Camiseta</option>
                <option value="pantalon">Pantalón</option>
                <option value="zapatos">Zapatos</option>
                <option value="accesorios">Accesorios</option>
            </select>
            <p class="error-message" id="error-producto">Debe seleccionar un producto de la lista.</p>

            <label for="cantidad">Cantidad </label>
            <input type="number" id="cantidad" name="cantidad" min="1">
            <p class="error-message" id="error-cantidad">La cantidad debe ser un número entero mayor o igual a 1.</p>

            <label>Método de Pago</label>
            <label><input type="radio" name="pago" value="tarjeta"> Tarjeta</label>
            <label><input type="radio" name="pago" value="paypal"> PayPal</label>
            <label><input type="radio" name="pago" value="efectivo"> Efectivo</label>
            <p class="error-message" id="error-metodo-pago">Debe seleccionar un método de pago (Tarjeta, PayPal o Efectivo).</p>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="terminos" name="terminos">
            <label for="terminos">Acepto los Términos y Condiciones</label>
            <p class="error-message" id="error-terminos">Debe aceptar los términos y condiciones para continuar.</p>
        </fieldset>

        <input type="hidden" name="estado" value="procesando">

        <div>
            <button type="submit" name="registro">Enviar Pedido</button>
            <button type="reset">Restablecer</button>
        </div>
    </form>

    <script src="formulariocompraJS.js"></script>
</body>
<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

$enlace = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

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

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);
    
    if($ejecutarInsertar) {
        echo "<script>alert('¡Compra Realizada!');</script>";
    }
    
    mysqli_close($enlace);
}
?>
</html>
