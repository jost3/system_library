<?php 
include('../bd/mostrar_dt.php');
?>
<?php
  if(isset($_POST['insertar'])){

    $titulo1= $_POST ['titulo1'];
    $autor1= $_POST ['autor1'];
    $descripcion1= $_POST ['descripcion1'];
    $estado= $_POST ['estado'];
    $fecha= $_POST ['fecha'];
    $fecha_term = $_POST['fecha_term'];
    $dni_est= $_POST ['dni_est'];
    $nombre= $_POST ['nombre'];

    $insertarDatos1 = "INSERT INTO prestamo VALUES('','$titulo1','$autor1','$descripcion1','$estado','$fecha','$fecha_term','$dni_est','$nombre')";
    $ejecutarInsertar1 = mysqli_query($conex,$insertarDatos1);

    if ($ejecutarInsertar1) {
      //  mostrar una ventana de confirmación
      $_SESSION['mensaje'] = "Prestamo registrado con éxito";
      header('Location: new_loan.php?alerta=exito');
    } else {
      //  muestra una ventana de error
      $_SESSION['mensaje'] = "Error al registrar el libro";
      header('Location: new_loan.php?alerta=error');
    }
  }
?>