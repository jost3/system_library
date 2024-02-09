<?php
include '../bd/mostrar_dt.php';
session_start();

if(isset($_POST['registro'])) {

    // Sanitizar entradas y preparar consultas
    $titulo1 = mysqli_real_escape_string($conex, $_POST['titulo1']);
    $descripcion1 = mysqli_real_escape_string($conex, $_POST['descripcion1']);
    $dni_est = mysqli_real_escape_string($conex, $_POST['dni_est']);

    // Consulta para verificar si el libro existe en la base de datos
    $consultaLibro = "SELECT id, descripcion FROM libro WHERE titulo = '$titulo1' AND descripcion = '$descripcion1'";
    $resultadoLibro = mysqli_query($conex, $consultaLibro);

    if(!$resultadoLibro) {
        // Manejar el error en la consulta SQL
        $_SESSION['mensaje'] = "Error en la consulta de verificación del libro: " . mysqli_error($conex);
        header("Location: reserva.php?alerta=error");
        exit();
    }

    if(mysqli_num_rows($resultadoLibro) > 0) {
        // El libro existe, proceder con la inserción del préstamo
        $filaLibro = mysqli_fetch_assoc($resultadoLibro);
        $id_libro = $filaLibro['id'];
        $descripcion_libro = $filaLibro['descripcion']; // Obtener la descripción del libro

        // Consulta para verificar si el estudiante existe en la base de datos
        $consultaEstudiante = "SELECT dni FROM alumno WHERE dni = '$dni_est'";
        $resultadoEstudiante = mysqli_query($conex, $consultaEstudiante);

        if(!$resultadoEstudiante) {
            // Manejar el error en la consulta SQL
            $_SESSION['mensaje'] = "Error en la consulta de verificación del estudiante: " . mysqli_error($conex);
            header("Location: reserva.php?alerta=error");
            exit();
        }

        if(mysqli_num_rows($resultadoEstudiante) > 0) {
            // El estudiante existe, proceder con la inserción del préstamo
            $fecha_prestamo = date("Y-m-d"); // Obtener la fecha actual

            // Inserción del préstamo en la tabla prestamo
            $queryInsertPrestamo = "INSERT INTO prestamo (id_prest, titulo1, descripcion1, dni_est, fecha) VALUES ('$id_libro', '$titulo1', '$descripcion_libro', '$dni_est', '$fecha_prestamo')";
            $resultadoInsertPrestamo = mysqli_query($conex, $queryInsertPrestamo);

            if($resultadoInsertPrestamo) {
                $_SESSION['mensaje'] = "Préstamo registrado con éxito";
                header("Location: reserva.php?alerta=exito");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al registrar el préstamo: " . mysqli_error($conex);
                header("Location: reserva.php?alerta=error");
                exit();
            }
        } else {
            $_SESSION['mensaje'] = "El estudiante no está registrado";
            header("Location: reserva.php?alerta=error");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "El libro no está registrado";
        header("Location: reserva.php?alerta=error");
        exit();
    }
} else {
    // Redireccionar si no se envió el formulario correctamente
    header("Location: reserva.php");
    exit();
}
?>
