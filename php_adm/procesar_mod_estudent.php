<?php
session_start();
include('../bd/mostrar_dt.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se han enviado los datos del formulario
    if (isset($_POST['id'], $_POST['nombre'], $_POST['dni'], $_POST['carrera'])) {
        $idAlumno = $_POST['id'];
        $nombres = $_POST['nombre'];
        $dni = $_POST['dni'];
        $carrera = $_POST['carrera'];
    
        // Realiza la actualización en la base de datos
        $actualizarAlumno = "UPDATE alumno SET nombre = '$nombres', dni = '$dni', carrera = '$carrera' WHERE id = $idAlumno";
        $ejecutarActualizarAlumno = mysqli_query($conex, $actualizarAlumno);
        
        // Verifica si se ha presionado el botón de restablecer contraseña
        if (isset($_POST['resetear_contra'])) {
            // Establece la nueva contraseña como "ambo"
            $nueva_contra = 'ambo';
            
            // Hashea la nueva contraseña
            $hashed_nueva_contra = password_hash($nueva_contra, PASSWORD_DEFAULT);
            
            // Actualiza la contraseña en la base de datos
            $actualizarContra = "UPDATE alumno SET contra='$hashed_nueva_contra' WHERE id='$idAlumno'";
            $ejecutarActualizarContra = mysqli_query($conex, $actualizarContra);
        }

          if ($ejecutarActualizarAlumno && (!$ejecutarActualizarContra || $ejecutarActualizarContra)) {
            $_SESSION['mensaje'] = "Datos de alumno modificados con éxito";
            $_SESSION['tipo_alerta'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al modificar los datos del alumno";
            $_SESSION['tipo_alerta'] = "error";
        }
        header('Location: estudent_adm.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "Todos los campos del formulario son obligatorios";
        $_SESSION['tipo_alerta'] = "warning";
        header('Location: modificar_estudent.php?id=' . $_POST['id']);
        exit();
    }
} else {
    // Si el formulario no se ha enviado correctamente, redirige a una página adecuada
    header('Location: modificar_estudent.php');
    exit();
}
?>
