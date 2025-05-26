        window.onscroll = function() {
        var btn = document.getElementById("btn-top");
        if (window.pageYOffset > 300) {
            btn.style.display = "block";
        } else {
            btn.style.display = "none";
        }
    };