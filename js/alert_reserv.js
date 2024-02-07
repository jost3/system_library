// Función para mostrar alerta según los parámetros de la URL
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

// Función para cerrar la alerta
function cerrarAlerta(id) {
    var alerta = document.getElementById(id);
    var overlay1 = document.getElementById("overlay1");
    alerta.style.display = "none";
    overlay1.style.display = "none";
}

// Llamada a la función para mostrar alertas cuando sea necesario
mostrarAlerta();

// Escuchar el evento de clic en el botón de retroceso del navegador
window.onpopstate = function(event) {
    if (document.referrer.indexOf("reserva.php") !== -1) {
        // Redirigir a la página deseada
        window.location.href = "reserva.php";
    }
};
