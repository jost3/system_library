function mostrarAlerta(){
    var alerta = document.getElementById("myModal");
    var mensajeModal = document.getElementById("mensajeModal");
    mensajeModal.innerText = "Usuario o contraseña incorrectos. Vuelve a intentarlo.";
    alerta.style.display= "block";
}
function cerrarModal(){
    var modal = document.getElementById("myModal")
    modal.style.display = "none"
}
var parametro = new URLSearchParams(window.location.search);
var alerta = parametro.get("alerta");
if (alerta === "incorrecto") {
mostrarAlerta();
}