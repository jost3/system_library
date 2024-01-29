<?php
session_start();
include('../bd/conex_prest.php');

if (isset($_GET['id'])) {
    $idLibro = $_GET['id'];

    // Realiza la eliminación en la base de datos
    $eliminarLibro = "DELETE FROM libro WHERE id = $idLibro";
    $ejecutarEliminar = mysqli_query($conex1, $eliminarLibro);

    if ($ejecutarEliminar) {
        $_SESSION['mensaje'] = "Libro eliminado con éxito";
        header('Location: book.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el libro";
        header('Location: book.php?alerta=error');
    }
} else {
    header('Location: book.php');
}
?>