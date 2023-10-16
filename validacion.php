<?php
session_start();

include('bd/mostrar_dt.php');

// Verificar la conexión
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Consulta SQL para verificar el inicio de sesión
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$result = $conex->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['usuario'] = $usuario;
    // Establece las cabeceras para evitar el almacenamiento en caché
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    header("Location: php_adm/inic.php"); // Redirige al archivo inic.php
} else {
    // Inicio de sesión fallido
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

    header("Location: index.html?alerta=incorrecto");
}

// Cerrar la conexión
$conex->close();
?>

