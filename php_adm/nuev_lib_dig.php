<?php 
session_start();
include('../bd/conex_prest.php');
?>

<?php
if (isset($_POST['registro'])) {
    $id = mysqli_real_escape_string($conex1, $_POST['id']);
    $nombre = mysqli_real_escape_string($conex1, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conex1, $_POST['autor']);
    $año_publ = mysqli_real_escape_string($conex1, $_POST['año_publ']);
    $url = mysqli_real_escape_string($conex1, $_POST['url']);
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $seccion = mysqli_real_escape_string($conex1, $_POST['seccion']);

    $insertarLibD = "INSERT INTO libro_dig (ID_LibroD, 	Nombre, Autor, Año_Publ, Url, Imagen, ID_SeccionD) VALUES ('$id', '$nombre', '$autor','$año_publ', '$url', '$imagen', '$seccion')";
    $resultado = mysqli_query($conex1, $insertarLibD);

    if ($resultado) {
        $_SESSION['mensaje'] = "Libro registrado con éxito";
        header('Location: new_book_dig.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al intentar registrar el libro";
        header('Location: new_book_dig.php?alerta=error');
    }
}
?>