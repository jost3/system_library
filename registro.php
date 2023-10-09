<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Nuevo Libro</title>
    <link rel="icon" href="img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/ventana2_lib.css">
    <link rel="stylesheet" href="css/regist_principl.css">
    <style>
        body {
            background: url(img/fond23.jpeg);
            background-size: cover; /* La imagen se ajustará al tamaño de la ventana */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-attachment: fixed; /* Evita que la imagen se desplace con el scroll */
        }
    </style>
</head>
<body>
    <a href="inic.php">
        <img class="icono" src="img/hessen icono.png">
    </a>
    <!-- Estructura de la página -->
    <h1> NUEVO LIBRO</h1>
    <form action="db.php" method="post">
        <label for="titulo">Título del Libro:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required>
        <label for="descripcion">Seccion:</label>
        <select id="descripcion" name="descripcion" required>
        <option value="opcion1">Gabinete 1</option>
        <option value="opcion2">Gabinete 2</option>
        <option value="opcion3">Gabinete 3</option>
        <option value="opcion3">Gabinete 4</option>
        <option value="opcion3">Gabinete 5</option>
    <!-- Agrega más opciones según sea necesario -->
    </select>

        <br>
        <button type="submit" name="registro">Registrar Libro</button>

        
        
    </form>

    <div class="overlay" id="overlay"></div>

    <!-- Alerta de éxito -->
    <div id="alertaExito" class="alert-container">
        <div class="alert-text">
            Libro registrado con éxito.
        </div>
        <button class="alert-button" onclick="cerrarAlerta('alertaExito')">Aceptar</button>
    </div>

    <!-- Alerta de error -->
    <div id="alertaError" class="alert-container">
        <div class="alert-text">
            Error al registrar el libro.
        </div>
        <button class="alert-button" onclick="cerrarAlerta('alertaError')">Aceptar</button>
    </div>

    <script src="js/alert_regis_lib.js">
    </script>
</body>
</html>
