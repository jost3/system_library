<?php 
session_start();
include('../bd/mostrar_dt.php');

if(isset($_POST['insertar'])){
    // Recibe los datos del formulario
    $id_alumno =mysqli_real_escape_string ($conex,$_POST['id']);
    $nombres =mysqli_real_escape_string ($conex,$_POST['Nombre']);
    $dni = mysqli_real_escape_string  ($conex,$_POST['dni']);
    $contra = mysqli_real_escape_string ($conex,$_POST['contra']);
    $carrera = mysqli_real_escape_string ($conex,$_POST['carrera']);
    $telefono = mysqli_real_escape_string ($conex,$_POST['telefono']);
    $correo = mysqli_real_escape_string ($conex,$_POST['correo']);

    $hashed_password = password_hash($contra, PASSWORD_DEFAULT);
    // Realiza la inserción en la tabla correspondiente
    $insertarDatos1 = "INSERT INTO alumno (id, Nombre, dni, contra, carrera, telefono, correo) VALUES ('$id_alumno', '$nombres', '$dni', '$hashed_password', '$carrera','$telefono','$correo')";
    $ejecutarInsertar1 = mysqli_query($conex, $insertarDatos1);

    if ($ejecutarInsertar1) {
        $_SESSION['mensaje'] = "Alumno registrado correctamente";
        $_SESSION['tipo_alerta'] = "success";
        header('Location: estudent_adm.php');
        exit();
    } else {
        // Redirige con un mensaje de error
        $_SESSION['mensaje'] = "Error al registrar alumno";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: new_estudent.php');
        exit();
    }
}
?>
