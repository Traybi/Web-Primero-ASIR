let con = prompt("Introduce la contraseña para acceder al portal del Administrador: ");
let correcta = "administrador"
while (con != correcta){
alert("Error! Contraseña incorrecta. Recuerde que si no es administrador no puede acceder a esta zona, todo lo que haga quedará registrado y sabremos quien ha hecho todo")
con = prompt("Introduce la contraseña para acceder a la web: ");
}
alert ("Bienvenido Administrador. Que tenga muy buen día")
window.onscroll = function() {
var btn = document.getElementById("btn-top");
if (window.pageYOffset > 100) {
    btn.style.display = "block";
} else {
    btn.style.display = "none";
}
}