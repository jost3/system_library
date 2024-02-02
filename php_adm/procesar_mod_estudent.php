<?php
session_start();
include('../bd/mostrar_dt.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se han enviado los datos del formulario
    if (isset($_POST['id'], $_POST['nombre'], $_POST['dni'], $_POST['contra'], $_POST['carrera'])) {
        $idAlumno = $_POST['id'];
        $nombres = $_POST['nombre'];
        $dni = $_POST['dni'];
        $contra = $_POST['contra'];
        $carrera = $_POST['carrera'];
    
        // Realiza la actualización en la base de datos
        $actualizarAlumno = "UPDATE alumno SET nombre = '$nombres', dni = '$dni', contra = '$contra', carrera = '$carrera' WHERE id = $idAlumno";
        $ejecutarActualizarAlumno = mysqli_query($conex, $actualizarAlumno);
        if ($ejecutarActualizarAlumno) {
            $_SESSION['mensaje'] = "Datos de alumno modificados con éxito";
            header('Location: estudent_adm.php?alerta=exito');
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al modificar los datos del alumno";
            header('Location: modificar_estudent.php?alerta=error');
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Todos los campos del formulario son obligatorios";
        header('Location: modificar_estudent.php?id=' . $_POST['id'] . '&alerta=error');
        exit();
    }
} else {
    // Si el formulario no se ha enviado correctamente, redirige a una página adecuada
    header('Location: modificar_estudent.php');
    exit();
}
?>
