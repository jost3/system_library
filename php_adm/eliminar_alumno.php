<?php
session_start();
include('../bd/conex_prest.php');

if (isset($_GET['id'])) {
    $idalumno = $_GET['id'];

    // Sanitizamos la entrada para evitar inyección SQL
    $idalumno = mysqli_real_escape_string($conex1, $idalumno);

    // Realiza la eliminación en la base de datos
    $eliminaridalumno = "DELETE FROM alumnos WHERE id_alumno = $idalumno";
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
