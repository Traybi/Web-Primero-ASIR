function mostrarError(id, mensaje) {
    const error = document.getElementById("error-" + id);
    if (error) {
        error.textContent = mensaje;
        error.style.color = "red";
    }
}

function limpiarError(id) {
    const error = document.getElementById("error-" + id);
    if (error) {
        error.textContent = "";
    }
}

function validarCampo(campo) {
    const id = campo.id;
    const valor = campo.value.trim();
    

    limpiarError(id);

    if (valor === "") {
        mostrarError(id, `El campo ${id} es obligatorio`);
        return false;
    }

    if ((id === "nombre" || id === "apellido") && !/^[a-zA-ZÁÉÍÓÚáéíóúñÑ\s]+$/.test(valor)) {
        mostrarError(id, `El campo ${id} solo puede contener letras`);
        return false;
    }

    if (id === "correo") {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(valor)) {
            mostrarError(id, "El formato no es válido. Se espera: ejemplo@correo.com");
            return false;
        }
    }

    if (id === "telefono") {
        const telefonoRegex = /^[0-9]{9}$/;
        if (!telefonoRegex.test(valor)) {
            mostrarError(id, "El teléfono debe tener 9 dígitos");
            return false;
        }
    }

    return true;
}

function validarFormulario() {
    let valido = true;

    
    const campos = ["nombre", "apellido", "correo", "telefono", "comentarios"];
    campos.forEach(id => {
        const campo = document.getElementById(id);
        if (!validarCampo(campo)) {
            valido = false;
        }
    });

    
    const generoSeleccionado = document.querySelector('input[name="genero"]:checked');
    if (!generoSeleccionado) {
        mostrarError("genero", "El campo género es obligatorio");
        valido = false;
    } else {
        limpiarError("genero");
    }

    
    const ciudad = document.getElementById("opciones").value;
    if (ciudad === "") {
        mostrarError("opciones", "El campo ciudad es obligatorio");
        valido = false;
    } else {
        limpiarError("opciones");
    }

    
    const condiciones = document.getElementById("condiciones");
    if (!condiciones.checked) {
        mostrarError("condiciones", "Debes aceptar los términos");
        valido = false;
    } else {
        limpiarError("condiciones");
    }

    return valido;
}

function actualizaInfo(max) {
    const textarea = document.getElementById("comentarios");
    const info = document.getElementById("info");
    const restantes = max - textarea.value.length;
    info.textContent = `Te quedan ${restantes} caracteres`;
}