// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('nombre').addEventListener('blur', validarNombre);
    document.getElementById('apellido').addEventListener('blur', validarApellido);
    document.getElementById('email').addEventListener('blur', validarCorreo);
    document.getElementById('telefono').addEventListener('blur', validarTelefono);
    document.getElementById('producto').addEventListener('blur', validarProducto);
    document.getElementById('cantidad').addEventListener('blur', validarCantidad);
    document.getElementById('terminos').addEventListener('change', validarTerminos);

    let metodosPago = document.getElementsByName('pago');
    for (let i = 0; i < metodosPago.length; i++) {
        metodosPago[i].addEventListener('change', validarMetodoPago);
    }

    document.getElementById('formulario-compra').addEventListener('submit', validarFormulario);
});

function validarNombre() {
    let nombreElement = document.getElementById('nombre');
    if (!nombreElement) return false;
    
    let nombre = nombreElement.value.trim();
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
    let apellidoElement = document.getElementById('apellido');
    if (!apellidoElement) return false;
    
    let apellido = apellidoElement.value.trim();
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
    let emailElement = document.getElementById('email');
    if (!emailElement) return false;
    
    let correo = emailElement.value.trim();
    let correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!correo) {
        mostrarError('email', 'error-correo', 'El correo electrónico es obligatorio.');
        return false;
    } else if (!correoRegex.test(correo)) {
        mostrarError('email', 'error-correo', 'Formato inválido. Debe ser ejemplo@ejemplo.com.');
        return false;
    } else {
        limpiarError('email', 'error-correo');
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
    if (!document.getElementById('producto').value) {
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
        mostrarError(null, 'error-metodo-pago', 'Debe seleccionar un método de pago.');
        return false;
    } else {
        limpiarError(null, 'error-metodo-pago');
        return true;
    }
}

function validarTerminos() {
    if (!document.getElementById('terminos').checked) {
        mostrarError(null, 'error-terminos', 'Debe aceptar los términos y condiciones.');
        return false;
    } else {
        limpiarError(null, 'error-terminos');
        return true;
    }
}

function validarFormulario(event) {
    event.preventDefault();
    let formValido = true;
    
    // Validar todos los campos antes de enviar
    if (!validarNombre()) formValido = false;
    if (!validarApellido()) formValido = false;
    if (!validarCorreo()) formValido = false;
    if (!validarTelefono()) formValido = false;
    if (!validarProducto()) formValido = false;
    if (!validarCantidad()) formValido = false;
    if (!validarMetodoPago()) formValido = false;
    if (!validarTerminos()) formValido = false;

    if (formValido) {
        // Si no hay errores, enviar el formulario
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