<?php
include '../bd/mostrar_dt.php';
session_start();

if (isset($_POST['registro'])) {
    $tituloLibro = $_POST['titulo1'];
    $dniEstudiante = $_POST['dni_est'];

    // Verificar si el título del libro existe
    $queryLibro = "SELECT id FROM libro WHERE titulo = '$tituloLibro'";
    $resultLibro = mysqli_query($conex, $queryLibro);
    
    if ($resultLibro && mysqli_num_rows($resultLibro) > 0) {
        // Verificar si el DNI del estudiante existe
        $queryEstudiante = "SELECT id FROM alumno WHERE dni = '$dniEstudiante'";
        $resultEstudiante = mysqli_query($conex, $queryEstudiante);

        if ($resultEstudiante && mysqli_num_rows($resultEstudiante) > 0) {
            // Ahora puedes realizar la inserción en la tabla de reservas
            $descripcion1 = $_POST['descripcion1'];
            $autor = $_POST['autor'];
            $queryReserva = "INSERT INTO prestamo (titulo1, dni_est, descripcion1, autor1) VALUES ('$tituloLibro', '$dniEstudiante', '$descripcion1','$autor')";
            
            // Ejecuta la consulta de inserción
            $resultReserva = mysqli_query($conex, $queryReserva);

            if ($resultReserva) {
                echo "Reserva exitosa.";
            } else {
                echo "Error al realizar la reserva.";
            }
        } else {
            echo "Error: El DNI del estudiante no existe.";
        }
    } else {
        echo "Error: El título del libro no existe.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conex);
}
?>