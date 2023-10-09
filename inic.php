<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="icon" href="img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/princpl.css">

    <style>
        body {
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-size: cover;
            background: url(img/inicio.jpeg);
            background-size: cover; /* La imagen se ajustará al tamaño de la ventana */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-attachment: fixed; /* Evita que la imagen se desplace con el scroll */
        }
        /* Estilo para los botones */
        .menu li a {
            padding: 20px 20px; /* Reducido el relleno interno */
            min-width: 100px; /* Ancho mínimo del botón */
            max-width: 150px; /* Ancho máximo del botón */
            text-align: left; /* Centra el texto en el botón */
        }
    </style>
</head>
<body>
    <a href="#">
        <img class="icono" src="img/hessen icono.png">
    </a>
    <!--barra de menú de la página-->
    <ul class="menu">
        <li><a href="prestamo.php">PRESTAMO</a></li>
        <li><a href="registro.php">NUEVO</a></li>
        <li><a href="libros.php">LIBRO</a></li>
    </ul>
    <!--imagenes de uso para la pagina-->   
    <center style="margin-top: 100px;">
        <br><br><br><br><br></brz><div class="p10">
            <span style="--i:1;"><img src="img/primero.png" alt=""></span>
            <span style="--i:2;"><img src="img/segundo.jpeg" alt=""></span>
            <span style="--i:3;"><img src="img/tercero.png" alt=""></span>
            <span style="--i:4;"><img src="img/cuarto.png" alt=""></span>
            <span style="--i:5;"><img src="img/quinto.png" alt=""></span>
            <span style="--i:6;"><img src="img/sexto.png" alt=""></span>
            <span style="--i:7;"><img src="img/septimo.png" alt=""></span>
            <span style="--i:8;"><img src="img/octavo.png" alt=""></span>
        </div>
    </center>
    <button id="salirBtn" class="salimos">Salir</button>
    <script>
       

        // Agregar un evento click al botón "Salir" para permitir la salida
        document.getElementById("salirBtn").addEventListener("click", function () {
            var confirmacion = confirm("¿Estás seguro de que deseas salir de la página?");
            if (confirmacion) {
                window.location.href = "index.html";
            }
        });
    </script>
</body>
</html>