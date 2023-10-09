<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prestamo nuevo</title>
    <link rel="icon" href="img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/est_nuev_prest.css">
    <link rel="stylesheet" href="css/ventana3_prest.css">
    <style>
        body {
            background: url(img/fond23.jpeg);
            background-size: cover; /* La imagen se ajustará al tamaño de la ventana */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-attachment: fixed; /* Evita que la imagen se desplace con el scroll */
        }
        @media (max-width: 768px) {
        .icono {
            width: 4rem; /* Tamaño más pequeño para pantallas pequeñas */
        }
    }
    </style>
</head>
<body>
    <a href="prestamo.php">
        <img class="icono" src="img/hessen icono.png">
    </a>
    <!--estructura de la pagina-->
    <h1>NUEVO PRESTAMO</h1>
    <form action="nuev_prest.php" method="post">
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

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" required>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="dni_est">DNI del estudiante:</label>
        <input type="number" id="dni_est" name="dni_est" required>

        <label for="nombre">Nombre del estudiante:</label>
        <input type="text" id="nombre" name="nombre" required>

        <!-- Otros campos relevantes para el registro del libro -->

        <button type="submit" name="insertar">Registrar Libro</button>
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

    <script src="js/aler_prest_nuev.js">
    </script>
</body>
</html>