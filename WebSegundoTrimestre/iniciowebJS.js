window.onscroll = function() {
        var btn = document.getElementById("btn-top");
        if (window.pageYOffset > 300) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    };

    window.onload = mostrarOfertaEspecial;
    function mostrarOfertaEspecial() {
        setTimeout(function() {
            alert("¡SOLO HOY! 20% de descuento en toda la tienda usando el código BIENVENIDA20");
        }, 5000);
    }

    setTimeout(function() {
        const userChoice = confirm("¡Ha pasado un minuto! ¿Deseas cerrar esta página?");
        if (userChoice) {
        window.location.href = "logout.html";
        }
    }, 10000);
    function toggleMenu() {
        var menu = document.getElementById("menu-links");
        menu.classList.toggle("open");
    }
    function toggleSubmenu() {
        var submenu = document.getElementById("submenu");
        submenu.classList.toggle("open");
    }