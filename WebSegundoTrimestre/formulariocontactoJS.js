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