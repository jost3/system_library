<?php
session_start();

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario de MySQL es diferente
$password = "";     // Cambia esto si tienes una contraseña configurada
$dbname = "hessen_library";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Consulta SQL para verificar el inicio de sesión
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['usuario'] = $usuario;
    // Establece las cabeceras para evitar el almacenamiento en caché
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    header("Location: inic.php"); // Redirige al archivo inic.php
} else {
    // Inicio de sesión fallido
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

    header("Location: index.html?alerta=incorrecto");
}

// Cerrar la conexión
$conn->close();
?>

