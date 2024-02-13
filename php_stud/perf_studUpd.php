<?php
session_start();
if (isset($_POST['logout'])) {
    // Cerrar sesión
    session_destroy();
    header('Location: ../index.html');
    exit();
}
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
if (isset($_POST['update_password'])){

 
    $idEs = $_SESSION['idEst'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Obtener la contraseña actual de la base de datos
    $getPasswordQuery = "SELECT contra FROM alumno WHERE id = '$idEs'";
    $getPasswordResult = mysqli_query($conex, $getPasswordQuery);

    if ($getPasswordResult) {
        $userData = mysqli_fetch_assoc($getPasswordResult);
        $hashedPassword = $userData['contra'];

        // Verificar la contraseña actual ingresada
        if (password_verify($currentPassword, $hashedPassword)) {
            // Contraseña actual es correcta, verificar si las nuevas contraseñas coinciden
            if ($newPassword == $confirmPassword) {
                // Hash de la nueva contraseña
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Actualizar la contraseña en la base de datos
                $updatePasswordQuery = "UPDATE alumno SET contra = '$hashedNewPassword' WHERE id = '$idEs'";
                $updatePasswordResult = mysqli_query($conex, $updatePasswordQuery);

                if ($updatePasswordResult) {
                    // Actualización exitosa de la contraseña
                    $_SESSION['mensaje'] = "Contraseña actualizada con éxito";
                    $_SESSION['tipo_alerta'] = "success";
                    header('Location: perfil_student.php');
                    exit();
                } else {
                    // Error en la actualización de la contraseña
                    $_SESSION['mensaje'] = "Error al actualizar la contraseña";
                    $_SESSION['tipo_alerta'] = "error";
                    header('Location: perfil_student.php');
                    exit();
                }
            } else {
                // Las nuevas contraseñas no coinciden
                $_SESSION['mensaje'] = "Las nuevas contraseñas no coinciden";
                $_SESSION['tipo_alerta'] = "error";
                header('Location: perfil_student.php');
                exit();
            }
        } else {
            // Contraseña actual incorrecta
            $_SESSION['mensaje'] = "Contraseña actual incorrecta";
            $_SESSION['tipo_alerta'] = "error";
            header('Location: perfil_student.php');
            exit();
        }
    } else {
        // Error al obtener la contraseña actual
        $_SESSION['mensaje'] = "Error al obtener la contraseña actual";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: perfil_student.php');
        exit();
    }
}
?>