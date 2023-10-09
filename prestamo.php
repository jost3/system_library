<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo</title>
    <link rel="icon" href="img/hessen icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/buscador.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/tabla.css">
    <style>
       
        body{
            background: url(img/tabl.jpeg);
            background-size: cover; /* La imagen se ajustará al tamaño de la ventana */
            background-repeat: no-repeat; /* Evita la repetición de la imagen */
            background-attachment: fixed; /* Evita que la imagen se desplace con el scroll */
        }
    </style>
    <script>
        // JavaScript para redirigir al botón Atrás
        window.onpopstate = function(event) {
            if (document.referrer.indexOf("prest_nuev.php") !== -1) {
                window.location.href = "prest_nuev.php";
            }
        };
    </script>
    
</head>
<body>
    <a href="inic.php">
        <img class="icono" src="img/hessen icono.png">
    </a>
    <!-- Buscador de la página -->
    <div class="buscad">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="buscar">
            <div class="btn">
                <button type="submit" class="fa fa-search"></button>
            </div>
        </form>
    </div>
       <?php if (isset($_GET['search'])) { ?>
        <a class="mostrar-todos" href="?"><button class="oculto">Mostrar todos</button></a>
        <?php } ?>

    <?php
    include("conex_prest.php");
    
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if ($search) {
        $prestamo = "SELECT * FROM prestamo WHERE 
                 titulo1 LIKE '%$search%'";
     
    } else {
        $prestamo = "SELECT * FROM prestamo";
    }
    ?>

    
    <div class="tabla_general">

        <div class="subtitulos">ID</div>
        <div class="subtitulos">TITULO</div>
        <div class="subtitulos">AUTOR</div>
        <div class="subtitulos">SECCION</div>
        <div class="subtitulos">ESTADO</div>
        <div class="subtitulos">FECHA</div>
        <div class="subtitulos">DNI </div>
        <div class="subtitulos">ESTUDIANTE</div>
        <div class="subtitulos"><a href="prest_nuev.php"> <button type="button" class="a1">nuevo</button> </a></div>
        <?php 
        $result = mysqli_query($conex1, $prestamo);
        while($row=mysqli_fetch_assoc($result)) {?>
        <div class="informacion"><?php  echo $row["id_prest"];?></div>
        <div class="informacion"><?php  echo $row["titulo1"];?></div>
        <div class="informacion"><?php  echo $row["autor1"];?></div>
        <div class="informacion"><?php  echo $row["descripcion1"];?></div>
        <div class="informacion"><?php  echo $row["estado"];?></div>
        <div class="informacion"><?php  echo $row["fecha"];?></div>
        <div class="informacion"><?php  echo $row["dni_est"];?></div>
        <div class="informacion"><?php  echo $row["nombre"];?></div>
        <div class="informacion">
        <button type="button" class="a2" onclick="mostrarModal(<?php echo $row["id_prest"]; ?>)">eliminar</button>
        </div>
    <?php } ?>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>¿Estás seguro de eliminar este libro?</p>
            <button onclick="eliminarLibro1()" class="yes">Sí</button>
            <button onclick="cerrarModal1()" class="nou">No</button>
        </div>
    </div>
    <script src="js/aler_prest-elim.js">
    </script>

</body>
</html>

