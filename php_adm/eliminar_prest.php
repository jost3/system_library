<?php
session_start();
include('../bd/conex_prest.php');

if (isset($_GET['id'])) {
    $idPrestamo = $_GET['id'];

    // Realiza la eliminación en la base de datos
    $eliminarPrestamo = "DELETE FROM prestamo WHERE id_prest = $idPrestamo";
    $ejecutarEliminar1 = mysqli_query($conex1, $eliminarPrestamo);

    if ($ejecutarEliminar1) {
        $_SESSION['mensaje'] = "Prestamo eliminado con éxito";
        header('Location: loan.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el prestamo";
        header('Location: loan.php?alerta=error');
    }
} else {
    header('Location: loan.php');
}
?>