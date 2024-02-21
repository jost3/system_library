<?php
session_start();
include('bd/mostrar_dt.php');
session_regenerate_id(true);
// Verificar la conexión
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

// Obtener datos del formulario
$usuario1 = $conex->real_escape_string($_POST['user']);
$contraseña1 = $_POST['contra1'];

// Consulta SQL para verificar el inicio de sesión
$stmt = $conex->prepare("SELECT id, Nombre, contra, correo, telefono, dni, carrera FROM alumno WHERE dni=?");
$stmt->bind_param("s", $usuario1);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['contra'];

        // Verificar la contraseña utilizando password_verify
        if (password_verify($contraseña1, $hashedPassword)) {
            // Inicio de sesión exitoso
            $_SESSION['idEst'] = $row['id'];
            $_SESSION['student'] = htmlspecialchars($row['Nombre'], ENT_QUOTES, 'UTF-8');
            $_SESSION['email'] = $row['correo'];
            $_SESSION['phone'] = $row['telefono']; 
            $_SESSION['dni'] = $row['dni'];
            $_SESSION['carrera'] = $row['carrera'];
            $token = bin2hex(random_bytes(32));

            // Guardar el token en la sesión
            $_SESSION['token'] = $token;
            $_SESSION['last_action1'] = time();
            // Redirige al archivo inic.php
            header("Location: php_stud/inicio_stud.php");
            exit();
        }
    }
}
header("Location: index.html?alerta=incorrecto");
// Cerrar la conexión
$stmt->close();
$conex->close();
?>
