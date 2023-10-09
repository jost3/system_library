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
$usuario1 = $_POST['user'];
$contraseña1 = $_POST['contra1'];

// Consulta SQL para verificar el inicio de sesión
$sql = "SELECT * FROM alumno WHERE dni='$usuario1' AND contra='$contraseña1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['user'] = $usuario1;
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
