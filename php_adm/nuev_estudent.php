<?php 
include('../bd/mostrar_dt.php');

if(isset($_POST['insertar'])){
    // Recibe los datos del formulario
    $id_alumno =mysqli_real_escape_string ($conex,$_POST['id']);
    $nombres =mysqli_real_escape_string ($conex,$_POST['Nombre']);
    $dni = mysqli_real_escape_string  ($conex,$_POST['dni']);
    $contra = mysqli_real_escape_string ($conex,$_POST['contra']);
    $carrera = mysqli_real_escape_string ($conex,$_POST['carrera']);

    $hashed_password = password_hash($contra, PASSWORD_DEFAULT);
    // Realiza la inserción en la tabla correspondiente
    $insertarDatos1 = "INSERT INTO alumno (id, Nombre, dni, contra, carrera) VALUES ('$id_alumno', '$nombres', '$dni', '$hashed_password', '$carrera')";
    $ejecutarInsertar1 = mysqli_query($conex, $insertarDatos1);

    if ($ejecutarInsertar1) {
        // Redirige a estudent_adm.php
        header('Location: estudent_adm.php?alerta=exito');
        exit();
    } else {
        // Redirige con un mensaje de error
        header('Location: new_estudent.php?alerta=error');
        exit();
    }
}
?>
