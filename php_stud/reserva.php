<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hessen - Reservacion</title>
    <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/ventana3_prest.css">
    <link rel="stylesheet" href="../css/busqu_predictiva.css">
    <link rel="stylesheet" href="../css/princ_stud.css">
    <link rel="stylesheet" href="../css1/azzara.min.css">
    <style>
        .icono {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .contenedor-sugerencias {
            position: relative;
            width: 100%;
        }
        #tm a {
        font-size: 15px; /* Puedes ajustar el valor según tus preferencias */
        }
        #navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000; /* Ajusta el valor de z-index según tus necesidades */

        }
        #navbar .form-control {
        width: 220px; /* Ajusta el ancho según tus preferencias */
        }

        /* Ajustes para los botones de sugerencia */
        .sugerencia {
            width: 100%; /* Mismo ancho para todos los botones */
            border: none; /* Eliminar borde */
            background: none; /* Fondo transparente */
            text-align: left; /* Alinear texto a la izquierda */
            padding: 8px 12px; /* Espaciado interno */
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .sugerencia:hover {
            background-color: #f0f0f0; /* Cambiar color de fondo al pasar el ratón */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="inicio_stud.php"><img src="../img/hessen2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" id="tm">
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="inicio_stud.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link active" href="fisico_stud.php">Libros fisicos</a></li>
                        <li class="nav-item"><a class="nav-link" href="reserva.php">Reservar</a></li>
                        <li class="nav-item"><a class="nav-link" href="perfil_student.php">Perfil</a></li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" id="buscar" aria-label="Buscar" name="busc1">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="colr py-5 mt-5" >
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">RESERVA UN LIBRO</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Recuerda acercarte a  la direccion para completar el prestamo </p>
                </div>
            </div>
        </header>
        <br><br>
        <form action="reserv_nuev.php" method="post">
			<div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Registre los datos</div>
                    </div>
                    <div class="card-body">

                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelTitulo" type="text" class="form-control input-border-bottom" name="titulo1" required onkeyup="buscarLibros()" autocomplete="off">
                            <label for="inputFloatingLabelTitulo" class="placeholder">Titulo de libro</label>
                        </div>
                        <div class="contenedor-sugerencias">
                            <div id="sugerencias" style="display: none;"></div>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelDescripcion" type="text" class="form-control input-border-bottom" name="descripcion1" required autocomplete="off">
                            <label for="inputFloatingLabelDescripcion" class="placeholder">Descripcion</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabelEdicion" type="text" class="form-control input-border-bottom" name="dni_est"  pattern="[0-9]{8}" title="El DNI debe contener exactamente 8 dígitos numéricos" required autocomplete="off">
                            <label for="inputFloatingLabelEdicion" class="placeholder">Dni</label>
                        </div>
                        <div class="card-action text-center">
                            <button class="btn btn-primary" name="registro">Reservar Libro</button>
                        </div>
                    </div>
                </div>
            </div>
	    </form>

    <div class="overlay1" id="overlay1"></div>
        <!-- Alerta de éxito -->
        <div id="alertaExito" class="alert-container">
            <div class="alert-text">
                Prestamo registrado con éxito.
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

    <!-- Script para ajustar el ancho del contenedor de sugerencias -->
    <script>
        // Obtener el campo de entrada y el contenedor de sugerencias
        var inputTitulo = document.getElementById('inputFloatingLabelTitulo');
        var sugerenciasTitulo = document.getElementById('sugerencias');
        

        // Agregar un evento de entrada al campo de entrada de título del libro
        inputTitulo.addEventListener('input', function() {
            // Obtener el ancho del campo de entrada de título
            var anchoInputTitulo = inputTitulo.offsetWidth;
            // Establecer el ancho del contenedor de sugerencias de título igual al ancho del campo de entrada de título
            sugerenciasTitulo.style.width = anchoInputTitulo + 'px';
        });

    </script>
    <!-- Scripts adicionales -->
    <script src="../js/alert_reserv.js"></script>
    <script src="../js/buscar_libros.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
