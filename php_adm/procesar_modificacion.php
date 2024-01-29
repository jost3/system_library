<?php
session_start();
include('../bd/conex_prest.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se han enviado los datos del formulario
    if (isset($_POST['titulo1'], $_POST['autor1'], $_POST['descripcion1'], $_POST['estado'], $_POST['fecha'], $_POST['dni_est'], $_POST['nombre'])) {
        $idPrestamo = $_POST['id_prest'];
        $titulo = $_POST['titulo1'];
        $autor = $_POST['autor1'];
        $descripcion = $_POST['descripcion1'];
        $estado = $_POST['estado'];
        $fecha = $_POST['fecha'];
        $dni_est = $_POST['dni_est'];
        $nombre = $_POST['nombre'];

        // Realiza la actualización en la base de datos
        $actualizarPrestamo = "UPDATE prestamo SET titulo1 = '$titulo', autor1 = '$autor', descripcion1 = '$descripcion', estado = '$estado', fecha = '$fecha', dni_est = '$dni_est', nombre = '$nombre' WHERE id_prest = $idPrestamo";
        $ejecutarActualizarPrestamo = mysqli_query($conex1, $actualizarPrestamo);
        if ($ejecutarActualizarPrestamo) {
            $_SESSION['mensaje'] = "Préstamo modificado con éxito";
            header('Location: loan.php?alerta=exito');
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al modificar el préstamo";
            header('Location: modificar_prest.php?alerta=error');
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Todos los campos del formulario son obligatorios";
        header('Location: modificar_prest.php?id=' . $_POST['id_prestamo'] . '&alerta=error');
        exit();
    }
} else {
    // Si el formulario no se ha enviado correctamente, redirige a una página adecuada
    header('Location: loan.php');
    exit();
}
?>

