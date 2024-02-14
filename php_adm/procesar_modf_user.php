<?php
session_start();
include('../bd/mostrar_dt.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = mysqli_real_escape_string($conex, $_POST['id']);
    $usuario = mysqli_real_escape_string($conex, $_POST['usuario']);
    $correo = mysqli_real_escape_string($conex, $_POST['correo']);
    $telefono = mysqli_real_escape_string($conex, $_POST['telefono']);
    $rol = mysqli_real_escape_string($conex, $_POST['rol']);

    // Manejo de la imagen si se ha proporcionado una nueva
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $actualizarUsuario = "UPDATE usuarios SET usuario='$usuario', correo='$correo', telefono='$telefono', rol='$rol', foto='$imagen' WHERE id=$idUsuario";
    } else {
        // No se ha proporcionado una nueva imagen
        $actualizarUsuario = "UPDATE usuarios SET usuario='$usuario', correo='$correo', telefono='$telefono', rol='$rol' WHERE id=$idUsuario";
    }

    $resultado = mysqli_query($conex, $actualizarUsuario);

    if ($resultado) {
        $_SESSION['mensaje'] = "Usuario actualizado con éxito";
        $_SESSION['tipo_alerta'] = "success";
        header('Location: adm_register.php');
        exit();
    } else {
        $_SESSION['mensaje'] = "Error al actualizar el usuario";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: adm_register.php');
        exit();
    }
} else {
    $_SESSION['mensaje'] = "Método de solicitud no válido";
    $_SESSION['tipo_alerta'] = "error";
    header('Location: adm_register.php');
    exit();
}
?>
