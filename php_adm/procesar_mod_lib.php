<?php
session_start();
include('../bd/conex_prest.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se han enviado los datos del formulario
    if (isset($_POST['titulo'], $_POST['autor'], $_POST['edicion'], $_POST['descripcion'])) {
        $idLibro = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $edicion = $_POST['edicion'];
        $descripcion = $_POST['descripcion'];
       

        // Realiza la actualización en la base de datos
        $actualizarLibro = "UPDATE libro SET titulo = '$titulo', autor = '$autor', edicion = '$edicion', descripcion = '$descripcion' WHERE id = $idLibro";
        $ejecutarActualizarLibro = mysqli_query($conex1, $actualizarLibro);
        if ($ejecutarActualizarLibro) {
            $_SESSION['mensaje'] = "Libro modificado con éxito";
            $_SESSION['tipo_alerta'] = "success";
            header('Location: book.php?alerta=exito');
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al modificar el préstamo";
            $_SESSION['tipo_alerta'] = "error";
            header('Location: modificar_book.php?alerta=error');
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Todos los campos del formulario son obligatorios";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: modificar_book.php?id=' . $_POST['id_prestamo'] . '&alerta=error');
        exit();
    }
} else {
    // Si el formulario no se ha enviado correctamente, redirige a una página adecuada
    header('Location: book.php');
    exit();
}
?>