<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";     
$dbname = "hessen_library";
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<?php
  if(isset($_POST['registro'])){
    
    $titulo= $_POST ['titulo'];
    $autor= $_POST ['autor'];
    $descripcion= $_POST ['descripcion'];

    $insertarDatos = "INSERT INTO libro (id, titulo, descripcion, autor)VALUES('','$titulo','$descripcion','$autor')";
    $ejecutarInsertar = mysqli_query($conn,$insertarDatos);
    
    if ($ejecutarInsertar) {
      //  mostrar una ventana de confirmación
      $_SESSION['mensaje'] = "Libro registrado con éxito";
      echo '<script>window.location.href = "registro.php?alerta=exito";</script>';
    } else {
      //  muestra una ventana de error
      $_SESSION['mensaje'] = "Error al registrar el libro";
        echo '<script>window.location.href = "registro.php?alerta=error";</script>';
    }
  }
?>