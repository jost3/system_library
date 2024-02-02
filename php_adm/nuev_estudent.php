<?php 
include('../bd/mostrar_dt.php');

if(isset($_POST['insertar'])){
    // Recibe los datos del formulario
    $id_alumno = $_POST['id'];
    $nombres = $_POST['Nombre'];
    $dni = $_POST['dni'];
    $contra = $_POST['contra'];
    $carrera = $_POST['carrera'];

    // Realiza la inserción en la tabla correspondiente
    $insertarDatos1 = "INSERT INTO alumno (id, Nombre, dni, contra, carrera) VALUES ('$id_alumno', '$nombres', '$dni', '$contra', '$carrera')";
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
