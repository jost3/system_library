<?php
include '../bd/mostrar_dt.php';
session_start();

if(isset($_POST['insertar'])){
    $titulo1 = $_POST['titulo1'];
    $autor1 = $_POST['autor1'];
    $dni_est = $_POST['dni_est'];

    // Verificar si el autor está asociado con el título del libro en la base de datos
    $consultaAutorTitulo = "SELECT * FROM libro WHERE titulo = '$titulo1' AND autor = '$autor1'";
    $resultadoAutorTitulo = mysqli_query($conex, $consultaAutorTitulo);

    if(mysqli_num_rows($resultadoAutorTitulo) > 0){
        // Autor asociado con el título del libro, proceder con el préstamo

        // Obtener descripción del libro
        $filaLibro = mysqli_fetch_assoc($resultadoAutorTitulo);
        $descripcion1 = $filaLibro['descripcion'];

        // Obtener nombre del estudiante
        $consultaAlumno = "SELECT nombre FROM alumno WHERE dni = '$dni_est'";
        $resultadoAlumno = mysqli_query($conex, $consultaAlumno);

        if(mysqli_num_rows($resultadoAlumno) > 0){
            // Nombre de estudiante encontrado, proceder con el préstamo

            $filaAlumno = mysqli_fetch_assoc($resultadoAlumno);
            $nombre = $filaAlumno['nombre'];

            // Generar la fecha actual
            $fecha = date('Y-m-d');

            // Insertar los datos en la tabla de préstamo con estado "pendiente"
            $estado = "pendiente"; // Estado por defecto
            $insertarDatos = "INSERT INTO prestamo (titulo1, autor1, descripcion1, estado, fecha, dni_est, nombre) VALUES ('$titulo1', '$autor1', '$descripcion1', '$estado', '$fecha', '$dni_est', '$nombre')";
            $ejecutarInsertar = mysqli_query($conex, $insertarDatos);

            if($ejecutarInsertar){
                $_SESSION['mensaje'] = "Libro registrado con éxito";
                echo '<script>window.location.href = "reserva.php?alerta=exito";</script>';
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al registrar el libro";
                header("Location: reserv_nuev.php?alerta=error");
                exit();
            }
        } else {
            $_SESSION['mensaje'] = "No se encontraron datos del estudiante con el DNI proporcionado";
            header("Location: reserv_nuev.php?alerta=error");
            exit();
        }
    } else {
        // Autor no asociado con el título del libro, no se puede proceder con el préstamo
        $_SESSION['mensaje'] = "El autor no está asociado con el título del libro";
        header("Location: reserv_nuev.php?alerta=error");
        exit();
    }
}
?>
