<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hessen - Reservacion</title>
    <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/resev.css">
    <link rel="stylesheet" href="../css/ventana3_prest.css">
    <link rel="stylesheet" href="../css/busqu_predictiva.css">
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
        .contenedor-sugerencias-autores {
            position: relative;
            width: 100%;
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
    <a href="fisico_stud.php">
        <img class="icono" src="../img/hessen icono.png">
    </a>
    <!--estructura de la pagina-->
    <h1>NUEVA RESERVACION</h1>
    <form action="../php_stud/reserv_nuev.php" method="post" class="fot1">
    <label for="titulo1">Título del Libro:</label>
        <input type="text" id="titulo1" name="titulo1" required onkeyup="buscarLibros()" autocomplete="off">
        <div class="contenedor-sugerencias">
            <div id="sugerencias" style="display: none;"></div>
        </div>
        <label for="autor1">Autor:</label>
        <input type="text" id="autor1" name="autor1" required onkeyup="buscarAutores()" autocomplete="off">
        <div class="contenedor-sugerencias-autores">
            <div id="sugerencias_autores" style="display: none;"></div>
        </div>
        <label for="dni_est">DNI del estudiante (8 dígitos):</label>
        <input type="text" id="dni_est" name="dni_est" pattern="[0-9]{8}" title="El DNI debe contener exactamente 8 dígitos numéricos" required autocomplete="off">

        <button type="submit" name="insertar">Reservar Libro</button>
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
        var inputTitulo = document.getElementById('titulo1');
        var sugerenciasTitulo = document.getElementById('sugerencias');
        var inputAutor = document.getElementById('autor1');
        var sugerenciasAutores = document.getElementById('sugerencias_autores');

        // Agregar un evento de entrada al campo de entrada de título
        inputTitulo.addEventListener('input', function() {
            // Obtener el ancho del campo de entrada de título
            var anchoInputTitulo = inputTitulo.offsetWidth;
            // Establecer el ancho del contenedor de sugerencias de título igual al ancho del campo de entrada de título
            sugerenciasTitulo.style.width = anchoInputTitulo + 'px';
        });

        // Agregar un evento de entrada al campo de entrada de autor
        inputAutor.addEventListener('input', function() {
            // Obtener el ancho del campo de entrada de autor
            var anchoInputAutor = inputAutor.offsetWidth;
            // Establecer el ancho del contenedor de sugerencias de autores igual al ancho del campo de entrada de autor
            sugerenciasAutores.style.width = anchoInputAutor + 'px';
        });
    </script>
    <!-- Scripts adicionales -->
    <script src="../js/alert_reserv.js"></script>
    <script src="../js/buscar_libros.js"></script>
    <script src="../js/buscar_autores.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
