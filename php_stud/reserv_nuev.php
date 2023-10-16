<?php 
include '../bd/mostrar_dt.php';
?>
<?php
  if(isset($_POST['insertar'])){

    $titulo1= $_POST ['titulo1'];
    $autor1= $_POST ['autor1'];
    $descripcion1= $_POST ['descripcion1'];
    $nombre= $_POST ['nombre'];

    $insertarDatos1 = "INSERT INTO prestamo VALUES('','$titulo1','$autor1','$descripcion1','','','','$nombre')";
    $ejecutarInsertar1 = mysqli_query($conex,$insertarDatos1);

    if ($ejecutarInsertar1) {
      //  mostrar una ventana de confirmación
      $_SESSION['mensaje'] = "Libro registrado con éxito";
      echo '<script>window.location.href = "reserva.php?alerta=exito";</script>';
    } else {
      //  muestra una ventana de error
      $_SESSION['mensaje'] = "Error al registrar el libro";
        echo '<script>window.location.href = "prest_nuev.php?alerta=error";</script>';
    }
  }
?>