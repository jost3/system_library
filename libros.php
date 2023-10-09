<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro</title>
    <link rel="icon" href="img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/buscador.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/tab_libr.css">
    <style>
         .restablecimiento {
            margin-top: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            position: absolute;
            right: 100px;
            top: 20px;

        }
        body{
            font-family: monospace;
            background: url(img/tabl.jpeg);
            background-size: cover; /* La imagen se ajustará al tamaño de la ventana */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-attachment: fixed; /* Evita que la imagen se desplace con el scroll */
        }
        /*estilo de la imagen hessen icono*/
        .icono{
            position: absolute;
            top: 0;
            right: 100;
            max-width: 100%;
            width: 6rem; /* Tamaño deseado */
            height: auto; /* Tamaño deseado */
        }
        @media (max-width: 768px) {
            .icono {
                width: 4rem; /* Tamaño más pequeño para pantallas pequeñas */
            }
        }

         /* Estilo para la clase "lib_a2" */
        .lib_a2 {
            background-color: #f57573; /* Cambia el color de fondo a tu preferencia */
            color: white; /* Cambia el color del texto a tu preferencia */
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
            .titulos, .dato {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #000000; /* Agrega bordes a las celdas */
            padding: 4px; /* Añade un poco de espacio dentro de las celdas */
        }

        .titulos {
            font-weight: bold;
            font-size: 1.5em;
            background-color: hsl(209, 93%, 53%); /* Cambia el color de fondo de los títulos de columna */
        }

    </style>
</head>
<body>
    <a href="inic.php">
        <img class="icono" src="img/hessen icono.png">
    </a>
    <!-- Buscador de la página -->
    <div class="buscad">
        <form method="GET" action="">
            <input type="text" name="search1" placeholder="Buscar">
            <div class="btn">
                <button type="submit" class="fa fa-search"></button>
            </div>
        </form>
    </div>
    
    <?php if (isset($_GET['search1'])) { ?>
        <a class="restablecimiento" href="?"><button class="oculto">Mostrar todos</button></a>
    <?php } ?>

    <?php
        include("mostrar_dt.php");

        $search1 = isset($_GET['search1']) ? $_GET['search1'] : '';
        if ($search1) {
            $consulta = "SELECT * FROM libro WHERE 
                titulo LIKE '%$search1%'";
        } else {
            $consulta = "SELECT * FROM libro";
        }
    ?> 
    
    <div class="tabla_libros">
        <div class="titulos">ID</div>
        <div class="titulos">TITULO</div>
        <div class="titulos">AUTOR</div>
        <div class="titulos">SECCION</div>
        <div class="titulos">ELIMINAR</div>
        <?php  
            $resultado= mysqli_query($conex, $consulta);
            while($row=mysqli_fetch_assoc($resultado)) {
        ?>
            <div class="dato "><?php  echo $row["id"];?></div>
            <div class="dato"><?php  echo $row["titulo"];?></div>
            <div class="dato"><?php  echo $row["autor"];?></div>
            <div class="dato"><?php  echo $row["descripcion"];?></div>
            <div class="dato">
                <button type="button" class="lib_a2" onclick="mostrarModal(<?php echo $row["id"]; ?>)">Eliminar</button>
            </div>
        <?php } ?> 
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>¿Estás seguro de eliminar este libro?</p>
            <button onclick="eliminarLibro()" class="yes">Sí</button>
            <button onclick="cerrarModal()"class="nou">No</button>
        </div>
    </div>
    
    <script src="js/alert_elim_lib1.js"></script>    
</body>
</html>