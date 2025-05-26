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
        <h1>Formulario de Contacto</h1>

        <form id="formulario-contacto" action="ayudacliente.php" method="post">
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
                <legend>Selecciona tu género </legend>
                <div class="opciongenero">
                    <input type="radio" id="genero-m" name="genero" value="Masculino">
                    <label for="genero-m">Masculino</label>
                </div>
                <div class="opciongenero">
                    <input type="radio" id="genero-f" name="genero" value="Femenino">
                    <label for="genero-f">Femenino</label>
                </div>
                <p class="error-message" id="error-genero">Debes seleccionar un género.</p>
            </fieldset>
            
            <fieldset>
                <legend>Comentarios Adicionales</legend>
                <label for="comentarios">Comentarios</label>
                <textarea id="comentarios" name="comentarios" rows="5" maxlength="250"></textarea>
                <p id="info">Caracteres restantes: <span id="contador">250</span></p>
                <p class="error-message" id="error-comentarios">El campo de comentarios es obligatorio y no puede superar los 250 caracteres.</p>
            </fieldset>

            <fieldset>
                <legend>Ciudad</legend>
                <label for="ciudad">Selecciona una ciudad</label>
                <select id="ciudad" name="ciudad">
                    <option value="">Seleccione...</option>
                    <option value="Madrid">Madrid</option>
                    <option value="Barcelona">Barcelona</option>
                </select>
                <p class="error-message" id="error-ciudad">Debes seleccionar una ciudad.</p>
            </fieldset>

            <fieldset>
                <legend>Confirmación</legend>
                <input type="checkbox" id="condiciones" name="condiciones"> 
                <label for="condiciones">Acepto los términos y condiciones</label>
                <p class="error-message" id="error-condiciones">Debes aceptar los términos y condiciones.</p>
            </fieldset>

            <div class="botones">
                <button type="submit" name="ayudacliente">Enviar</button>
                <button type="reset">Restablecer</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('nombre').addEventListener('blur', validarNombre);
        document.getElementById('apellido').addEventListener('blur', validarApellido);
        document.getElementById('email').addEventListener('blur', validarCorreo);
        document.getElementById('telefono').addEventListener('blur', validarTelefono);
        document.getElementsByName('genero').forEach(radio => {radio.addEventListener('change', validarGenero);});
        document.getElementById('comentarios').addEventListener('blur', validarComentarios);
        document.getElementById('comentarios').addEventListener('input', actualizarContador);
        document.getElementById('opciones').addEventListener('change', validarOpciones);
        document.getElementById('condiciones').addEventListener('change', validarCondiciones);
        
        document.getElementById('formulario-contacto').addEventListener('submit', validarFormulario);

        function actualizarContador() {
            let comentarios = document.getElementById('comentarios').value;
            let maxLength = 250;
            let remaining = maxLength - comentarios.length;
            document.getElementById('contador').textContent = remaining;
        }

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

        function validarGenero() {
            let generoM = document.getElementById('genero-m').checked;
            let generoF = document.getElementById('genero-f').checked;
            
            if (!generoM && !generoF) {
                document.getElementById('error-genero').style.display = 'block';
                return false;
            } else {
                document.getElementById('error-genero').style.display = 'none';
                return true;
            }
        }

        function validarComentarios() {
            let comentarios = document.getElementById('comentarios').value.trim();
            if (!comentarios) {
                mostrarError('comentarios', 'error-comentarios', 'El campo de comentarios es obligatorio.');
                return false;
            } else if (comentarios.length > 250) {
                mostrarError('comentarios', 'error-comentarios', 'El comentario no puede superar los 250 caracteres.');
                return false;
            } else {
                limpiarError('comentarios', 'error-comentarios');
                return true;
            }
        }

        function validarOpciones() {
            let opciones = document.getElementById('opciones').value;
            if (opciones === "") {
                mostrarError('opciones', 'error-opciones', 'Debes seleccionar una ciudad.');
                return false;
            } else {
                limpiarError('opciones', 'error-opciones');
                return true;
            }
        }

        function validarCondiciones() {
            let condiciones = document.getElementById('condiciones').checked;
            if (!condiciones) {
                mostrarError('condiciones', 'error-condiciones', 'Debes aceptar los términos y condiciones.');
                return false;
            } else {
                limpiarError('condiciones', 'error-condiciones');
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
            if (!validarGenero()) formValido = false;
            if (!validarComentarios()) formValido = false;
            if (!validarOpciones()) formValido = false;
            if (!validarCondiciones()) formValido = false;

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
            let campos = document.querySelectorAll("input, select, textarea");
            campos.forEach(campo => {
                campo.classList.remove("error");
            });
            let mensajesErrores = document.querySelectorAll(".error-message");
            mensajesErrores.forEach(mensaje => {
                mensaje.style.display = "none";
            });
        }

        actualizarContador();
    </script>
</body>
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
    $ciudad = mysqli_real_escape_string($connection, $_POST["opciones"]);
    $estado = "procesando";

    $insertarDatos = "INSERT INTO ayudacliente (nombre, apellido, email, telefono, genero, comentarios, ciudad, estado) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$genero', '$comentarios', '$ciudad', '$estado')";

    $ejecutarInsertar = mysqli_query($connection, $insertarDatos) or die("Error de inserción: " . mysqli_error($connection));
    
    if($ejecutarInsertar) {
        echo "<script>alert('¡Formulario Enviado Correctamente!');</script>";
    }
    
    mysqli_close($connection);
}
?>
</html>