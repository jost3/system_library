<?php
session_start();
include('../bd/mostrar_dt.php');
if (isset($_POST['update'])) {
    $idEs = $_SESSION['idEst'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dni = $_POST['dni'];
    $carrera = $_POST['carrera'];
    // Realizar la actualización en la base de datos
    $query = "UPDATE alumno SET Nombre = '$name', correo = '$email', telefono = '$phone', dni = '$dni', carrera = '$carrera' WHERE id = '$idEs'";
    $result = mysqli_query($conex, $query);

    if ($result) {
        // Actualización exitosa
        $_SESSION['mensaje'] = "Datos actualizados con éxito";
        $_SESSION['tipo_alerta'] = "success";
        header('Location: perfil_student.php');
        exit();
     
    } else {
        // Error en la actualización
        $_SESSION['mensaje'] = "Error al actualizar datos";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: perfil_student.php');
        exit();
        
    }
}
?>