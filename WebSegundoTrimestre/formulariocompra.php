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
            <p class="error-message" id="error-pago">Debe seleccionar un método de pago (Tarjeta, PayPal o Efectivo).</p>
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

    <script>
        document.getElementById('nombre').addEventListener('blur', validarNombre);
        document.getElementById('apellido').addEventListener('blur', validarApellido);
        document.getElementById('email').addEventListener('blur', validarEmail);
        document.getElementById('telefono').addEventListener('blur', validarTelefono);
        document.getElementById('producto').addEventListener('blur', validarProducto);
        document.getElementById('cantidad').addEventListener('blur', validarCantidad);
        document.getElementById('terminos').addEventListener('change', validarTerminos);
        
        let metodosPago = document.getElementsByName('pago');
        for (let i = 0; i < metodosPago.length; i++) {
            metodosPago[i].addEventListener('change', validarMetodoPago);
        }

        document.getElementById('formulario-compra').addEventListener('submit', validarFormulario);

        function validarNombre() {
            let nombre = document.getElementById('nombre').value.trim();
            if (!nombre) {
                mostrarError('nombre', 'error-nombre', 'El nombre es obligatorio.');
                return false;
            } else if (!/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/.test(nombre)) {
                mostrarError('nombre', 'error-nombre', 'El nombre solo debe contener letras.');
                return false;
            } else {
                limpiarError('nombre', 'error-nombre');
                return true;
            }
        }

        function validarApellido() {
            let apellido = document.getElementById('apellido').value.trim();
            if (!apellido) {
                mostrarError('apellido', 'error-apellido', 'El apellido es obligatorio.');
                return false;
            } else if (!/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/.test(apellido)) {
                mostrarError('apellido', 'error-apellido', 'El apellido solo debe contener letras.');
                return false;
            } else {
                limpiarError('apellido', 'error-apellido');
                return true;
            }
        }

        function validarCorreo() {
            let email = document.getElementById('email').value.trim();
            if (!email) {
                mostrarError('email', 'error-email', 'El correo electrónico es obligatorio.');
                return false;
            } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                mostrarError('email', 'error-email', 'Formato inválido. Debe ser ejemplo@ejemplo.com.');
                return false;
            } else {
                limpiarError('email', 'error-email');
                return true;
            }
        }

        function validarTelefono() {
            let telefono = document.getElementById('telefono').value.trim();
            if (!telefono) {
                mostrarError('telefono', 'error-telefono', 'El teléfono es obligatorio.');
                return false;
            } else if (!/^\d{9}$/.test(telefono)) {
                mostrarError('telefono', 'error-telefono', 'El teléfono debe tener exactamente 9 dígitos numéricos.');
                return false;
            } else {
                limpiarError('telefono', 'error-telefono');
                return true;
            }
        }

        function validarProducto() {
            let producto = document.getElementById('producto').value;
            if (!producto) {
                mostrarError('producto', 'error-producto', 'Debe seleccionar un producto.');
                return false;
            } else {
                limpiarError('producto', 'error-producto');
                return true;
            }
        }

        function validarCantidad() {
            let cantidad = document.getElementById('cantidad').value;
            if (!cantidad) {
                mostrarError('cantidad', 'error-cantidad', 'La cantidad es obligatoria.');
                return false;
            } else if (cantidad < 1) {
                mostrarError('cantidad', 'error-cantidad', 'La cantidad debe ser al menos 1.');
                return false;
            } else {
                limpiarError('cantidad', 'error-cantidad');
                return true;
            }
        }

        function validarMetodoPago() {
            let metodoPagoSeleccionado = false;
            let metodosPago = document.getElementsByName('pago');
            for (let i = 0; i < metodosPago.length; i++) {
                if (metodosPago[i].checked) {
                    metodoPagoSeleccionado = true;
                    break;
                }
            }
            if (!metodoPagoSeleccionado) {
                document.getElementById('error-pago').style.display = 'block';
                return false;
            } else {
                document.getElementById('error-pago').style.display = 'none';
                return true;
            }
        }

        function validarTerminos() {
            let terminos = document.getElementById('terminos').checked;
            if (!terminos) {
                mostrarError('terminos', 'error-terminos', 'Debe aceptar los términos y condiciones.');
                return false;
            } else {
                limpiarError('terminos', 'error-terminos');
                return true;
            }
        }

        function validarFormulario(event) {
            event.preventDefault();
            let formValido = true;
            
            if (!validarNombre()) formValido = false;
            if (!validarApellido()) formValido = false;
            if (!validarCorreo()) formValido = false;
            if (!validarTelefono()) formValido = false;
            if (!validarProducto()) formValido = false;
            if (!validarCantidad()) formValido = false;
            if (!validarMetodoPago()) formValido = false;
            if (!validarTerminos()) formValido = false;

            if (formValido) {
                this.submit();
            }
        }

        function mostrarError(campoId, mensajeId, mensaje) {
            if (campoId) {
                document.getElementById(campoId).classList.add('error');
            }
            document.getElementById(mensajeId).style.display = 'block';
            document.getElementById(mensajeId).textContent = mensaje;
        }

        function limpiarError(campoId, mensajeId) {
            if (campoId) {
                document.getElementById(campoId).classList.remove('error');
            }
            document.getElementById(mensajeId).style.display = 'none';
        }

        function limpiarErrores() {
            let campos = document.querySelectorAll("input, select");
            campos.forEach(campo => {
                campo.classList.remove("error");
            });
            let mensajesErrores = document.querySelectorAll(".error-message");
            mensajesErrores.forEach(mensaje => {
                mensaje.style.display = "none";
            });
        }
    </script>
</body>
<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$base_datos = "tiendaderopa";

$enlace = mysqli_connect($servidor, $usuario, $contraseña, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

if (isset($_POST['registro'])) {
    $nombre = mysqli_real_escape_string($enlace, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($enlace, $_POST["apellido"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
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
</html>