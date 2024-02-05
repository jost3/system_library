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
$sql = "SELECT contra FROM alumno WHERE dni='$usuario1'";
$result = $conex->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['contra'];

        // Verificar la contraseña utilizando password_verify
        if (password_verify($contraseña1, $hashedPassword)) {
            // Inicio de sesión exitoso
            // Redirige al archivo inic.php
            header("Location: php_adm/inic.php");
            exit();
        }
    }
}
header("Location: index.html?alerta=incorrecto");
// Cerrar la conexión
$conex->close();
?>
