<?php 
session_start();
include('../bd/conex_prest.php');
?>

<?php
if(isset($_POST['registro'])){
    
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $edicion = $_POST['edicion'];
    $descripcion = $_POST['descripcion'];

    // Utilizamos mysqli_real_escape_string para evitar inyecciones de SQL
    $titulo = mysqli_real_escape_string($conex1, $titulo);
    $autor = mysqli_real_escape_string($conex1, $autor);
    $edicion = mysqli_real_escape_string($conex1, $edicion);
    $descripcion = mysqli_real_escape_string($conex1, $descripcion);

    // Utilizamos una declaración preparada
    $insertarDatos = "INSERT INTO libro (titulo, edicion, descripcion, autor) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conex1, $insertarDatos);

    if ($stmt) {
        // Vinculamos los parámetros de manera segura
        mysqli_stmt_bind_param($stmt, "ssss", $titulo, $edicion, $descripcion, $autor);

        // Ejecutamos la inserción
        $ejecutarInsertar = mysqli_stmt_execute($stmt);

        if ($ejecutarInsertar) {
            $_SESSION['mensaje'] = "Libro registrado con éxito";
            header('Location: new_book.php?alerta=exito');
        } else {
            $_SESSION['mensaje'] = "Error al registrar el libro";
            header('Location: new_book.php?alerta=error');
        }

        mysqli_stmt_close($stmt);
    } else {
      $_SESSION['mensaje'] = "Error al intentar registrar el libro";
      header('Location: new_book.php?alerta=error');
    }
}
?>
