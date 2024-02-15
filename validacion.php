<?php
session_start();
include('bd/mostrar_dt.php');
session_regenerate_id(true);
// Verificar la conexión
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

// Obtener datos del formulario
$usuario = $conex->real_escape_string($_POST['usuario']);
$contraseña = $_POST['password'];

// Consulta SQL para verificar el inicio de sesión
$stmt = $conex->prepare("SELECT id, usuario, correo, rol, telefono, password, foto FROM usuarios WHERE usuario=?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verificar la contraseña utilizando password_verify
        if (password_verify($contraseña, $hashedPassword)) {
            // Inicio de sesión exitoso
            $_SESSION['idUsuario'] = $row['id'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['correoUsuario'] = $row['correo'];
            $_SESSION['telfUsuario'] = $row['telefono'];
            $_SESSION['fotoUsuario'] = $row['foto'];
            $_SESSION['rolUsuario'] = $row['rol'];

            // Redirige al archivo inic.php
            header("Location: php_adm/inic.php");
            exit();
        }
    }
}

// Si llegamos aquí, el inicio de sesión ha fallado
// Redirige a la página de inicio con una alerta de incorrecto
header("Location: index.html?alerta=incorrecto");
exit();
$stmt->close();
$conex->close();
?>



