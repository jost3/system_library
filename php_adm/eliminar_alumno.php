<?php
session_start();
include('../bd/conex_prest.php');

if (isset($_GET['id'])) {
    $idAlumno = $_GET['id'];

    // Sanitizamos la entrada para evitar inyección SQL
    $idAlumno = mysqli_real_escape_string($conex1, $idAlumno);

    // Realiza la eliminación en la base de datos
    $eliminaridalumno = "DELETE FROM alumno WHERE id = $idAlumno";
    $ejecutarEliminar1 = mysqli_query($conex1, $eliminaridalumno);

    if ($ejecutarEliminar1) {
        $_SESSION['mensaje'] = "Alumno eliminado con éxito";
        header('Location: estudent_adm.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el alumno";
        header('Location: estudent_adm.php?alerta=error');
    }
} else {
    header('Location: estudent_adm.php');
}
?>
