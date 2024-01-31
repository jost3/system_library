<?php
session_start();
include('../bd/mostrar_dt.php');

if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Realiza la eliminación en la base de datos
    $eliminarUser = "DELETE FROM usuarios WHERE id = $idUsuario";
    $ejecutarEliminar = mysqli_query($conex, $eliminarUser);

    if ($ejecutarEliminar) {
        $_SESSION['mensaje'] = "usuario eliminado con éxito";
        header('Location: adm_register.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al eliminar usuario";
        header('Location: adm_register.php?alerta=error');
    }
} else {
    header('Location: adm_register.php');
}
?>