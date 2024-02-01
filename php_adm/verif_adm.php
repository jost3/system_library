
<?php
session_start();
include('../bd/conex_prest.php');

if (isset($_POST['registro'])) {
    $id = mysqli_real_escape_string($conex1, $_POST['id']);
    $usuario = mysqli_real_escape_string($conex1, $_POST['usuario']);
    $correo = mysqli_real_escape_string($conex1, $_POST['correo']);
    $rol = mysqli_real_escape_string($conex1, $_POST['rol']);
    $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $password = mysqli_real_escape_string($conex1, $_POST['password']);
    // Encripta la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $insertarUsuario = "INSERT INTO usuarios (id, usuario, correo, rol, password, foto) VALUES ('$id', '$usuario', '$correo', '$rol', '$hashed_password', '$imagen')";
    $resultado = mysqli_query($conex1, $insertarUsuario);

    if ($resultado) {
        $_SESSION['mensaje'] = "Administrador creado con éxito";
        header('Location: new_adm.php?alerta=exito');
    } else {
        $_SESSION['mensaje'] = "Error al crear el administrador";
        header('Location: new_loan.php?alerta=error');
    }
}
?>