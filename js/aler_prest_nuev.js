function mostrarAlerta() {
    var parametro = new URLSearchParams(window.location.search);
    var alerta = parametro.get("alerta");

    if (alerta === "exito") {
        // Mostrar alerta de éxito y fondo transparente
        var alertaExito = document.getElementById("alertaExito");
        var overlay1 = document.getElementById("overlay1");
        alertaExito.style.display = "block";
        overlay1.style.display = "block";
    } else if (alerta === "error") {
        // Mostrar alerta de error y fondo transparente
        var alertaError = document.getElementById("alertaError");
        var overlay1 = document.getElementById("overlay1");
        alertaError.style.display = "block";
        overlay1.style.display = "block";
    }
}

function cerrarAlerta(id) {
    var alerta = document.getElementById(id);
    var overlay1 = document.getElementById("overlay1");
    alerta.style.display = "none";
    overlay1.style.display = "none";
}

// Call the mostrarAlerta function to display alerts only when necessary
mostrarAlerta();

// Listen for the back button click event
window.onpopstate = function(event) {
    // Check if the previous page is the one you want to redirect to (e.g., "prest_nuev.php")
    if (document.referrer.indexOf("prest_nuev.php") !== -1) {
        // Redirect to the desired page
        window.location.href = "prest_nuev.php";
    }
};