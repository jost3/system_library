<?php
session_start();
include('../bd/mostrar_dt.php');

if (isset($_GET['id'])) {
    $idLibroD = $_GET['id'];

    // Realiza la eliminación en la base de datos
    $eliminarUser = "DELETE FROM libro_dig WHERE ID_LibroD = $idLibroD";
    $ejecutarEliminar = mysqli_query($conex, $eliminarUser);

    if ($ejecutarEliminar) {
        $_SESSION['mensaje'] = "Libro Digital eliminado con éxito";
        header('Location: digital_book.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al eliminar Libro digital";
        header('Location: digital_book.php?alerta=error');
    }
} else {
    header('Location: digital_book.php');
}
?>