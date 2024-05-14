<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['student']) || !isset($_SESSION['token'])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: ../index.html');
    exit();
}
if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
    header("Location: index.html?alerta=incorrecto");
    exit();
}
$tiempoInactividad1 = 1800;
if (isset($_SESSION['last_action1'])) {
    $tiempoTranscurrido1 = time() - $_SESSION['last_action1'];

    if ($tiempoTranscurrido1 > $tiempoInactividad1) {
        // Ha pasado más de 10 minutos, redirige al index.html
        header("Location: ../index.html?alerta=sesion-expirada");
        exit();
    } elseif ($tiempoTranscurrido1 > 0) {
        // Si hay interacción después de los 10 minutos, regenera el token y actualiza el timestamp
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $_SESSION['last_action1'] = time();
    }
}
$_SESSION['last_action1'] = time();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hessen - Bibloteca Virtual</title>
        <link rel="icon" href="../img/hessen icono.png" type="image/x-icon">
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="../css/princ_stud.css">
        <link rel="stylesheet" href="../css1/azzara.min.css">

    </head>
    <style>
        .filtro{
            display: none;
            }
        .navbar-scroll {
        background-color: rgba(255, 255, 255, 0.9) !important; /* Ajusta el último valor (0.9) para controlar la opacidad */
        transition: background-color 0.3s ease; /* Agrega una transición suave */
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
       
    </style>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#"><img src="../img/hessen2.png" alt=""></a>
            <!-- Botón de hamburguesa para dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Elementos de navegación -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4" id="tm">
                    <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'inicio_stud.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="inicio_stud.php">Inicio</a>
                    </li>
                    <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'fisico_stud.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="fisico_stud.php">Libros físicos</a>
                    </li>
                    <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'reserva.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="reserva.php">Reservar</a>
                    </li>
                    <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'perfil_student.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="perfil_student.php">Perfil</a>
                    </li>
                </ul>
                <!-- Barra de búsqueda -->
                <form class="d-flex" id="search_form_medicina">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="digit">
                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="colr py-5 mt-5" >
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">BIBLIOTECA VIRTUAL HESSEN</h1>
                <p class="lead fw-normal text-white-50 mb-0">Explora un mundo de conocimiento a través de nuestra amplia colección de libros digitales </p>
            </div>
        </div>
    </header>

    <?php

    include("../bd/mostrar_dt.php");

    // Consulta SQL para obtener la información de los libros de la sección de Medicina
    $digit = isset($_GET['digit']) ? $_GET['digit'] : '';
    $consultaMedicina = "SELECT libro_dig.*, seccion_dig.Nombre AS Nombre_Seccion 
                         FROM libro_dig 
                         LEFT JOIN seccion_dig ON libro_dig.ID_SeccionD = seccion_dig.ID_SeccionD 
                         WHERE seccion_dig.Nombre = 'Medicina' AND libro_dig.Nombre LIKE '%$digit%'";
    // Ejecutar la consulta


    $resultadoMedicina = mysqli_query($conex, $consultaMedicina);
    // Consulta SQL para obtener la información de los libros de la sección de Farmacolgia
    $consultaFarmacologia = "SELECT libro_dig.*, seccion_dig.Nombre AS Nombre_Seccion 
                         FROM libro_dig 
                         LEFT JOIN seccion_dig ON libro_dig.ID_SeccionD = seccion_dig.ID_SeccionD 
                         WHERE seccion_dig.Nombre = 'Farmacologia' AND libro_dig.Nombre LIKE '%$digit%'";
    // Ejecutar la consulta
    $resultadoFarmacologia = mysqli_query($conex, $consultaFarmacologia);
    // Consulta SQL para obtener la información de los libros de la sección de Enfermeria
    $consultaEnfermeria = "SELECT libro_dig.*, seccion_dig.Nombre AS Nombre_Seccion 
                         FROM libro_dig 
                         LEFT JOIN seccion_dig ON libro_dig.ID_SeccionD = seccion_dig.ID_SeccionD 
                         WHERE seccion_dig.Nombre = 'Enfermeria' AND libro_dig.Nombre LIKE '%$digit%'";
    // Ejecutar la consulta
    $resultadoEnfermeria = mysqli_query($conex, $consultaEnfermeria);
    // Consulta SQL para obtener la información de los libros de la sección de Anestesia
    $consultaAnestesia = "SELECT libro_dig.*, seccion_dig.Nombre AS Nombre_Seccion 
                         FROM libro_dig 
                         LEFT JOIN seccion_dig ON libro_dig.ID_SeccionD = seccion_dig.ID_SeccionD 
                         WHERE seccion_dig.Nombre = 'Anestesia' AND libro_dig.Nombre LIKE '%$digit%'";
    // Ejecutar la consulta
    $resultadoAnestesia = mysqli_query($conex, $consultaAnestesia);
    // Consulta SQL para obtener la información de los libros de la sección de Anatomía
    $consultaAnatomía = "SELECT libro_dig.*, seccion_dig.Nombre AS Nombre_Seccion 
                         FROM libro_dig 
                         LEFT JOIN seccion_dig ON libro_dig.ID_SeccionD = seccion_dig.ID_SeccionD 
                         WHERE seccion_dig.Nombre = 'Anatomía' AND libro_dig.Nombre LIKE '%$digit%'";
    // Ejecutar la consulta
    $resultadoAnatomía = mysqli_query($conex, $consultaAnatomía);
    ?>

    <!-- Contenedor de secciones -->
    <div class="page-inner">
        <h4 class="page-title">SECCIONES</h4>
        <div class="row">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="row row-nav-line">
                        <!-- Lista de pestañas -->
                        <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#home" role="tab" aria-selected="true">Inicio</a>
                            </li>
                            <!-- Añadir más pestañas aquí -->
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#medicina" role="tab" aria-selected="false">Medicina</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#farmacologia" role="tab" aria-selected="false">Farmacologia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#enfermeria" role="tab" aria-selected="false">Enfermeria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#anestesia" role="tab" aria-selected="false">Anestesia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#anatomia" role="tab" aria-selected="false">Anatomía</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Contenido de las pestañas -->
                <div class="container px-4 px-lg-5 mt-5">
                    <!-- Contenido de la pestaña "Inicio" -->
                    <div class="tab-pane fade active show" id="home">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <div class="col mb-5" id="a1">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="card-img-top" src="../img/medicina.jpg" alt="..." />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">SIglas Medicas</h5>
                                            <p class="mb-0">Curar es un arte, aprender es la clave.</p>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://drive.google.com/file/d/1nJqjpBPDkRkKO6_1okc6e8RiyRqDhrzw/preview">Leer Ahora</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contenido de la pestaña "Medicina" -->
                    <div class="tab-pane fade" id="medicina" style="display: none;">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <!-- Iterar sobre los resultados para mostrar los libros en cuadros -->
                            <?php while($libro = mysqli_fetch_assoc($resultadoMedicina)) { ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($libro['Imagen']); ?>" alt="Imagen del libro">
                                        <div class="card-body p-3">
                                            <div class="text-center">
                                                <h5 class="fw-bolder"><?php echo $libro["Nombre"]; ?></h5>
                                                <p class="mb-0 ">Autor: <?php echo $libro["Autor"]; ?></p>
                                                <p class="mb-0 ">Año de publicacion: <?php echo $libro["Año_Publ"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $libro["Url"]; ?>">Leer Ahora</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Contenido de la pestaña "Farmacología" -->
                    <div class="tab-pane fade" id="farmacologia" style="display: none;">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <!-- Iterar sobre los resultados para mostrar los libros en cuadros -->
                            <?php while($libro = mysqli_fetch_assoc($resultadoFarmacologia)) { ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($libro['Imagen']); ?>" alt="Imagen del libro">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="fw-bolder"><?php echo $libro["Nombre"]; ?></h5>
                                                <p class="mb-0">Autor: <?php echo $libro["Autor"]; ?></p>
                                                <p class="mb-0 ">Año de publicacion: <?php echo $libro["Año_Publ"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $libro["Url"]; ?>">Leer Ahora</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Contenido de la pestaña "Enfermeria" -->
                    <div class="tab-pane fade" id="enfermeria" style="display: none;">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <!-- Iterar sobre los resultados para mostrar los libros en cuadros -->
                            <?php while($libro = mysqli_fetch_assoc($resultadoEnfermeria)) { ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($libro['Imagen']); ?>" alt="Imagen del libro">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="fw-bolder"><?php echo $libro["Nombre"]; ?></h5>
                                                <p class="mb-0"> Autor: <?php echo $libro["Autor"]; ?></p>
                                                <p class="mb-0 ">Año de publicacion: <?php echo $libro["Año_Publ"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $libro["Url"]; ?>">Leer Ahora</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Contenido de la pestaña "Anestesia" -->
                    <div class="tab-pane fade" id="anestesia" style="display: none;">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <!-- Iterar sobre los resultados para mostrar los libros en cuadros -->
                            <?php while($libro = mysqli_fetch_assoc($resultadoAnestesia)) { ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($libro['Imagen']); ?>" alt="Imagen del libro">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="fw-bolder"><?php echo $libro["Nombre"]; ?></h5>
                                                <p class="mb-0">Autor: <?php echo $libro["Autor"]; ?></p>
                                                <p class="mb-0 ">Año de publicacion: <?php echo $libro["Año_Publ"]; ?></p>
                                            </div> 
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $libro["Url"]; ?>">Leer Ahora</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Contenido de la pestaña "Anatomía" -->
                    <div class="tab-pane fade" id="anatomia" style="display: none;">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <!-- Iterar sobre los resultados para mostrar los libros en cuadros -->
                            <?php while($libro = mysqli_fetch_assoc($resultadoAnatomía)) { ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($libro['Imagen']); ?>" alt="Imagen del libro">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="fw-bolder"><?php echo $libro["Nombre"]; ?></h5>
                                                <p class="mb-0">Autor: <?php echo $libro["Autor"]; ?></p>
                                                <p class="mb-0 ">Año de publicacion: <?php echo $libro["Año_Publ"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo $libro["Url"]; ?>">Leer Ahora</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Otros scripts -->
    <script src="../js/deslis.js"></script>
    <script src="../js/busq_stud.js"></script>
    <script src="../js/studScript.js"></script>

    <!-- Script para manejar los eventos de cambio de pestaña -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Escuchar el evento de cambio de pestaña
            var tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    // Obtener el ID de la pestaña activa
                    var activeTabId = tab.getAttribute('href').substring(1);

                    // Ocultar todos los elementos con la clase 'tab-pane'
                    var tabContents = document.querySelectorAll('.tab-pane');
                    tabContents.forEach(function (content) {
                        content.style.display = 'none';
                    });

                    // Mostrar el contenido de la pestaña activa
                    var activeTabContent = document.getElementById(activeTabId);
                    if (activeTabContent) {
                        activeTabContent.style.display = 'block';
                    }
                });
            });
        });
        
    </script>
</body>
</html>
