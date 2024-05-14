<?php
session_start();
include('../bd/mostrar_dt.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conex, $_POST['id']);
    $nombre = mysqli_real_escape_string($conex, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conex, $_POST['autor']);
    $edicion = mysqli_real_escape_string($conex, $_POST['edicion']);
    $url = mysqli_real_escape_string($conex, $_POST['url']);
    $seccion = mysqli_real_escape_string($conex, $_POST['seccion']);

    // Manejo de la imagen si se ha proporcionado una nueva
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $actualizarUsuario = "UPDATE libro_dig SET ID_LibroD='$id', Nombre='$nombre', Autor='$autor', Año_Publ='$edicion', Url='$url', ID_SeccionD='$seccion', Imagen='$imagen' WHERE ID_LibroD=$id";
    } else {
        // No se ha proporcionado una nueva imagen
        $actualizarUsuario = "UPDATE libro_dig SET ID_LibroD='$id', Nombre='$nombre', Autor='$autor', Año_Publ='$edicion', Url='$url', ID_SeccionD='$seccion' WHERE ID_LibroD=$id";
    }

    $resultado = mysqli_query($conex, $actualizarUsuario);

    if ($resultado) {
        $_SESSION['mensaje'] = "Usuario actualizado con éxito";
        $_SESSION['tipo_alerta'] = "success";
        header('Location: digital_book.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el usuario";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: digital_book.php');
        exit();
    }
} else {
    $_SESSION['mensaje'] = "Método de solicitud no válido";
    $_SESSION['tipo_alerta'] = "error";
    header('Location: mod_book_dig.php');
    exit();
}
?>