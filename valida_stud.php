<?php
session_start();

include('bd/mostrar_dt.php');

// Verificar la conexión
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

// Obtener datos del formulario
$usuario1 = $_POST['user'];
$contraseña1 = $_POST['contra1'];

// Consulta SQL para verificar el inicio de sesión
$sql = "SELECT * FROM alumno WHERE dni='$usuario1' AND contra='$contraseña1'";
$result = $conex->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['user'] = $usuario1;
    // Establece las cabeceras para evitar el almacenamiento en caché
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    header("Location: php_stud/inicio_stud.php"); // Redirige al archivo inic.php
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
