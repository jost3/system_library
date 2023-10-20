<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hessen - Reservacion</title>
    <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/resev.css">
    <link rel="stylesheet" href="../css/ventana3_prest.css">
    
</head>
<style>
    .icono{
    width: 80px;
    height: auto;
    display: block;
    margin: 0 auto;
}
</style>
<body>
    <a href="fisico_stud.php">
        <img class="icono" src="../img/hessen icono.png">
    </a>
    <!--estructura de la pagina-->
    <h1>NUEVA RESERVACION</h1>
    <form action="../php_stud/reserv_nuev.php" method="post" class="fot1">
        <label for="titulo1">Título del Libro:</label>
        <input type="text" id="titulo1" name="titulo1" required>

        <label for="autor1">Autor:</label>
        <input type="text" id="autor1" name="autor1" required>

        <label for="descripcion1">SECCION:</label>
        <select id="descripcion1" name="descripcion1" required>
        <option value="opcion1">Gabinete 1</option>
        <option value="opcion2">Gabinete 2</option>
        <option value="opcion3">Gabinete 3</option>
        <option value="opcion4">Gabinete 4</option>
        <option value="opcion5">Gabinete 5</option>
    <!-- Agrega más opciones según sea necesario -->
    </select>
        <label for="nombre">Nombre del estudiante:</label>
        <input type="text" id="nombre" name="nombre" required>

        <!-- Otros campos relevantes para el registro del libro -->

        <button type="submit" name="insertar">Reservar Libro</button>
    </form>

    <div class="overlay1" id="overlay1"></div>

    <!-- Alerta de éxito -->
    <div id="alertaExito" class="alert-container">
        <div class="alert-text">
            Prestamo registrado con exito.
        </div>
        <button class="alert-button" onclick="cerrarAlerta('alertaExito')">Aceptar</button>
    </div>
    <!-- Alerta de error -->
    <div id="alertaError" class="alert-container">
        <div class="alert-text">
            Error al registrar el prestamo.
        </div>
        <button class="alert-button" onclick="cerrarAlerta('alertaError')">Aceptar</button>
    </div>
    <script src="../js/alert_reserv.js"></script>
</body>
</body>
</html>