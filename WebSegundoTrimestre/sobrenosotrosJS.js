
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("btnPasillo").addEventListener("click", cuestionario);
    document.getElementById("btnMapa").addEventListener("click", verMapa);
    document.getElementById("btnVideo").addEventListener("click", verVideo);
    document.getElementById("btnOutfit").addEventListener("click", verOutfit);
    document.getElementById("btnCerrar").addEventListener("click", cerrarPasillo);
    document.getElementById("btnColorFondo").addEventListener("click", cambiarColorFondo);
    document.getElementById("btnFecha").addEventListener("click", mostrarFecha);
    document.getElementById("btnDescuento").addEventListener("click", aplicarDescuento);
});




    function cuestionario() {
     
        let pregunta1 = "¿En qué ciudad se encuentra nuestra dirección?";
        let respuesta1 = "Madrid";
        let pregunta2 = "¿Dónde se formaron los creadores de la marca?";
        let respuesta2 = "Universidad Europea";
    
   
        let respuestaUsuario1 = prompt(pregunta1);
        if (respuestaUsuario1 !== respuesta1) { 
            alert("No tienes permitido el paso, no eres realmente un seguidor de la marca.");
            return; 
        }
    
       
        let respuestaUsuario2 = prompt(pregunta2);
        if (respuestaUsuario2 !== respuesta2) { 
            alert("Sabes algo pero no lo suficiente...");
            return; 
        }
    
        alert("¡Felicidades! Has desbloqueado el pasillo secreto.");
        document.getElementById("secreto").classList.remove("hidden");
    }

    function verMapa() {
        document.getElementById("contenido").innerHTML = `
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.614984484104!2d-3.921663088150967!3d40.3730606713276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd419031a94d45e5%3A0x375a8b6ca7a1dc4c!2sUniversidad%20Europea%20de%20Madrid!5e0!3m2!1ses!2ses!4v1741387739132!5m2!1ses!2ses" 
            width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>`;
    }
    
    function verVideo() {
        document.getElementById("contenido").innerHTML = `
            <video width="600" controls>
                <source src="video-victoria.mp4" type="video/mp4">
            </video>`;
    }

   
function verOutfit() {
    document.getElementById("contenido").innerHTML = `
        <img id="image" src="Imagen1.jpg" alt="Imagen 1" style="width:300px; height:auto;">
    `; 
    document.getElementById("image").addEventListener("click", cambiarImagen);
}

function cambiarImagen() {
    let img = document.getElementById("image");

    if (img.src.includes("Imagen1.jpg")) {
        img.src = "images/Imagen2.jpg";
    } else {
        img.src = "images/Imagen1.jpg";
    }
}


let colorOriginal = "#f4f4f4"; 
let cambiar = false;

function cambiarColorFondo() {
    if (cambiar) {
        document.body.style.backgroundColor = colorOriginal;
    } else {
        document.body.style.backgroundColor = "lightblue";
    }
  
    cambiar = !cambiar;
   
}


function mostrarFecha() {
    
    document.getElementById("contenido").innerHTML = 
    '<a href="https://www.timeanddate.com/calendar/monthly.html?year=2024&month=9&country=16" target="_blank">Fecha fundación: 15 de septiembre de 2024</a>';
  
}

function aplicarDescuento() {
    document.getElementById("contenido").innerText = "¡Descuento de Fundador aplicado! Tendras un 20% de descuento en tu compra.";
}

function cerrarPasillo() {
    let confirmacion = confirm("¿Seguro que quieres cerrar el pasillo secreto?");
    if (confirmacion) {
        document.getElementById("secreto").classList.add("hidden");
        alert("El pasillo secreto ha sido cerrado.");
    } else {
        alert("El pasillo secreto permanecerá abierto.");
    }
}