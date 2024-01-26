<?php 
session_start();
include('../bd/conex_prest.php');
?>
<?php
  if(isset($_POST['registro'])){
    
    $titulo= $_POST ['titulo'];
    $autor= $_POST ['autor'];
    $edicion= $_POST ['edicion'];
    $descripcion= $_POST ['descripcion'];

    $insertarDatos = "INSERT INTO libro (id, titulo, edicion, descripcion, autor)VALUES('','$titulo','$edicion','$descripcion','$autor')";
    $ejecutarInsertar = mysqli_query($conex1,$insertarDatos);
    
    if ($ejecutarInsertar) {
      // mostrar una ventana de confirmación
      $_SESSION['mensaje'] = "Libro registrado con éxito";
      header('Location: new_book.php?alerta=exito');
  } else {
      // muestra una ventana de error
      $_SESSION['mensaje'] = "Error al registrar el libro";
      header('Location: new_book.php?alerta=error');
  }
  }
?>