function mostrarAlerta() {
    var parametro = new URLSearchParams(window.location.search);
    var alerta = parametro.get("alerta");

    if (alerta === "exito") {
        // Mostrar alerta de éxito y fondo transparente
        var alertaExito = document.getElementById("alertaExito");
        var overlay = document.getElementById("overlay");
        alertaExito.style.display = "block";
        overlay.style.display = "block";
    } else if (alerta === "error") {
        // Mostrar alerta de error y fondo transparente
        var alertaError = document.getElementById("alertaError");
        var overlay = document.getElementById("overlay");
        alertaError.style.display = "block";
        overlay.style.display = "block";
    }
}

function cerrarAlerta(id) {
    var alerta = document.getElementById(id);
    var overlay = document.getElementById("overlay");
    alerta.style.display = "none";
    overlay.style.display = "none";
}

window.onload = mostrarAlerta; // Mostrar la alerta al cargar la página