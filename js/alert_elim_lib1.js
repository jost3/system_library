var idEliminar; // Variable para almacenar el ID a eliminar
function mostrarModal(id) {
    idEliminar = id; // Almacena el ID a eliminar
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

function cerrarModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function eliminarLibro() {
    // Redirige al script de eliminación
    window.location.href = "../php_adm/eliminar_fil_lib.php?id1=" + idEliminar;
}