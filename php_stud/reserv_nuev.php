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
        // Verificar si el DNI del estudiante existe y obtener su nombre
        $queryEstudiante = "SELECT id, Nombre, dni FROM alumno WHERE dni = '$dniEstudiante'";
        $resultEstudiante = mysqli_query($conex, $queryEstudiante);

        if ($resultEstudiante && mysqli_num_rows($resultEstudiante) > 0) {
            // Obtener información del estudiante
            $filaEstudiante = mysqli_fetch_assoc($resultEstudiante);
            $idEstudiante = $filaEstudiante['id'];
            $nombreEstudiante = $filaEstudiante['Nombre'];
            $dniGuardado = $filaEstudiante['dni'];

            // Obtener el DNI almacenado en la sesión
            $dniSesion = $_SESSION['dni'];

            // Verificar si el DNI coincide con el DNI almacenado en la sesión
            if ($dniEstudiante === $dniSesion) {
                // Obtener la fecha de la última reserva realizada por el usuario
                $fechaUltimaReserva = $_SESSION['fechaUltimaReserva'];

                // Obtener la fecha actual
                $fechaActual = date("Y-m-d");

                // Verificar si ya se realizó una reserva hoy
                if ($fechaUltimaReserva === $fechaActual) {
                    $_SESSION['mensaje'] = "Error: Ya has realizado una reserva hoy";
                    $_SESSION['tipo_alerta'] = "error";
                    header('Location: reserva.php');
                    exit();
                }

                // Guardar el ID del estudiante en la sesión
                $_SESSION['idEst'] = $idEstudiante;
                $_SESSION['fechaUltimaReserva'] = $fechaActual;

                $estd = 'Pendiente';
                $fechaActual = date("Y-m-d");

                // Ahora puedes realizar la inserción en la tabla de reservas
                $descripcion1 = $_POST['descripcion1'];
                $autor = $_POST['autor'];
                $queryReserva = "INSERT INTO prestamo (titulo1, dni_est, descripcion1, autor1, nombre, estado, fecha) VALUES ('$tituloLibro', '$dniEstudiante', '$descripcion1','$autor', '$nombreEstudiante','$estd', '$fechaActual')";

                // Ejecuta la consulta de inserción
                $resultReserva = mysqli_query($conex, $queryReserva);

                if ($resultReserva) {
                    $_SESSION['mensaje'] = "Reservación registrada con éxito";
                    $_SESSION['tipo_alerta'] = "success";
                    header('Location: reserva.php');
                    exit();
                } else {
                    $_SESSION['mensaje'] = "Error al registrar Reserva";
                    $_SESSION['tipo_alerta'] = "error";
                    header('Location: reserva.php');
                    exit();
                }
            } else {
                $_SESSION['mensaje'] = "Error: El DNI es incorrecto";
                $_SESSION['tipo_alerta'] = "error";
                header('Location: reserva.php');
                exit();
            }
        } else {
            $_SESSION['mensaje'] = "Error: El DNI no existe";
            $_SESSION['tipo_alerta'] = "error";
            header('Location: reserva.php');
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "El libro no existe";
        $_SESSION['tipo_alerta'] = "error";
        header('Location: reserva.php');
        exit();
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conex);
}
?>

